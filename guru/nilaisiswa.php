<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="container">
				<div class="row p-b-0">
					<div class="col-md-12 col-lg-8">
						<p class="p-t-5 title" align="left"><strong>NILAI SISWA</strong></p>
					</div>					
					<div class="col-md-12 col-lg-4 p-t-10">
						<form class="form-inline" action="indexguru.php?page=nilaisiswa" method="POST">
							<input class="form-control mr-sm-2 ht-25" name="txtCari" type="search" placeholder="Cari ujian ..." aria-label="Search">
							<button class="btn btn-outline-info ht-25 my-2 my-sm-0 p-t-0" name="cariUjian1" type="submit">Cari</button>
						</form>
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
									
									<th>Nama Ujian</th> 
									<th>Pelajaran</th>
									<th colspan="2">Action</th>
								</tr>
								<?php
								$no = 1;								
								if (isset($_POST['cariUjian1'])) {
									$key = $_POST['txtCari'];
									$hasil = mysqli_query($koneksi, "SELECT * from ujian where nik_guru = '$id_user' and nama_ujian like '%".$key."%'");
								}else{
									$hasil = mysqli_query($koneksi, "SELECT * from ujian where nik_guru = '$id_user'");
								}
								
								while($data = mysqli_fetch_array($hasil)){
									?>
									<tr class="text-middle">
										<td width="5%"><?php echo $no++; ?></td>
										
										<td width="20%"><?php echo $data['nama_ujian']; ?></td>
										<td width="20%"><?php echo get_pelajaran_from_id($data['id_pelajaran']); ?></td>										
										<td>	
											<a href="indexguru.php?page=lihatnilaisiswa&id_ujian=<?php echo $data['id_ujian']; ?>" type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye m-r-5" aria-hidden="true"></i>
											Lihat Hasil Ujian</a>	
										</td>
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


