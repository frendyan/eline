<div class="container">
	<form class="form-group" action="indexadmin.php?page=siswa" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col">
				<div class="contact-form-warp p-t-20">
					<h4 class="text-center"> SISWA BARU</h4>	
				</div>
			</div>	
		</div>		

		<div class="row justify-content-center">
			<div class="col-2">
				<div class="container">
					<div class="picture-container">
						<div class="picture">
							<img src="..img/siswa/<?php echo $data['foto_siswa'];?>" class="picture-src" id="wizardPicturePreview" title="">
							<input type="file" name="foto-siswa" id="wizard-picture" class="required2" required>
						</div>
						<h6 class="text-center">Choose Picture</h6>

					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div>

			</div>
		</div>

		<div class="row p-t-50 justify-content-center">
			<div class="col-5 text-left">	
				<input type="hidden" name="nisSiswa"/>			
				<div class="form-group">
					<label for="namaSiswa">Nama Siswa</label>
					<input type="text" class="form-control" name="namaSiswa" id="namaSiswa" required>
				</div>
				<div class="form-group">
					<label for="passSiswa">Kata Sandi Siswa</label>
					<input type="text" class="form-control" name="passSiswa" id="passSiswa" value="123456" disabled>
				</div>
				<div class="form-group">
					<label for="kelas">Kelas</label>
					<select class="form-control" id="kelas" name="kelasSiswa" required>
						<option disabled selected>---- Pilih Kelas ----</option>
						<?php 
						$hasil2 = mysqli_query($koneksi, "SELECT nama_kelas FROM kelas") or exit("Error query : <b>".$sql."</b>.");
						while($row = mysqli_fetch_array($hasil2)):;?>
							<option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
						<?php endwhile;	?>

					</select>
				</div>
				<div class="p-t-20" align="right">								
					<a href="indexadmin.php?page=siswa"><button type="submit" class="btn btn-danger">Batal</button></a>
					<form action="indexadmin.php?page=siswa" method="post">						
						<input type="hidden" name="id" value="<?php echo $data['nisSiswa']; ?>">
						<button type="submit" name="siswaTambah" class="btn btn-primary m-l-10">Simpan</button>
					</form>
					
				</div>			
			</div>
		</div>	
	</form>
</div>
</div>

<script>
	$("#avatar-2").fileinput({
		overwriteInitial: true,
		maxFileSize: 1500,
		showClose: false,
		showCaption: false,
		showBrowse: false,
		browseOnZoneClick: true,
		removeLabel: '',
		removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
		removeTitle: 'Cancel or reset changes',
		elErrorContainer: '#kv-avatar-errors-2',
		msgErrorClass: 'alert alert-block alert-danger',
		defaultPreviewContent: '<img src="/samples/default-avatar-male.png" alt="Your Avatar"><h6 class="text-muted">Click to select</h6>',
		layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
		allowedFileExtensions: ["jpg", "png", "gif"]
	});
</script>

 