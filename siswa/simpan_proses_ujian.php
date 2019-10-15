<?php 
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";

if(isset($_POST['selesaiUjian'])){
	$jwbn =  $_POST['jawaban'];
	$id_soal =  $_POST['idSoal'];
	$id_ujian =  $_POST['idUjian'];
	$panjang = count($id_soal);
	$total = 0;
	$cossim_final=0;

	// mencari term untuk proses TF-IDF
	for($no=0;$no<$panjang;$no++) {
		$sql = "SELECT kunci_jawaban_stem FROM soal where id_soal='$id_soal[$no]'";
		$recset = mysqli_query($koneksi, $sql);
		$data = mysqli_fetch_array($recset);
		$kunci_stem = $data['kunci_jawaban_stem'];

		for ($i=0; $i < 1; $i++) { 			
			//pecah kata kunci
			$temp1 = explode(" ", $kunci_stem);
			$kunci[$no] = array_values(array_filter($temp1));

			//pecah kata jawaban
			$str = preproses($jwbn[$no]);
			$temp2 = explode(" ", $str);
			$jawaban[$no][$i] = array_values(array_filter($temp2));
			$jawaban_final[$no] = array_values($jawaban[$no][$i]);
			
			//menetukan term dengan cara merging kunci dan jawaban 
			$term[$no][$i] =array_values(array_unique(array_merge($kunci[$no], $jawaban[$no][$i])));

			// menyimpan value atau kata-kata term dalam sebuah aray
			$term_final[$no] = array_values($term[$no][$i]); 

			// menghitung size array dan digunakan sebagai batas perulangan 		
			$size_term_final = sizeof($term_final[$no]); 
			$size_jawaban_siswa = sizeof($jawaban[$no][$i]);
			$size_kunci_jawaban = sizeof($kunci[$no]);
			
			
			echo "<br/>";
			print_r($term[$no][$i]);
			echo "<br/>";
			print_r($kunci[$no]);
			echo "<br/>";
			echo "<br/>";
			

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

			
			print_r($term[$no][$i] =array_values(array_unique(array_merge($kunci[$no], $jawaban[$no][$i]))));
			echo "<br/>";
			print_r($jawaban[$no][$i]);
			echo "<br/>";
			

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

			echo "<br/>";
			print_r($jumlah_kj[$no]);
			echo "<br/>";
			print_r($jumlah_js[$no]);
			echo "<br/>";

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

			echo $atas;
			echo "<br/>";
			echo $bawah_final;
			echo "<br/>";
			if ($atas != 0 || $bawah_final != 0) {
				echo $cossim[$no] = $atas/$bawah_final;
			}else{
				echo $cossim[$no] = 0;
			}

		}
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		$total += $cossim[$no];
	}

	//rata-rata jumlah nilai total cosine similarity
	echo $cossim_final = $total/$panjang;

	//konversi nilai kemiripan menjadi nilai ujian esai
	if ($cossim_final > 0.01 && $cossim_final < 0.10) {
		echo "nilai anda 10";
	}elseif ($cossim_final > 0.11 && $cossim_final < 0.20) {
		echo "nilai anda 20";
	}elseif ($cossim_final > 0.21 && $cossim_final < 0.30) {
		echo "nilai anda 30";
	}elseif ($cossim_final > 0.31 && $cossim_final < 0.40) {
		echo "nilai anda 40";
	}elseif ($cossim_final > 0.41 && $cossim_final < 0.50) {
		echo "nilai anda 50";
	}elseif ($cossim_final > 0.51 && $cossim_final < 0.60) {
		echo "nilai anda 60";
	}elseif ($cossim_final > 0.61 && $cossim_final < 0.70) {
		echo "nilai anda 70";
	}elseif ($cossim_final > 0.71 && $cossim_final < 0.80) {
		echo "nilai anda 80";
	}elseif ($cossim_final > 0.81 && $cossim_final < 0.90) {
		echo "nilai anda 90";
	}elseif ($cossim_final > 0.91 && $cossim_final < 1) {
		echo "nilai anda 100";
	}

	


}

?>