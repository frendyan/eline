<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="container">
				<div class="row p-b-0">
					<div class="col-md-12 col-lg-4">
						<p class="p-t-5 title" align="left"><strong>DAFTAR UJIAN</strong></p>
					</div>
					<div class="col-md-12 col-lg-4 p-t-10">
						<a href="" class="btn btn-primary btn-xs" name=tambahUjian data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i> Ujian Baru</a>
					</div>
					<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<p class="modal-title" id="myModalLabel">Form Tambah Ujian</p>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>							
								</div>
								<div class="modal-body">
									<form action="" method="POST" role="form">

										<div class="form-group text-left">									
											<input type="text" name="namaUjian" class="form-control" placeholder="Nama Ujian" required>
										</div>

										<div class="form-group text-left">									
											<input type="hidden" name="pelajaranUjian" value="<?php echo get_pelajaran_guru($id_user); ?>" />
										</div>

										<div class="form-group text-left">									
											<input type="hidden" name="guruUjian" value="<?php echo $id_user ?>" />
										</div>

										<div class="form-group text-left">	

											<input type="hidden" name="tokenUjian" class="form-control" value="<?php generate_token();?>">
										</div>

										<div class="form-group text-left">									
											<select class="form-control" name="statusUjian" required>
												<option disabled selected>--- Status Ujian ---</option>
												<option value="1">Aktif</option>
												<option value="2">Tidak Aktif</option>
											</select>	
										</div>

									</div>
									<div class="modal-footer">
										<input type="hidden" name="user" value="2" />
										<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
										<button type="submit" name="tambahUjian" class="btn btn-primary">Simpan</button>
									</form>
								</div>
							</div>
						</div>
					</div>	
					<div class="col-md-12 col-lg-4 p-t-10">
						<form class="form-inline" action="indexguru.php?page=ujian" method="POST">
							<input class="form-control mr-sm-2" name="txtCari" type="search" style="height: 25px;" placeholder="Cari ujian ..." aria-label="Search">
							<button class="btn btn-outline-info my-2 my-sm-0 p-t-0" style="height: 25px;" name="cariUjian1" type="submit">Cari</button>
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
									<th>Token</th>
									<th>Status</th>
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
										<td><?php echo $no++; ?></td>
										<td><?php echo $data['nama_ujian']; ?></td>
										<td><?php echo get_pelajaran_from_id($data['id_pelajaran']); ?></td>										
										<td><?php echo $data['token_ujian']; ?></td>
										<td><?php 										
										$aktif = $data['aktif'];										
										konversi_status($aktif); 
										?></td>

										<td>	
											<a href="indexguru.php?page=kelolaujian&id_ujian=<?php echo $data['id_ujian']; ?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-tasks"></i> Kelola</a>									
											<a href="#" type="button" class="btn btn-success btn-xs text-none" data-toggle="modal" data-target="#ubah<?php echo $data['id_ujian']; ?>" ><i class="far fa-edit p-r-5"></i>Ubah</a>
											<div class="modal fade" id="ubah<?php echo $data['id_ujian']; ?>" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<p class="modal-title">Ubah Data Ujian</p>	
															<button type="button" class="close" data-dismiss="modal">&times;</button>										
														</div>
														<div class="modal-body">
															<form role="form" action="" method="post">

																<?php
																$id_ujian = $data['id_ujian']; 
																$query_edit = mysqli_query($koneksi, "SELECT ujian.id_ujian,pelajaran.id_pelajaran ,pelajaran.nama_pelajaran, ujian.nama_ujian,guru.nik_guru, guru.nama_guru, ujian.token_ujian, ujian.aktif from ujian JOIN pelajaran on ujian.id_pelajaran = pelajaran.id_pelajaran JOIN guru ON ujian.nik_guru = guru.nik_guru where id_ujian='$id_ujian'");
																while ($row = mysqli_fetch_array($query_edit)) {  
																	?>

																	<input type="hidden" name="id_ujian" value="<?php echo $row['id_ujian']; ?>">

																	<div class="form-group text-left">									
																		<input type="text" name="namaUjian" class="form-control" placeholder="Nama Ujian" value="<?php echo $row['nama_ujian']; ?>" required>
																	</div>

																	<div class="form-group text-left">									
																		<input type="hidden" name="pelajaranUjian" value="<?php echo get_pelajaran_guru($id_user); ?>" />
																	</div>

																	<div class="form-group text-left">									
																		<input type="hidden" name="guruUjian" value="<?php echo $id_user ?>" />
																	</div>
																	<div class="form-group text-left">									
																		<select class="form-control" name="statusUjian" required>
																			<option value="<?php echo $row['aktif']?>">
																				<?php
																				$aktif = $row['aktif'];										
																				konversi_status($aktif); 
																				?></option>
																				<option value="1">Aktif</option>
																				<option value="2">Tidak Aktif</option>
																			</select>
																		</div>

																		<div class="modal-footer">  																<input type="hidden" name="user" value="2" />
																			<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
																			<button type="submit" name="updateUjian" class="btn btn-primary">Simpan</button>
																		</div>

																		<?php 
																	}
																	?>        
																</form>
															</div>
														</div>

													</div>
												</div>
												<a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?php echo $data['id_ujian']; ?>"><i class="fa fa-trash"></i> Hapus</a>
												<div class="example-modal">
													<div id="delete<?php echo $data['id_ujian']; ?>" class="modal fade" role="dialog" style="display:none;">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">

																	<p class="modal-title">Konfirmasi Hapus Ujian</p>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																</div>
																<div class="modal-body">
																	<form action="" method="POST" role="form">
																		<input type="hidden" name="id" value="<?php echo $data['id_ujian']; ?>">
																		<p align="center" >Apakah anda yakin ingin menghapus ujian <strong> <?php echo $data['nama_ujian'];?></strong>?</p>
																	</div>
																	<div class="modal-footer">
																		<button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>																	<input type="hidden" name="user" value="2" />
																		<button type="submit" name="hapusUjian" class="btn btn-primary">Hapus</button>
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


