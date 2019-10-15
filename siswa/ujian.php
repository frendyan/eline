<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="container">
				<div class="row p-b-0">
					<div class="col-md-12 col-lg-8">
						<p class="p-t-5 title" align="left"><strong>DAFTAR UJIAN</strong></p>
					</div>

					<div class="col-md-12 col-lg-4 p-t-5">
						<form class="form-inline" action="indexsiswa.php?page=ujian" method="POST">
							<input class="form-control mr-sm-2 ht-25" name="txtCari" type="search" placeholder="Cari ujian ..." aria-label="Search">
							<button class="btn btn-outline-info my-2 ht-25 my-sm-0 p-t-0" name="cariUjianSiswa" type="submit">Cari</button>
						</form>
					</div>

				</div>
			</div>
			<div class="card-body p-t-0"> 
				<div class="row">
					<div class="col-lg-12 p-b-50 table-responsive">
						<table class="table table-sm w-full">
							<tr>
								<th>No</th>									
								<th>Nama Ujian</th>
								<th>Pelajaran</th>
								<th>Guru</th> 
								<th colspan="2">Action</th>
							</tr>
							<?php
							$no = 1;
							while($data = mysqli_fetch_assoc($ujian_hasil)){
								?>
								<tr class="text-middle">
									<td><?php echo $no++; ?></td> 
									<td><?php echo $data['nama_ujian']; ?></td>
									<td><?php echo get_pelajaran_from_id($data['id_pelajaran']); ?></td>
									<td><?php echo get_guru_from_id($data['nik_guru']); ?></td>  
									<td>	
										<?php
										if (cek_status_ujian_siswa($_SESSION['iduser'], $data['id_ujian'])) {
											echo "<a href='#' type='button' class='btn btn-primary btn-xs text-none' data-toggle='modal' data-target='#token".$data['id_ujian']."'><i class='fa fa-pencil-square-o p-r-3' aria-hidden='true'></i>
											Kerjakan</a>";
										}else{
											echo "<a href='#' type='button' class='btn btn-primary btn-xs text-none' data-toggle='modal' data-target='#gagal'><i class='fa fa-pencil-square-o p-r-3' aria-hidden='true'></i>
											Kerjakan</a>";
										}
										?>

										<div class="modal fade" id="token<?php echo $data['id_ujian']; ?>" role="dialog">
											<div class="modal-dialog">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<p class="modal-title">TOKEN</p>	
														<button type="button" class="close" data-dismiss="modal">&times;</button>										
													</div>
													<form role="form" action="" method="post">	
														<input type="hidden" name="idUjian" value="<?php echo $data['id_ujian']; ?>" />
														<div class="modal-body">
															<div class="form-group">
																<input type="text" name="tokenUjian" class="form-control" placeholder="Masukkan token ujian" required="true">      

															</div>
														</div>
														<div class="modal-footer">  																
															<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
															<button type="submit" name="konfirmasiToken" class="btn btn-primary">Konfirmasi</button>
														</div>
													</form>
												</div>
											</div>
										</div>

										<div class="modal fade" id="gagal" role="dialog">
											<div class="modal-dialog">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<p class="modal-title">Alert</p>	
														<button type="button" class="close" data-dismiss="modal">&times;</button>	 
													</div> 
													<div class="modal-body">
														<p class="text-center fs-15">Anda sudah mengerjakan ujian ini !!</p>
													</div>
													<div class="modal-footer">  																
														<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button> 
													</div>
													
												</div>
											</div>
										</div>

									</div>	
								</td>
							</tr>	
							<?php
						}
						?>						
					</table>
				</div>
			</div> 
		</div>
	</div>
</div>
</div>



