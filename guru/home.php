<div class="container">
	<p class="fs-20">DASHBOARD</hp>
		<div class="row">
			<div class="col-xl-6 col-md-12 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ujian Aktif</div>
								<div class="h5 mb-0 grey1 B612"><?php get_jml_ujian_aktif_by_nik($id_user); echo " Ujian";?> </div>
							</div>
							<div class="col-auto">
								<i class="fa fa-file-text fa-2x success"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-md-12 mb-4">
				<div class="card border-left-danger shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ujian non-aktif</div>
								<div class="h5 mb-0 grey1 B612"><?php get_jml_ujian_tidak_aktif_by_nik($id_user); echo " Ujian"; ?> </div>
							</div>
							<div class="col-auto">
								<i class="fas fa-file-text fa-2x danger"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>