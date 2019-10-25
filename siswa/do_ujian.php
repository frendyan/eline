<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
$id_user = $_SESSION['iduser'];
$id = $_POST['idUjian'];

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
					<a>Esai Online</a>
					<div id="close-sidebar">
						<i class="fas fa-bars"></i>
					</div>
				</div>

				<div class="sidebar-header">
					<div class="user-info">
						<span class="user-name text-up font-weight-bold"><?php echo get_pelajaran_from_id(get_id_pelajaran_from_id_ujian($id)) ?></span>						
						<span class="user-role"><?php get_nama_ujian_from_id($id) ?></span>
						<span class="user-role"></span>
						<span class="user-status">
							<i class="fa fa-circle"></i>
							<span>Online</span>
						</span>
					</div>
				</div>

				<div class="sidebar-menu">
					
				</div>        
				
			</div>


		</nav>	
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