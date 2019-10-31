<?php 

for($no=0;$no<$panjang;$no++) {
	$sql = "SELECT kunci_jawaban FROM soal where id_soal='$id_soal[$no]'";
	$recset = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_array($recset);
	$kunci_stem = $data['kunci_jawaban'];

	for ($i=0; $i < 1; $i++) { 			
		$temp1 = explode(" ", strtolower(hapus_simbol($kunci_stem)));
		$kunci[$no] = array_values(array_filter($temp1));

		$temp2 = pecah_kata(strtolower(hapus_simbol($jwbn[$no])));
		$jawaban[$no][$i] = array_values(array_filter($temp2));
		$jawaban_final[$no] = array_values($jawaban[$no][$i]);

			// menggabungkan dua array yang berisi term untuk proses TF-IDF
		$term[$no][$i] =array_values(array_unique(array_merge($kunci[$no], $jawaban[$no][$i])));

		$term_final[$no] = array_values($term[$no][$i]); 

			// menghitung ukuran array
		$size_term_final = sizeof($term_final[$no]); 
		$size_jawaban_siswa = sizeof($jawaban[$no][$i]);
		$size_kunci_jawaban = sizeof($kunci[$no]);	

			// TF Calculation
			// menghitung kemunculan term pada kunci jawaban
		for ($y=0; $y < $size_term_final; $y++) { 
			$count=0;				
			for ($z=0; $z < $size_kunci_jawaban; $z++) { 
				if ($term_final[$no][$y]==$kunci[$no][$z]) {						
					$count+=1;					
				}
			}
			$jumlah_kj[$no][$y] = $count;												
		}			

			// menghitung kemunculan term pada jawaban siswa
		for ($y=0; $y < $size_term_final; $y++) { 
			$count=0;				
			for ($z=0; $z < $size_jawaban_siswa; $z++) { 
				if ($term_final[$no][$y]==$jawaban_final[$no][$z]) {						
					$count+=1;
				}			
			}
			$jumlah_js[$no][$y] = $count;								
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


?>