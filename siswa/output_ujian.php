<div class="container">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<div class="container">
					<div class="row p-b-0">
						<div class="col-12">
							<p class="p-t-5 title fs-15 text-center " align="left">Hasil Ujian</p>
							<hr>
						</div>
					</div>
				</div>
				<div class="card-body p-t-0">
					<?php 			
					$id = $_GET['id'];		
					$nis = $_SESSION['iduser'];
					$dt = mysqli_query($koneksi, "SELECT nilai_ujian from hasil_ujian where id_ujian = '$id' and nis_siswa = '$nis'") or die(mysqli_error());					
					$data = mysqli_fetch_array($dt);
					?>
					<div class="row">
						<div class="col-12">
							<div class="p-t-50 p-b-50 text-center">
								<p class="fs-15 font-weight-bold">Nilai anda</p>				
								<h1><?php echo $data['nilai_ujian'] ?></h1>
							</div>
						</div>
						
					</div>		

					<a href="indexsiswa.php?page=home" class="btn btn-primary w-full">Kembali ke home >></a>
					
				</div>
			</div>
		</div>
	</div>
</div>