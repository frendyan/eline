<?php
if(empty($_SESSION['namauser']) ) {
//echo "blum ada";
	header('location:login.php');
	exit;
}
include ("config/koneksi.php");
?>