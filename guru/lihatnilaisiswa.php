<?php
$id = $_GET['id_ujian'];
$lihat_nilai_hasil = mysqli_query($koneksi, "SELECT * from hasil_ujian where id_ujian = '$id' order by nis_siswa");

$simpan = $_GET['id_ujian'];
?>
<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="container">
				<div class="row p-b-0">
					<div class="col-md-12 col-lg-8">
						<p class="p-t-5 title" align="left"><strong>NILAI SISWA</strong></p>
					</div>										
				</div>
				<div class="row">
					<div class="col">
						<p>Nilai siswa <?php echo get_nama_ujian_from_id($_GET['id_ujian']); ?></p>
					</div>
				</div>
			</div>
			<div class="card-body p-t-0">
				<form class="comment-form" action="indexguru.php?page=ujian" method="POST">
					<div class="row">
						<div class="col-lg-12 p-b-50 table-responsive">
							<table class="table table-sm w-full">
								<tr>
									<th>No</th>
									<th>Nama Siswa</th> 
									<th>Nilai</th>						
								</tr>
								<?php 
								$no = 1;
								while($data = mysqli_fetch_array($lihat_nilai_hasil)){
									?>
									<tr class="text-middle">
										<td width="5%"><?php echo $no++; ?></td>

										<td width="20%"><?php echo get_siswa_from_id($data['nis_siswa']); ?></td>
										<td width="20%"><?php echo $data['nilai_ujian']; ?></td>				
									</tr>

									<?php
								}
								?>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


