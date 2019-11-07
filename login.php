<?php 
include("config/koneksi.php");
if(isset($_POST['btnLogin']))
{
	$pass=($_POST['pass']);

	;$sql= "select * from admin where uname_admin='$_POST[username]' and pass_admin='$pass'";
	$login=mysqli_query($koneksi, $sql);
	$ketemu=mysqli_num_rows($login);
	$r=mysqli_fetch_array($login);

	if($ketemu > 0) {
		session_start() ; 
		$_SESSION[namauser]=$r['nama_admin'];
		$_SESSION[uname]=$r['uname_admin'];
		$_SESSION[iduser]=$r['id_admin'];
		$_SESSION[role]=1;
		header('location:admin/indexadmin.php?'); 

	}

	$sql2= "select * from guru where nik_guru='$_POST[username]' and pass_guru='$pass'";
	$login=mysqli_query($koneksi, $sql2);
	$ketemu=mysqli_num_rows($login);
	$r=mysqli_fetch_array($login);

	if($ketemu > 0) {
		session_start() ; 
		$_SESSION[namauser]=$r['nama_guru'];
		$_SESSION[passuser]=$r['pass_guru'];
		$_SESSION[iduser]=$r['nik_guru'];
		$_SESSION[role]=2;

		header('location:guru/indexguru.php?'); 
	}	

	$sql3= "select * from siswa where nis_siswa='$_POST[username]' and pass_siswa='$pass'";
	$login=mysqli_query($koneksi, $sql3);
	$ketemu=mysqli_num_rows($login);
	$r=mysqli_fetch_array($login);

	if($ketemu > 0) {
		session_start() ; 
		$_SESSION[namauser]=$r['nama_siswa'];
		$_SESSION[passuser]=$r['pass_siswa'];
		$_SESSION[iduser]=$r['nis_siswa'];
		$_SESSION[role]=3;
		header('location:siswa/indexsiswa.php?'); 
	}	
	else {
		$error = true;
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body">

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form class="login100-form validate-form" action="" method="post">

				<span class="login100-form-title p-b-60">
					Login
				</span>
				<?php if (isset($error)) { ?>
					<p class="text-white align-center text-italic">Username / Password anda salah</p>
				<?php } ?>
				<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
					<input class="input100" type="text" name="username" placeholder="ID or Username" required>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-user"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
					<input class="input100" type="password" name="pass" placeholder="Password" required>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock"></i>
					</span>
				</div>

				<div class="container-login100-form-btn p-t-10">
					<button type="submit"  name="btnLogin" class="login100-form-btn"><i class="fa fa-arrow-right"></i></button>
				</div>

			</form>
		</div>
	</div>
</div>	

<script src="vendor/jquery/jquery-3.2.1.min.js"></script>	
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>	
<script src="vendor/select2/select2.min.js"></script>	
<script src="js/main.js"></script>

</body>
</html>