<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="container">
				<div class="row p-b-0">
					<div class="col-md-12 col-lg-4">
						<p class="p-t-5 title" align="left"><strong>DAFTAR SISWA</strong></p>
					</div>
					<div class="col-md-12 col-lg-4 p-t-10">
						<a href="indexadmin.php?page=tambahsiswa" class="btn btn-primary btn-xs" name=tambahSiswa><i class="fa fa-plus"></i> Siswa Baru</a>
					</div>
					<div class="col-md-12 col-lg-4 p-t-10">
						<form class="form-inline" action="indexadmin.php?page=siswa" method="POST">
							<input class="form-control mr-sm-2 ht-25" name="txtCari" type="search" placeholder="Cari siswa ..." aria-label="Search">
							<button class="btn btn-outline-info my-2 my-sm-0 p-t-0 ht-25" name="cariSiswa" type="submit">Cari</button>
						</form>
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
									<th>NIS</th>
									<th>Nama Siswa</th>
									<th>Kelas</th>
									<th colspan="2">Action</th>
								</tr>
								<?php
								$no = 1;								
								while($data = mysqli_fetch_assoc($siswa_hasil)){
									?>
									<tr class="text-middle">
										<td><?php echo $no++; ?></td>
										<td><?php echo $data['nis_siswa']; ?></td>
										<td><?php echo $data['nama_siswa']; ?></td>
										<td><?php echo $data['nama_kelas']; ?></td>

										<td>										
											<a href="indexadmin.php?page=editsiswa&nis=<?php echo $data['nis_siswa']; ?>" type="button" class="btn btn-success btn-xs text-none"><i class="far fa-edit p-r-5"></i>Ubah</a>	

											<a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?php echo $data['nis_siswa']; ?>"><i class="fa fa-trash"></i> Hapus</a>
											<div class="example-modal">
												<div id="delete<?php echo $data['nis_siswa']; ?>" class="modal fade dis-none" role="dialog">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																
																<p class="modal-title">Konfirmasi Hapus Siswa</p>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															</div>
															<div class="modal-body">
																<form action="" method="POST" role="form">
																	<input type="hidden" name="id" value="<?php echo $data['nis_siswa']; ?>">
																	<p align="center" >Apakah anda yakin ingin menghapus siswa<strong> <?php echo $data['nama_siswa'];?></strong>?</p>
																</div>
																<div class="modal-footer">
																	<button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>																	
																	<button type="submit" name="hapusSiswa" class="btn btn-primary">Hapus</button>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>

											<?php               
										} 
										?>	

									</td>

								</tr>							
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
