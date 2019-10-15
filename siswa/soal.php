<div class="container">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<div class="container">
					<div class="row p-b-0">
						<div class="col">
							<p class="p-t-5 title fs-15" align="left"><?php strtoupper(get_nama_ujian_from_id($id)) ?></p>
							<hr>
						</div>
					</div>
				</div>
				<div class="card-body p-t-0">
					<form action="proses_ujian.php" method="post">

						<?php
						$no = 1;					
						$sql = mysqli_query($koneksi, "SELECT * FROM soal WHERE id_ujian='$id'");
						while ($data = mysqli_fetch_array($sql)) {  
							?>

							<input type="hidden" name="idSoal[]" value="<?php echo $data['id_soal'];?>" />	
							<input type="hidden" name="idUjian" value="<?php echo $data['id_ujian'];?>" />
							<table border="0">
								<tr>
									<td><p class="fs-15 font-weight-bold"><?php echo $no?>.</p></td>
									<td><p class="fs-15 font-weight-bold"><?php echo $data['soal'] ?></p></td>
								</tr>
							</table>

							<div class="form-group p-b-10">								
								<textarea name="jawaban[]" class="form-control" placeholder="Jawaban" required></textarea>
							</div>							

							<?php 
							$no++;
						}
						?>       

						<div class="modal-footer">  																									
							<button type="submit" name="selesaiUjian" class="btn btn-primary">Selesai</button>
						</div> 
					</form>

				</div>
			</div>
		</div>
	</div>
</div>