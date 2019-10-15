<div class="container">
	<form class="form-group" action="indexadmin.php?page=guru" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col">
				<div class="contact-form-warp p-t-20">
					<h4 class="text-center"> GURU BARU</h4>	
				</div>
			</div>	
		</div>		

		<div class="row justify-content-center">
			<div class="col-2">
				<div class="container">
					<div class="picture-container">
						<div class="picture">
							<img src="..img/guru/<?php echo $data['foto_guru'];?>" class="picture-src" id="wizardPicturePreview" title="">
							<input type="file" name="foto-guru" id="wizard-picture" class="required2" required>
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
				
				<div class="form-group">
					<label for="nikGuru">NIK Guru</label>
					<input type="text" class="form-control" name="nikGuru" id="nikGuru" required>
				</div>
				<div class="form-group">
					<label for="namaGuru">Nama Guru</label>
					<input type="text" class="form-control" name="namaGuru" id="namaGuru" required>
				</div>
				<div class="form-group">
					<label for="passGuru">Kata Sandi Guru</label>
					<input type="text" class="form-control" name="passGuru" id="passGuru" value="123456" disabled>
				</div>
				<div class="form-group">
					<label for="pelajaran">Pelajaran</label>
					<select class="form-control" id="pelajaran" name="pelajaranGuru" required>
						<option disabled selected>---- Pilih Pelajaran ----</option>
						<?php 
						$hasil2 = mysqli_query($koneksi, "SELECT id_pelajaran, nama_pelajaran FROM pelajaran") or exit("Error query : <b>".$sql."</b>.");
						while($row = mysqli_fetch_array($hasil2)):;?>
							<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
						<?php endwhile;	?>

					</select>
				</div>
				<div class="p-t-20" align="right">								
					<a href="indexadmin.php?page=guru"><button type="submit" class="btn btn-danger">Batal</button></a>
					<form action="indexadmin.php?page=guru" method="post">						
						<button type="submit" name="guruTambah" class="btn btn-primary m-l-10">Simpan</button>
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

 