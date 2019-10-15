<div class="container">
	<form class="form-group" action="indexadmin.php?page=admin" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col">
				<div class="contact-form-warp p-t-20">
					<h4 class="text-center"> ADMIN BARU</h4>	
				</div>
			</div>	
		</div>		

		<div class="row justify-content-center">
			<div class="col-2">
				<div class="container">
					<div class="picture-container">
						<div class="picture">
							<img src="..img/admin/<?php echo $data['foto_admin'];?>" class="picture-src" id="wizardPicturePreview" title="">
							<input type="file" name="foto-admin" id="wizard-picture" class="required2" required>
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
				<input type="hidden" name="idAdmin"/>			
				<div class="form-group">
					<label for="namaAdmin">Nama Admin</label>
					<input type="text" class="form-control" name="namaAdmin" id="namaAdmin" required>
				</div>
				<div class="form-group">
					<label for="unameAdmin">Username Admin</label>
					<input type="text" class="form-control" name="unameAdmin" id="unameAdmin">
				</div>
				<div class="form-group">
					<label for="passAdmin">Kata Sandi Admin</label>
					<input type="text" class="form-control" name="passAdmin" id="passAdmin" value="123456" disabled>
				</div>
				<div class="p-t-20" align="right">								
					<a href="indexadmin.php?page=admin"><button type="submit" class="btn btn-danger">Batal</button></a>
					<form action="indexadmin.php?page=admin" method="post">						
						<input type="hidden" name="id" value="<?php echo $data['idAdmin']; ?>">
						<button type="submit" name="adminTambah" class="btn btn-primary m-l-10">Simpan</button>
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
