<?php
include "config/koneksi.php";
include "config/fungsi.php";

?>
<!DOCTYPE html>

<head>
	<title>Esai Online | Siswa</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="../img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alegreya:900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=B612&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css"/>
	<link rel="stylesheet" href="css/bootstrap-reboot.css"/>
	<link rel="stylesheet" href="css/bootstrap-grid.css"/>
	<link rel="stylesheet" href="css/bootstrap-grid.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/util.css"/>
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body style="min-width: 768px"> 
	<div class="container">
		<div class="container">
			<div class="card">
				<div class="card-header">
					<div class="container">
						<div class="row p-b-0">
							<div class="col">
								<p class="p-t-5 title fs-15" align="left">Perhitungan Sistem</p>
								<hr>
							</div>
						</div>
					</div>
					<?php 
					if (isset($_POST['hitungSistem'])) {
						$kunci = $_POST['kunci'];
						$jawaban = $_POST['jawaban'];
						?>
						<div class="card-body p-t-0">
							<div class="row">
								<h4 class="m-l-5">Case Folding dan Hapus Simbol</h4>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group p-b-10">	
										<label>Kunci Jawaban</label>
										<textarea name="kunci" class="form-control" required><?php echo $case1 = hapus_simbol($kunci) ?></textarea>
									</div>		
								</div>
								<div class="col-6">
									<div class="form-group p-b-10">	
										<label>Jawaban Siswa</label>							
										<textarea name="jawaban" class="form-control"  required><?php echo $case2 = hapus_simbol($jawaban) ?></textarea>
									</div>
								</div>							
							</div>						
						</div>
						<div class="card-body p-t-0">
							<div class="row">
								<h4 class="m-l-5">Tokenizing</h4>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group p-b-10">								
										<textarea name="kunci" class="form-control" placeholder="Kunci Jawaban" required><?php 
										$simpan = explode(" ", $case1);
										$size = sizeof($simpan);
										for ($i=0; $i <$size ; $i++) { 
											echo $simpan[$i];
											echo "\n";

										} 

										?>
									</textarea>
								</div>		
							</div>
							<div class="col-6">
								<div class="form-group p-b-10">								
									<textarea name="jawaban" class="form-control" placeholder="Jawaban Siswa" required><?php 
									$simpan = explode(" ", $case2);
									$size = sizeof($simpan);
									for ($i=0; $i <$size ; $i++) { 
										echo $simpan[$i];
										echo "\n";

									} 

									?>
								</textarea>
							</div>
						</div>							


						<div class="card-body p-t-0">
							<div class="row">
								<h4 class="m-l-5">Filtering</h4>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group p-b-10">								
										<textarea name="kunci" class="form-control" placeholder="Kunci Jawaban" required><?php 
										$data_pecah = pecah_kata(hapus_simbol($case1));
										for($i=0;$i<count($data_pecah);$i++){

											$result=mysqli_query($koneksi, "SELECT kata FROM katahubung WHERE kata = '$data_pecah[$i]'");
											$jml=mysqli_num_rows($result); 

											if($jml>0){
												$cek_filtering[$i] = '';
											}else{
												echo $cek_filtering[$i] = $data_pecah[$i];
												echo "\n";
											};
										}
										?>
									</textarea>
								</div>		
							</div>
							<div class="col-6">
								<div class="form-group p-b-10">								
									<textarea name="jawaban" class="form-control" placeholder="Jawaban Siswa" required><?php 
									$data_pecah = pecah_kata(hapus_simbol($case2));
									for($i=0;$i<count($data_pecah);$i++){

										$result=mysqli_query($koneksi, "SELECT kata FROM katahubung WHERE kata = '$data_pecah[$i]'");
										$jml=mysqli_num_rows($result); 

										if($jml>0){
											$cek_filtering[$i] = '';
										}else{
											echo $cek_filtering[$i] = $data_pecah[$i];
											echo "\n";
										};
									}

									?>
								</textarea>
							</div>
						</div>	
						<div class="card-body p-t-0">
							<div class="row">
								<h4 class="m-l-5">Stemming</h4>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group p-b-10">	
										<textarea name="kunci" class="form-control" required><?php $prep1 = preproses($case1);
										$pre1 = explode(" ", $prep1);
										for ($i=0; $i < count($pre1); $i++) { 
											echo $pre1[$i];
											echo "\n";
										}
										?></textarea>
									</div>		
								</div>
								<div class="col-6">
									<div class="form-group p-b-10">																
										<textarea name="jawaban" class="form-control"  required><?php $prep2 = preproses($case2);
										$pre2 = explode(" ", $prep2);										
										for ($i=0; $i < count($pre2); $i++) { 
											echo $pre2[$i];
											echo "\n";
										}
										?></textarea>
									</div>
								</div>							
							</div>						
						</div>
					</div>
					<div class="card-body p-t-0">
						<div class="row">
							<h4 class="m-l-5">Term yang mewakili kedua dokumen</h4>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="form-group p-b-10">	
									<textarea name="kunci" class="form-control" required><?php 
									$term = array_values(array_filter(array_unique(array_merge($pre1, $pre2))));				
									for ($i=0; $i < count($term); $i++) { 
										echo $term[$i];
										echo "\n";
									}
									?></textarea>
								</div>		
							</div>

						</div>						
					</div>
					<div class="card-body p-t-0">
						<div class="row">
							<h4 class="m-l-5">Hasil TF-IDF</h4>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group p-b-10">	
									<textarea name="kunci" class="form-control" required><?php
									$size_term_final = sizeof($term); 
									$size_jawaban_siswa = sizeof($pre2);
									$size_kunci_jawaban = sizeof($pre1);

									for ($y=0; $y < $size_term_final; $y++) { 
										$count=0;				
										for ($z=0; $z < $size_kunci_jawaban; $z++) { 
											if ($term[$y]==$pre1[$z]) {						
												$count+=1;					
											}
										}
										$jumlah_kj[$y] = $count;												
									}		
									for ($y=0; $y < $size_term_final; $y++) { 
										$count=0;				
										for ($z=0; $z < $size_jawaban_siswa; $z++) { 
											if ($term[$y]==$pre2[$z]) {						
												$count+=1;
											}			
										}
										$jumlah_js[$y] = $count;								
									}

									for ($y=0; $y < $size_term_final; $y++) {			

										if ($jumlah_kj[$y]==0 || $jumlah_js[$y]==0) {
											$df = 1;
										}else{
											$df = 2;
										}

										$idf[$y] = log(2/$df) + 1;				
										$jumlah_kj[$y] *= $idf[$y];
										$jumlah_js[$y] *= $idf[$y];
									}
									print_r($jumlah_kj);
									?></textarea>
								</div>		
							</div>
							<div class="col-6">
								<div class="form-group p-b-10">	
									<textarea name="jawaban" class="form-control" required><?php							

									print_r($jumlah_js);
									

									?></textarea>
								</div>		
							</div>
						</div>						
					</div>
					<div class="card-body p-t-0">
						<div class="row">
							<h4 class="m-l-5">Hasil Cosine Similarity</h4>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="form-group p-b-10">	
									<textarea name="kunci" class="form-control" required><?php 
									$atas=0;
									$bawah1 = 0;
									$bawah2 = 0;
									$tempo = 0;												
									for ($y=0; $y < $size_term_final; $y++) { 			
										$atas += ($jumlah_kj[$y] * $jumlah_js[$y]);				
										$bawah1 += pow($jumlah_kj[$y], 2);
										$bawah2 += pow($jumlah_js[$y], 2);
									}							

									$bawah_final = sqrt($bawah1) * sqrt($bawah2);

									if ($atas != 0 || $bawah_final != 0) {
										echo $cossim = $atas/$bawah_final;												
									}
									else{
										echo $cossim = 0;
									}
									?></textarea>
								</div>		
							</div>

						</div>						
					</div>
					<div class="card-body p-t-0">
						<div class="row">
							<h4 class="m-l-5">Hasil Konversi Nilai</h4>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="form-group p-b-10">	
									<textarea name="kunci" class="form-control" required><?php 
									echo konversi($cossim);
									echo "\n ".log(2);
									?></textarea>
								</div>		
							</div>

						</div>						
					</div>






				</div>						
			</div>	




			<?php  
		}
		?>





	</div>
</div>
</div>
</div>
<!-- page-wrapper -->
<!--====== Javascripts & Jquery ======-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.marquee.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>

</body>
</html>
