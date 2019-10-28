<div class="container">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<div class="container">
					<div class="row p-b-0">
						<div class="col">
							<p class="p-t-5 title fs-15" align="left">Detail Ujian</p>
							<hr>
						</div>
					</div>
				</div>
				<div class="card-body p-t-0">
					<?php 
					$id = $_GET['id'];
					$dt = mysqli_query($koneksi, "SELECT ujian.id_ujian, pelajaran.nama_pelajaran, ujian.nama_ujian, guru.nama_guru, ujian.token_ujian, ujian.aktif from ujian JOIN pelajaran on ujian.id_pelajaran = pelajaran.id_pelajaran JOIN guru ON ujian.nik_guru = guru.nik_guru where id_ujian='$id'") or die(mysqli_error());					
					$data = mysqli_fetch_array($dt);
					?>
					<div class="row">
						<div class="col table-responsive">
							<table class="table fs-15">
								<tr>
									<td width="15%">Nama Ujian</td>
									<td width="2%">:</td>
									<td><?php echo $data['nama_ujian'] ?></td>
								</tr>
								<tr>
									<td>Guru</td>
									<td>:</td>
									<td><?php echo $data['nama_guru'] ?></td>
								</tr>
								<tr>
									<td>Mata Pelajaran</td>
									<td>:</td>
									<td><?php echo $data['nama_pelajaran'] ?></td>
								</tr>								
								<tr>
									<td>Jumlah Soal</td>
									<td>:</td>
									<td><?php echo get_jml_soal($data['id_ujian']) ?></td>
								</tr>
							</table>	
						</div>
					</div>
					<form action="do_ujian.php?page=soal" method="post">
						<input type="hidden" name="idUjian" value="<?php echo $_GET['id'] ?>">
						<button class="btn btn-primary w-full">Mulai Ujian >></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>