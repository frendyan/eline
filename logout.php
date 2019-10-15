<?php 
session_start();
session_destroy();
header("location:../eline/login.php");
?>