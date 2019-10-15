<?php 
include '../config/koneksi.php';
$sql   = "SELECT * from guru WHERE nik_guru = ".$_GET['nik'];
$hasil = mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
$data  = mysqli_fetch_assoc($hasil);
?> 
<div class="container">
	<form class="form-group" action="indexadmin.php?page=guru" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-12 text-center">
				<div class="contact-form-warp p-t-20 p-b-20">
					<h4 class="comment-title">DETAIL GURU</h4>	
				</div>
			</div>	
		</div>		

		<div class="row justify-content-center">
			<div class="col-2">
				<div class="container">
					<div class="picture-container">
						<div class="picture">
							<img src="../img/guru/<?php echo $data['foto_guru'];?>" class="picture-src" id="wizardPicturePreview" title="">
							<input type="file" name="foto-guru" id="wizard-picture" class="" required>
						</div>
						<h6 class="">Choose Picture</h6>

					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div>

			</div>
		</div>

		<div class="row p-t-50 justify-content-center">
			<div class="col-5" style="text-align: left;">
				<div class="form-group">
					<label for="nikGuru">NIK</label>
					<input type="text" class="form-control" id="nikGuru" value="<?php echo $data['nik_guru'] ?>" disabled>
				</div>
				<div class="form-group">
					<label for="namaGuru">Nama Guru</label>
					<input type="text" class="form-control" name="namaGuru" id="namaGuru" value="<?php echo $data['nama_guru'] ?>" required>
				</div>
				<div class="form-group">
					<label for="pelajaran">Pelajaran</label>
					<select class="form-control" id="pelajaran" name="pelajaranGuru">
						<option value="<?php echo $data['id_pelajaran'] ?>"><?php echo get_pelajaran_from_id($data['id_pelajaran']) ?></option>
						<?php 
						$hasil2 = mysqli_query($koneksi, "SELECT * from pelajaran") or exit("Error query : <b>".$sql."</b>.");
						while($row = mysqli_fetch_array($hasil2)):;?>
							<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
						<?php endwhile;	?>
					</select>
				</div>
				<div class="p-t-20" align="right">								
					<a href="indexadmin.php?page=guru"><button type="submit" class="btn btn-danger">Batal</button></a>
					<form>
						<input type="hidden" name="nikGuru" value="<?php echo $data['nik_guru']; ?>">
						<button type="submit" name="guruSimpan" class="btn btn-primary m-l-10">Simpan</button>
					</form>
					
				</div>			
			</div>
		</div>	
	</form>
</div>
