<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="container">
				<div class="row p-b-0">
					<div class="col">
						<p class="p-t-5 title" align="left"><strong>RIWAYAT UJIAN</strong></p>
					</div>
				</div>
			</div>
			<div class="card-body p-t-0">
				<form class="comment-form" action="indexadmin.php?page=siswa" method="POST">
					<div class="row">
						<div class="col-lg-12 p-b-50 table-responsive">
							<table class="table table-sm w-full">
								<tr>
									<th>No</th>
									<th>Nama Ujian</th>
									<th>Mata Pelajaran</th>
									<th>Nilai Ujian</th>
									
								</tr>
								<?php
								$no = 1;
								$id = $_SESSION['iduser'];
								$riwayat_hasil = mysqli_query($koneksi, "SELECT hasil_ujian.id_hasil,hasil_ujian.id_ujian,hasil_ujian.nis_siswa,hasil_ujian.nilai_ujian, ujian.id_pelajaran from hasil_ujian inner join ujian on hasil_ujian.id_ujian = ujian.id_ujian where nis_siswa ='$id'") or die(mysqli_error());
								while($data = mysqli_fetch_assoc($riwayat_hasil)){
									?>
									<tr class="text-middle">
										<td width="5%"><?php echo $no++; ?></td>
										<td width="30%"><?php echo get_nama_ujian_from_id($data['id_ujian']);?></td>
										<td width="30%"><?php echo get_pelajaran_from_id(get_pelajaran_from_id_ujian($data['id_ujian']));?></td>
										<td><?php echo $data['nilai_ujian']; ?></td>

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
