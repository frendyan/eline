<?php

$koneksi=mysqli_connect("localhost","root","") or exit("Gagal koneksi database!");
mysqli_select_db($koneksi, "eline") or exit("Gagal mengaktifkan database!");

?>