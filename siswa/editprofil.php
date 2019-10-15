<?php 
include '../config/koneksi.php';
$key = $_SESSION['namauser'];
$sql   = "SELECT * FROM siswa WHERE nama_siswa like '%".$key."%'";
$hasil = mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
$data  = mysqli_fetch_assoc($hasil);
?>

<div id="preloader">
	<div class="loader"></div>
</div>

<div class="container">
	<form class="form-group" action="indexsiswa.php?page=home" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-12 text-center">
				<div class="contact-form-warp p-b-20 p-t-20">
					<h4 class="comment-title">UBAH PROFIL</h4>	
				</div>
			</div>	
		</div>		

		<div class="row justify-content-center">
			<div class="col-2">
				<div class="container">
					<div class="picture-container">
						<div class="picture">
							<img src="../img/siswa/<?php echo $data['foto'];?>" class="picture-src" id="wizardPicturePreview" title="">
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
			<div class="col-5 text-left"  >
				<div class="form-group">
					<label for="namaSiswa">Nama Siswa</label>
					<input type="text" class="form-control" id="namaSiswa" name="namaSiswa" value="<?php echo $data['nama_siswa'] ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<div class="input-group" id="show_hide_password" >
						<input class="form-control" type="password" name="passSiswa" value="<?php echo $data['pass_siswa'] ?>">
						<span class="input-group-addon m-l-10 m-t-5">
							<a href=""><i class="fa fa-eye-slash " aria-hidden="true"></i></a>
						</span>
					</div>
					
				</div>
				<div class="p-t-20" align="right">								
					<a href="indexsiswa.php?page=home"><button type="submit" class="btn btn-danger">Batal</button></a>
					<form>
						<input type="hidden" name="nisSiswa" value="<?php echo $data['nis_siswa']; ?>">
						<button type="submit" name="siswaSimpanProfil" class="btn btn-primary m-l-10">Simpan</button>
					</form>
					
				</div>			
			</div>
		</div>	
	</form>
</div>
 

