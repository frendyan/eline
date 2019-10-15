<?php 
$sql   = "SELECT * FROM admin WHERE id_admin = ".$_GET['id'];
$hasil = mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
$data  = mysqli_fetch_assoc($hasil);
?> 



<div class="container">
	<form class="form-group" action="indexadmin.php?page=admin" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-12 text-center">
				<div class="contact-form-warp p-t-20 p-b-20">
					<h4 class="comment-title">DETAIL ADMIN</h4>	
				</div>
			</div>	
		</div>		

		<div class="row justify-content-center">
			<div class="col-2">
				<div class="container">
					<div class="picture-container">
						<div class="picture">
							<img src="..img/admin/<?php echo $data['foto_admin'];?>" class="picture-src" id="wizardPicturePreview" title="">
							<input type="file" name="foto-admin" id="wizard-picture" class="" required>
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
					<label for="idAdmin">ID</label>
					<input type="text" class="form-control" id="idAdmin" value="<?php echo $data['id_admin'] ?>" disabled>
				</div>
				<div class="form-group">
					<label for="namaAdmin">Nama Admin</label>
					<input type="text" class="form-control" name="namaAdmin" id="namaAdmin" value="<?php echo $data['nama_admin'] ?>" required>
				</div>

				<div class="p-t-20" align="right">								
					<a href="indexadmin.php?page=admin"><button type="submit" class="btn btn-danger">Batal</button></a>
					<form>
						<input type="hidden" name="idAdmin" value="<?php echo $data['id_admin']; ?>">
						<button type="submit" name="adminSimpan" class="btn btn-primary m-l-10">Simpan</button>
					</form>
					
				</div>			
			</div>
		</div>	
	</form>
</div>
