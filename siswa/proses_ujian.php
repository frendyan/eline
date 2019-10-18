<?php 
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

if(isset($_POST['selesaiUjian'])){
	$jwbn =  $_POST['jawaban'];
	$id_user = $_SESSION['iduser'];
	$id_soal =  $_POST['idSoal'];
	$id_ujian =  $_POST['idUjian'];
	$panjang = count($id_soal);
	$total = 0;
	$cossim_final=0;
	$nilai_akhir = 0;

	// mencari term untuk proses TF-IDF
	for($no=1;$no<$panjang;$no++) {
		$sql = "SELECT kunci_jawaban_stem FROM soal where id_soal='$id_soal[$no]'";
		$recset = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($recset);
		$kunci_stem = $data['kunci_jawaban_stem'];

		for ($i=0; $i < 1; $i++) { 			
			//pecah kata kunci
			$temp1 = explode(" ", $kunci_stem);
			//array kunci jawaban
			$kunci[$no] = array_values(array_filter($temp1));
			

			//pecah kata jawaban
			$str = preproses($jwbn[$no]);
			$temp2 = explode(" ", $str);
			$jawaban[$no][$i] = array_values(array_filter($temp2));
			// array jawaban siswa
			$jawaban_final[$no] = array_values($jawaban[$no][$i]);
			
			//menetukan term dengan cara merging array kunci dan array jawaban 
			$term[$no][$i] =array_values(array_unique(array_merge($kunci[$no], $jawaban[$no][$i])));
			
			//menyimpan value atau kata-kata term dalam sebuah aray
			$term_final[$no] = array_values($term[$no][$i]); 

			//menghitung size array dan digunakan sebagai batas perulangan 		
			$size_term_final = sizeof($term_final[$no]); 
			$size_jawaban_siswa = sizeof($jawaban[$no][$i]);
			$size_kunci_jawaban = sizeof($kunci[$no]);	

			//TF calculation		

			//perulangan menghitung total kemunculan term pada kunci jawaban
			for ($y=0; $y < $size_term_final; $y++) { 
				$count=0;				
				for ($z=0; $z < $size_kunci_jawaban; $z++) { 
					if ($term_final[$no][$y]==$kunci[$no][$z]) {						
						$count+=1;					
					}
				}
				$jumlah_kj[$no][$y] = $count;												
			}			

			//perulangan menghitung total kemunculan term pada jawaban siswa
			for ($y=0; $y < $size_term_final; $y++) { 
				$count=0;				
				for ($z=0; $z < $size_jawaban_siswa; $z++) { 
					if ($term_final[$no][$y]==$jawaban_final[$no][$z]) {						
						$count+=1;
					}			
				}
				$jumlah_js[$no][$y] = $count;								
			}

			//idf calculation

			for ($y=0; $y < $size_term_final; $y++) {			

				if ($jumlah_kj[$no][$y]==0 || $jumlah_js[$no][$y]==0) {
					$df = 1;
				}else{
					$df = 2;
				}

				$idf[$no][$y] = log(2/$df) + 1;				
				$jumlah_kj[$no][$y] *= $idf[$no][$y];
				$jumlah_js[$no][$y] *= $idf[$no][$y];
			}

			//cosine similarity

			$atas=0;
			$bawah1 = 0;
			$bawah2 = 0;
			for ($y=0; $y < $size_term_final; $y++) { 			
				$atas += ($jumlah_kj[$no][$y] * $jumlah_js[$no][$y]);				
				$bawah1 += pow($jumlah_kj[$no][$y], 2);
				$bawah2 += pow($jumlah_js[$no][$y], 2);
			}							

			$bawah_final = sqrt($bawah1) * sqrt($bawah2);

			if ($atas != 0 || $bawah_final != 0) {
				$cossim[$no] = $atas/$bawah_final;
			}else{
				$cossim[$no] = 0;
			}
		}
		$total += $cossim[$no];
	}

	//rata-rata jumlah nilai total cosine similarity dibulatkan 2 angka dibelakang koma
	round($cossim_final = $total/$panjang, 2);

	//konversi nilai kemiripan menjadi nilai ujian esai
	if ($cossim_final > 0.01 && $cossim_final < 0.10) {
		$nilai_akhir= 10;
	}elseif ($cossim_final > 0.10 && $cossim_final < 0.20) {
		$nilai_akhir= 20;
	}elseif ($cossim_final > 0.20 && $cossim_final < 0.30) {
		$nilai_akhir= 30;
	}elseif ($cossim_final > 0.30 && $cossim_final < 0.40) {
		$nilai_akhir= 40;
	}elseif ($cossim_final > 0.40 && $cossim_final < 0.50) {
		$nilai_akhir= 50;
	}elseif ($cossim_final > 0.50 && $cossim_final < 0.60) {
		$nilai_akhir= 60;
	}elseif ($cossim_final > 0.60 && $cossim_final < 0.70) {
		$nilai_akhir= 70;
	}elseif ($cossim_final > 0.70 && $cossim_final < 0.80) {
		$nilai_akhir= 80;
	}elseif ($cossim_final > 0.80 && $cossim_final < 0.90) {
		$nilai_akhir= 90;
	}elseif ($cossim_final > 0.90 && $cossim_final < 1) {
		$nilai_akhir = 100;
	}


	$sql = mysqli_query($koneksi, "INSERT into hasil_ujian values ('','$id_ujian','$id_user','$nilai_akhir') ");

	header('location:indexsiswa.php?page=output_ujian&id='.$id_ujian.''); 


}

?>