<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="container">
				<div class="row p-b-0">
					<div class="col-6">
						<p class="p-t-5 title" align="left"><strong>KELOLA UJIAN</strong></p>
					</div>
					<div class="col-6 p-t-10">
						<button type="button" class="btn btn-primary btn-xs float-r" data-toggle="modal" data-target="#modalTambah">
							<span aria-hidden="true"><i class="fa fa-plus"></i> Soal Baru</span>
						</button>	
					</div>

				</div>
			</div>
			<div class="card-body p-t-0">
				<form class="comment-form" action="indexguru.php?page=soal" method="POST">
					<div class="row">
						<div class="col-lg-12 p-b-50 table-responsive">
							<table class="table table-sm w-full">
								<tr>
									<th>No</th>									
									<th>Soal</th>
									<th width="50%">Jawaban</th>
									<th colspan="2">Action</th>
								</tr>
								<?php
								$no = 1;
								$id = $_GET['id_ujian'];
								$sql = "SELECT * FROM soal where id_ujian = '$id'";
								$hasil = mysqli_query($koneksi, $sql) or exit("Error query: <b>".$sql."</b>.");
								while($data = mysqli_fetch_assoc($hasil)){
									?>
									<tr class="text-middle">
										<td><?php echo $no++; ?></td>										
										<td><?php echo $data['soal']; ?></td>
										<td><?php echo $data['kunci_jawaban'];?></td>
										<td>										
											<a href="#" type="button" class="btn btn-success btn-xs text-none" data-toggle="modal" data-target="#ubah<?php echo $data['id_soal']; ?>"><i class="far fa-edit p-r-5"></i>Ubah</a>	
											<div class="modal fade" id="ubah<?php echo $data['id_soal']; ?>" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<p class="modal-title">Ubah Data Soal</p>	
															<button type="button" class="close" data-dismiss="modal">&times;</button>										
														</div>
														<div class="modal-body">
															<form role="form" action="" method="post">

																<?php
																$id_soal = $data['id_soal']; 
																$query_edit = mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$id_soal'");
																while ($row = mysqli_fetch_array($query_edit)) {  
																	?>

																	<input type="hidden" name="id_soal" value="<?php echo $row['id_soal']; ?>">

																	<div class="form-group">
																		<label>Soal</label>
																		<textarea name="soal" class="form-control"><?php echo $row['soal']; ?></textarea>
																	</div>

																	<div class="form-group">
																		<label>Jawaban</label>
																		<textarea name="kunci" class="form-control"><?php echo $row['kunci_jawaban']; ?></textarea>
																	</div>

																	<div class="modal-footer">  														
																		<input type="hidden" name="user" value="2" />
																		<input type="hidden" name="idUjian" value="<?php echo $_GET['id_ujian'];?>" />
																		<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
																		<button type="submit" name="updateSoal" class="btn btn-primary">Simpan</button>
																	</div>

																	<?php 
																}
																?>        
															</form>
														</div>
													</div>

												</div>
											</div>
											<a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?php echo $data['id_soal']; ?>"><i class="fa fa-trash"></i> Hapus</a>
											<div class="example-modal">
												<div id="delete<?php echo $data['id_soal']; ?>" class="modal fade" role="dialog" style="display:none;">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">

																<p class="modal-title">Konfirmasi Hapus Soal</p>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															</div>
															<form action="" method="POST" role="form">
																<div class="modal-body">														
																	<input type="hidden" name="id" value="<?php echo $data['id_soal']; ?>">
																	<p align="center" >Apakah anda yakin ingin menghapus soal no <strong><?php echo $no-1; ?></strong> ?</p>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="user" value="2" />
																	<button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
																	<button type="submit" name="hapusSoal" class="btn btn-primary">Hapus</button>

																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</td>
										<?php               
									} 
									?>
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
					<p class="modal-title" id="myModalLabel">Form Tambah Soal</p>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>							
				</div>
				<form action="" method="POST" role="form">
					<div class="modal-body">

						<input type="hidden" name="user" value="2" />

						<input type="hidden" name="idUjian" value="<?php echo $_GET['id_ujian'];?>" />

						<div class="form-group">

							<textarea name="soal" class="form-control" placeholder="Soal" required></textarea>				
						</div>
						<div class="form-group">
							<textarea name="kunci" class="form-control" placeholder="Kunci Jawaban" required></textarea>				
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button type="submit" name="tambahSoal" class="btn btn-primary">Simpan</button>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>


