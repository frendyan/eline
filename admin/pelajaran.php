<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="container">
				<div class="row p-b-0">
					<div class="col-sm-12 col-md-3">
						<p class="p-t-5 title" align="left"><strong>DAFTAR PELAJARAN</strong></p>
					</div>
					<div class="col-sm-12 col-md-9 p-t-7">
						<button type="button" class="btn btn-primary btn-xs float-l" data-toggle="modal" data-target="#modalTambah">
							<span aria-hidden="true"><i class="fa fa-plus"></i> Pelajaran Baru</span>
						</button>	
					</div>

				</div>
			</div>
			<div class="card-body p-t-0">
				<form class="comment-form" action="indexadmin.php?page=pelajaran" method="POST">
					<div class="row">
						<div class="col-lg-12 p-b-50 table-responsive">
							<table class="table table-sm w-full">
								<tr>
									<th>No</th>
									<th>ID</th>
									<th>Pelajaran</th>
									<th colspan="2">Action</th>
								</tr>
								<?php
								$no = 1;
								$sql = "SELECT * FROM pelajaran";
								$hasil = mysqli_query($koneksi, $sql) or exit("Error query: <b>".$sql."</b>.");
								while($data = mysqli_fetch_assoc($hasil)){
									?>
									<tr class="text-middle">
										<td><?php echo $no++; ?></td>
										<td><?php echo $data['id_pelajaran']; ?></td>
										<td><?php echo $data['nama_pelajaran']; ?></td>
										<td>										
											<a href="#" type="button" class="btn btn-success btn-xs text-none" data-toggle="modal" data-target="#myModal<?php echo $data['id_pelajaran']; ?>"><i class="far fa-edit p-r-5"></i>Ubah</a>	
											<div class="modal fade" id="myModal<?php echo $data['id_pelajaran']; ?>" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<p class="modal-title">Ubah Data Pelajaran</p>	
															<button type="button" class="close" data-dismiss="modal">&times;</button>										
														</div>
														<div class="modal-body">
															<form role="form" action="" method="post">

																<?php
																$id_pelajaran = $data['id_pelajaran']; 
																$query_edit = mysqli_query($koneksi, "SELECT * FROM pelajaran WHERE id_pelajaran='$id_pelajaran'");
																while ($row = mysqli_fetch_array($query_edit)) {  
																	?>

																	<input type="hidden" name="id_pelajaran" value="<?php echo $row['id_pelajaran']; ?>">

																	<div class="form-group">
																		<label>Nama Pelajaran</label>
																		<input type="text" name="nama_pelajaran" class="form-control" value="<?php echo $row['nama_pelajaran']; ?>">      
																	</div>

																	<div class="modal-footer">  																
																		<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
																		<button type="submit" name="updatePelajaran" class="btn btn-primary">Simpan</button>
																	</div>

																	<?php 
																}
																?>        
															</form>
														</div>
													</div>

												</div>
											</div>
											<a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?php echo $data['id_pelajaran']; ?>"><i class="fa fa-trash"></i> Hapus</a>
											<div class="example-modal">
												<div id="delete<?php echo $data['id_pelajaran']; ?>" class="modal fade" role="dialog" style="display:none;">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																
																<p class="modal-title">Konfirmasi Hapus Pelajaran</p>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															</div>
															<div class="modal-body">
																<form action="" method="POST" role="form">
																	<input type="hidden" name="id" value="<?php echo $data['id_pelajaran']; ?>">
																	<p align="center" >Apakah anda yakin ingin menghapus pelajaran <strong><?php echo $data['nama_pelajaran'];?></strong> ?</p>
																</div>
																<div class="modal-footer">
																	<button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>																	
																	<button type="submit" name="hapusPelajaran" class="btn btn-primary">Hapus</button>
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
	<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<p class="modal-title" id="myModalLabel">Form Tambah Pelajaran</p>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>							
				</div>
				<div class="modal-body">
					<form action="" method="POST" role="form">

						<div class="form-group text-left">									
							<input type="text" name="namaPelajaran" class="form-control" placeholder="Nama Pelajaran Baru" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button type="submit" name="simpanPelajaran" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>	
</div>
