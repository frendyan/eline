<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
$id_user = $_SESSION['iduser'];
 
?>
<!DOCTYPE html>

<head>
	<title>Esai Online | Siswa</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="../img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alegreya:900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=B612&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/bootstrap.css"/>
	<link rel="stylesheet" href="../css/bootstrap-reboot.min.css"/>
	<link rel="stylesheet" href="../css/bootstrap-reboot.css"/>
	<link rel="stylesheet" href="../css/bootstrap-grid.css"/>
	<link rel="stylesheet" href="../css/bootstrap-grid.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/owl.carousel.css"/>
	<link rel="stylesheet" href="../css/style.css"/>
	<link rel="stylesheet" href="../css/animate.css"/>
	<link rel="stylesheet" href="../css/util.css"/>
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body style="min-width: 768px"> 
	<div class="page-wrapper chiller-theme toggled">

		<nav class="navbar bg-dark navbar-dark container-fluid shadow-top" style="height: 50px;"></nav>

		<nav id="sidebar" class="sidebar-wrapper">
			<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
				<i class="fas fa-bars"></i>
			</a>

			<div class="sidebar-content">
				<div class="sidebar-brand">
					<a href="indexsiswa.php?page=home">Esai Online</a>
					<div id="close-sidebar">
						<i class="fas fa-bars"></i>
					</div>
				</div>
				<div class="sidebar-header">
					<div class="user-pic">
						<img class="img-responsive img-rounded" src="../img/siswa/<?php echo get_foto_siswa_from_id($id_user); ?>"
						alt="User picture">
					</div>
					<div class="user-info">
						<span class="user-name"><?php echo get_siswa_from_id($id_user); ?></span>
						<span class="user-role">Siswa</span>
						<span class="user-status">
							<i class="fa fa-circle"></i>
							<span>Online</span>
						</span>
					</div>
				</div>
				<!-- sidebar-header  -->
				<div class="sidebar-menu">
					<ul>            
						<li class="header-menu">
							<span>Menu</span>
						</li>
						<li>
							<a href="indexsiswa.php?page=home">
								<i class="fas fa-tachometer-alt"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="indexsiswa.php?page=ujian">
								<i class="fa fa-file-text"></i>
								<span>Ujian</span>
							</a>						
						<li>
							<a href="indexsiswa.php?page=riwayatujian">
								<i class="fas fa-history"></i>
								<span>Riwayat Ujian</span>
							</a>
						</li>						
					</ul>
				</div>        
			</div>
			<div class="sidebar-footer">
				<a href="indexsiswa.php?page=editprofil" >
					<i class="fa fa-cog"></i>
				</a>
				<a href="#" data-toggle="modal" data-target="#logout">
					<i class="fa fa-power-off"></i>
				</a>
			</div> 
		</nav>
		<div class="example-modal">
			<div id="logout" class="modal fade display-none" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							
							<p class="modal-title">Konfirmasi Logout</p>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<form action="../logout.php">
							<div class="modal-body">															
								<p align="center" >Apakah anda yakin ingin keluar?</p>
							</div>
							<div class="modal-footer">

								<button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>				
								<button type="submit" name="logout" class="btn btn-primary">Ya</button>									

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
		<!-- sidebar-wrapper  -->

		<main class="page-content">
			<div class="container-fluid">
				<?php
				if (isset($_GET['page']))
				{

					if ($_GET['page'] == "")
					{
						include ("home.php");
					}
					else
					{
						include ($_GET['page'].".php");
					}
				}
				else
				{
					include ("home.php");
				}
				?>

			</div>

		</main>
		<!-- page-content" -->
	</div>
	<!-- page-wrapper -->
	<!--====== Javascripts & Jquery ======-->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery.marquee.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/bootstrap.bundle.js"></script>

</body>
</html>