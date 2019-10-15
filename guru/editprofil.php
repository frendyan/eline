<?php 
include '../config/koneksi.php';
$key = $_SESSION['iduser'];
$sql   = "SELECT * FROM guru WHERE nik_guru='$key'";
$hasil = mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
$data  = mysqli_fetch_assoc($hasil);
?>

<div id="preloader">
	<div class="loader"></div>
</div>

<div class="container">
	<form class="form-group" action="indexguru.php?page=home" method="post" enctype="multipart/form-data">
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
							<img src="../img/guru/<?php echo $data['foto_guru'];?>" class="picture-src" id="wizardPicturePreview" title="">
							<input type="file" name="foto-guru" id="wizard-picture" class="">
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
					<label for="namaGuru">Nama Guru</label>
					<input type="text" class="form-control" id="namaGuru" name="namaGuru" value="<?php echo $data['nama_guru'] ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<div class="input-group" id="show_hide_password" >
						<input class="form-control" type="password" name="passGuru" value="<?php echo $data['pass_guru'] ?>">
						<span class="input-group-addon m-l-10 m-t-5">
							<a href=""><i class="fa fa-eye-slash " aria-hidden="true"></i></a>
						</span>
					</div>
					
				</div>
				<div class="p-t-20" align="right">								
					<a href="indexguru.php?page=home"><button type="submit" class="btn btn-danger">Batal</button></a>
					
					<input type="hidden" name="nikGuru" value="<?php echo $data['nik_guru']; ?>" />
					<button type="submit" name="guruSimpanProfil" class="btn btn-primary m-l-10">Simpan</button>

				</div>			
			</div>
		</div>	
	</form>
</div>


