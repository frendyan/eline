<?php 
include '../config/koneksi.php';
$sql   = "SELECT * FROM siswa WHERE nis_siswa = ".$_GET['nis'];
$hasil = mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
$data  = mysqli_fetch_assoc($hasil);
?> 
<div class="container">
	<form class="form-group" action="indexadmin.php?page=siswa" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-12 text-center">
				<div class="contact-form-warp p-b-20 p-t-20">
					<h4 class="comment-title">DETAIL SISWA</h4>	
				</div>
			</div>	
		</div>		

		<div class="row justify-content-center">
			<div class="col-2">
				<div class="container">
					<div class="picture-container">
						<div class="picture">
							<img src="../img/siswa/<?php echo $data['foto_siswa'];?>" class="picture-src" id="wizardPicturePreview" title="">
							<input type="file" name="foto-siswa" id="wizard-picture" class="" required>
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
					<label for="nisSiswa">NIS</label>
					<input type="text" class="form-control" id="nisSiswa" value="<?php echo $data['nis_siswa'] ?>" disabled>
				</div>
				<div class="form-group">
					<label for="namaSiswa">Nama Siswa</label>
					<input type="text" class="form-control" name="namaSiswa" id="namaSiswa" value="<?php echo $data['nama_siswa'] ?>" required>
				</div>
				<div class="form-group">
					<label for="kelas">Kelas</label>
					<select class="form-control" id="kelas" name="kelasSiswa">
						<option value="<?php echo $data['nama_kelas'] ?>"><?php echo $data['nama_kelas'] ?></option>
						<?php 
						$hasil2 = mysqli_query($koneksi, "SELECT * from kelas") or exit("Error query : <b>".$sql."</b>.");
						while($row = mysqli_fetch_array($hasil2)):;?>
							<option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
						<?php endwhile;	?>
					</select>
				</div>
				<div class="p-t-20" align="right">								
					<a href="indexadmin.php?page=siswa"><button type="submit" class="btn btn-danger">Batal</button></a>
					<form>
						<input type="hidden" name="nisSiswa" value="<?php echo $data['nis_siswa']; ?>">
						<button type="submit" name="siswaSimpan" class="btn btn-primary m-l-10">Simpan</button>
					</form>
					
				</div>			
			</div>
		</div>	
	</form>
</div>
 