<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="container">
				<div class="row p-b-0">
					<div class="col-md-12 col-lg-4">
						<p class="p-t-5 title" align="left"><strong>DAFTAR ADMIN</strong></p>
					</div>
					<div class="col-md-12 col-lg-4 p-t-10">
						<a href="indexadmin.php?page=tambahadmin" class="btn btn-primary btn-xs" name=tambahAdmin><i class="fa fa-plus"></i> Admin Baru</a>
					</div>
					<div class="col-md-12 col-lg-4 p-t-10">
						<form class="form-inline" action="indexadmin.php?page=admin" method="POST">
							<input class="form-control mr-sm-2" name="txtCari" type="search" style="height: 25px;" placeholder="Cari admin ..." aria-label="Search">
							<button class="btn btn-outline-info my-2 my-sm-0 p-t-0" style="height: 25px;" name="cariAdmin" type="submit">Cari</button>
						</form>
					</div>

				</div>
			</div>
			<div class="card-body p-t-0">
				<form class="comment-form" action="indexadmin.php?page=admin" method="POST">
					<div class="row">
						<div class="col-lg-12 p-b-50 table-responsive">
							<table class="table table-sm w-full">
								<tr>
									<th>No</th>
									<th>ID</th>
									<th>Nama Admin</th>
									<th colspan="2">Action</th>
								</tr>
								<?php
								$no = 1;								
								while($data = mysqli_fetch_assoc($admin_hasil)){
									?>
									<tr class="text-middle">
										<td><?php echo $no++; ?></td>
										<td><?php echo $data['id_admin']; ?></td>
										<td><?php echo $data['nama_admin']; ?></td>
										<td>										
											<?php
											if ($data['nama_admin'] != $_SESSION['namauser']) {
												echo "<a href='indexadmin.php?page=editadmin&id=".$data['id_admin']."' type='button' class='btn btn-success btn-xs text-none'><i class='far fa-edit p-r-5'></i>Ubah</a>";
											}else{
												echo "<a href='indexadmin.php?page=editprofil' type='button' class='btn btn-success btn-xs text-none'><i class='far fa-edit p-r-5'></i>Ubah</a>";
											}
											?>


												

											<?php
											if ($data['nama_admin'] != $_SESSION['namauser']) {
												echo "
												<a href='#' class='btn btn-danger btn-flat btn-xs' data-toggle='modal' data-target='#delete".$data['id_admin']."'><i class='fa fa-trash'></i> Hapus</a>";									
											}
											?>
											<div class="example-modal">
												<div id="delete<?php echo $data['id_admin']; ?>" class="modal fade" role="dialog" style="display:none;">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																
																<p class="modal-title">Konfirmasi Hapus Admin</p>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															</div>
															<div class="modal-body">
																<form action="" method="POST" role="form">
																	<input type="hidden" name="id" value="<?php echo $data['id_admin']; ?>">
																	<p align="center" >Apakah anda yakin ingin menghapus admin<strong> <?php echo $data['nama_admin'];?></strong>?</p>
																</div>
																<div class="modal-footer">
																	<button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>																	
																	<button type="submit" name="hapusAdmin" class="btn btn-primary">Hapus</button>
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
