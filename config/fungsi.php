<?php

function get_guru_from_id($id) {
	include 'koneksi.php';
	$sql = "SELECT nama_guru FROM guru where nik_guru='$id'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	return $dt['nama_guru'];
}


function get_siswa_from_id($id) {
	include 'koneksi.php';
	$sql = "SELECT nama_siswa FROM siswa where nis_siswa='$id'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	return $dt['nama_siswa'];
}

function get_admin_from_id($id) {
	include 'koneksi.php';
	$sql = "SELECT nama_admin FROM admin where id_admin='$id'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	return $dt['nama_admin'];
}

function get_foto_admin_from_id($id) {
	include 'koneksi.php';
	$sql = "SELECT foto_admin FROM admin where id_admin='$id'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	return $dt['foto_admin'];
}

function get_foto_guru_from_id($id) {
	include 'koneksi.php';
	$sql = "SELECT foto_guru FROM guru where nik_guru='$id'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	return $dt['foto_guru'];
}

function get_foto_siswa_from_id($id) {
	include 'koneksi.php';
	$sql = "SELECT foto_siswa FROM siswa where nis_siswa='$id'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	return $dt['foto_siswa'];
}
/*
function get_guru_from_nama($id) {
	include 'koneksi.php';
	$sql = "SELECT nik_guru FROM guru where nama_guru like %'".$id."'%";
	$rs = mysqli_query($koneksi, $sql); 
	if(mysqli_num_rows($rs)=0) {
		return null;
	} elseif (mysqli_num_rows($rs>0)) {
		$dt = mysqli_fetch_array($rs);
		return $dt['nik_guru'];
	} 
}
*/
function get_pelajaran_from_id($id) {
	include 'koneksi.php';
	$sql = "SELECT nama_pelajaran FROM pelajaran where id_pelajaran='$id'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	return $dt['nama_pelajaran'];
}

function get_pelajaran_from_id_ujian($id) {
	include 'koneksi.php';
	$sql = "SELECT id_pelajaran from ujian where id_ujian='$id'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	return $dt['id_pelajaran'];
}

function get_id_pelajaran_from_id_ujian($id) {
	include 'koneksi.php';
	$sql = "SELECT id_pelajaran FROM ujian where id_ujian='$id'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	return $dt['id_pelajaran'];
}

function cek_status_ujian_siswa($nis_siswa, $id_ujian) {
	include 'koneksi.php';
	$sql = "SELECT nis_siswa, id_ujian FROM hasil_ujian where nis_siswa = '$nis_siswa' AND id_ujian='$id_ujian'" ;
	$rs = mysqli_query($koneksi, $sql);
	if(mysqli_num_rows($rs)>0) {
		return 0;
	} else {
		return 1;
	}
}

function get_pelajaran_guru($id) {
	include 'koneksi.php';
	$sql = "SELECT id_pelajaran FROM guru where nik_guru='$id'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	return $dt['id_pelajaran'];
}


//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//////////////////////// ujian & soal


function get_nama_ujian_from_id($x) {
	include "koneksi.php";
	$sql = "SELECT nama_ujian FROM ujian where id_ujian = '$x'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	echo $dt['nama_ujian'];
}

function get_jml_ujian_all() {
	include "koneksi.php";
	$sql = "SELECT count(*) as jml FROM ujian";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	echo $dt['jml'];
}

function get_jml_ujian_aktif() {
	include "koneksi.php";
	$sql = "SELECT count(*) as jml FROM ujian where aktif='1'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	echo $dt['jml'];
}

function get_jml_ujian_aktif_by_nik($x) {
	include "koneksi.php";
	$sql = "SELECT count(*) as jml FROM ujian where aktif='1' and nik_guru ='$x'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	echo $dt['jml'];
}

function get_jml_ujian_tidak_aktif_by_nik($x) {
	include "koneksi.php";
	$sql = "SELECT count(*) as jml FROM ujian where aktif='2' and nik_guru ='$x'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	echo $dt['jml'];
}

function get_jml_ujian_tidak_aktif() {
	include "koneksi.php";
	$sql = "SELECT count(*) as jml FROM ujian where aktif='0'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	echo $dt['jml'];
}

function get_jml_soal($x){
	include "koneksi.php";
	$sql = "SELECT count(*) as jml FROM soal where id_ujian = '$x'";
	$rs = mysqli_query($koneksi, $sql) or die(mysqli_error());
	$dt = mysqli_fetch_array($rs);
	echo $dt['jml'];
}

//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//////////////////////// user

function get_jml_user_all() {
	include "koneksi.php";
	$sql = "SELECT (
	SELECT COUNT(*)
	FROM   admin 
	)+ 
	(
	SELECT COUNT(*)
	FROM   siswa
	)+ 
	(
	SELECT COUNT(*)
	FROM   guru
) as jml";
$rs = mysqli_query($koneksi, $sql);
$dt = mysqli_fetch_array($rs);
echo $dt['jml'];
}

function get_nama_siswa($id) {
	$data = explode(" ",$id);
	echo $data[0];
}

//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
////////////////////// kelas

function get_jml_kelas_all() {
	include "koneksi.php";
	$sql = "SELECT count(*) as jml FROM kelas";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	echo $dt['jml'];
}

//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//////////////////////// pelajaran

function get_jml_pelajaran_all() {
	include "koneksi.php";
	$sql = "SELECT count(*) as jml FROM pelajaran";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	echo $dt['jml'];
}

//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
/////////////////////// admin

function get_admin_photo_by_name($x)
{
	include "koneksi.php";
	$sql = "SELECT foto FROM admin where uname_admin='$x'";
	$rs = mysqli_query($koneksi, $sql);
	$dt = mysqli_fetch_array($rs);
	echo $dt['foto']; 
}



//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------------------------------------//


/////////////////////////////////////// KELAS


if (isset($_POST['hapusKelas'])) {
	$idKelas= $_POST['id'];
	$sql = "DELETE from kelas where id_kelas = '$idKelas'";
	mysqli_query($koneksi, $sql) or die(mysqli_error());
	echo "<script> alert ('Data kelas berhasil dihapus');
	document.location='indexadmin.php?page=kelas';
	</script>";

}

if (isset($_POST['updateKelas'])){

	$id_kelas = $_POST['id_kelas'];
	$nama_kelas = $_POST['nama_kelas'];
	$sql = "UPDATE kelas SET nama_kelas='$nama_kelas' WHERE id_kelas='$id_kelas' ";
	if (mysqli_query($koneksi, $sql)) {
		echo "<script> alert ('Data kelas berhasil diubah');	
		</script>";
	}
	else{
		echo "ERROR, Kelas gagal diupdate". mysqli_error();
	}
}


if (isset($_POST['simpanKelas'])) {
	$namaKelas= $_POST['namaKelas'];
	mysqli_query($koneksi, "INSERT into kelas values ('','$namaKelas')") or die(mysqli_error());
	echo "<script> alert ('Data kelas berhasil ditambahkan');
	</script>";
}

//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
/////////////////////////////////////// UJIAN

if (isset($_POST['cariUjian'])) {
	$key = $_POST['txtCari'];
	$sql = "SELECT * from ujian where (nama_ujian like '%".$key."%')";
	$ujian_hasil_admin = mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");	
}
else
{
	$sql = "SELECT * from ujian ;";									
	$ujian_hasil_admin = mysqli_query($koneksi, $sql) or exit("Error query: <b>".$sql."</b>.");
}

if (isset($_POST['cariUjianSiswa'])) {
	$key = $_POST['txtCari'];
	$sql = "SELECT * from ujian where (aktif = 1 and nama_ujian like '%".$key."%')";
	$ujian_hasil_siswa = mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");	
}
else
{
	$sql = "SELECT * from ujian where aktif = 1;";									
	$ujian_hasil_siswa = mysqli_query($koneksi, $sql) or exit("Error query: <b>".$sql."</b>.");
}




function generate_token(){
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	echo substr(str_shuffle($permitted_chars), 0, 6);	
}

function konversi_status($no) {
	if($no==1) {
		$status = 'Aktif';
	} else {
		$status = 'Tidak Aktif';
	}
	echo $status;
}

if (isset($_POST['hapusUjian'])) {
	$idUjian= $_POST['id'];
	$user = $_POST['user'];
	$sql = "DELETE from ujian where id_ujian = '$idUjian'";
	mysqli_query($koneksi, $sql) or die(mysqli_error());
	if ($user == '1') {
		echo "<script> alert ('Data ujian berhasil dihapus');
		document.location='indexadmin.php?page=ujian';
		</script>";
	}elseif ($user == '2') {
		echo "<script> alert ('Data ujian berhasil dihapus');
		document.location='indexguru.php?page=ujian';
		</script>";
	}
	

}

if (isset($_POST['updateUjian'])){
	$user = $_POST['user'];
	$id_ujian = $_POST['id_ujian'];
	$nama_ujian = $_POST['namaUjian'];
	$pelajaran= $_POST['pelajaranUjian'];
	$guru = $_POST['guruUjian'];
	$aktif = $_POST['statusUjian'];
	$sql = "UPDATE ujian SET nama_ujian='$nama_ujian', id_pelajaran='$pelajaran', nik_guru='$guru',aktif='$aktif' WHERE id_ujian='$id_ujian' ";
	mysqli_query($koneksi, $sql) or die(mysqli_error());
	if ($user == '1') {
		echo "<script> alert ('Data ujian berhasil diubah');
		document.location='indexadmin.php?page=ujian';
		</script>";
	}elseif ($user == '2') {
		echo "<script> alert ('Data ujian berhasil diubah');
		document.location='indexguru.php?page=ujian';
		</script>";
	}
}

if (isset($_POST['tambahUjian'])) {
	$user = $_POST['user'];
	$namaUjian= $_POST['namaUjian'];
	$pelajaran= $_POST['pelajaranUjian'];
	$guru= $_POST['guruUjian'];
	$token= $_POST['tokenUjian'];
	$aktif= $_POST['statusUjian'];

	mysqli_query($koneksi, "INSERT into ujian values ('','$pelajaran','$namaUjian','$guru','$token','$aktif')") or die(mysqli_error());
	if ($user == '1') {
		echo "<script> alert ('Data ujian berhasil ditambahkan');
		document.location='indexadmin.php?page=ujian';
		</script>";
	}elseif ($user == '2') {
		echo "<script> alert ('Data ujian berhasil ditambahkan');
		document.location='indexguru.php?page=ujian';
		</script>";
	}

}

if (isset($_POST['konfirmasiToken'])) {
	$token = $_POST['tokenUjian'];
	$id = $_POST['idUjian'];
	$dt = mysqli_query($koneksi, "SELECT token_ujian from ujian where id_ujian = '$id'") or die(mysqli_error());
	$data = mysqli_fetch_array($dt);

	if ($token == $data['token_ujian']) {
		echo "<script>
		document.location='indexsiswa.php?page=ujiandetail&id=".$id."';
		</script>";
	}else{
		echo "<script> alert ('Token yang anda masukkan salah');
		document.location='indexsiswa.php?page=ujian';
		</script>";
	}
}





//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
///////////////////////////////////// SOAL


if (isset($_POST['tambahSoal'])) {
	$user = $_POST['user'];
	$idujian = $_GET['id_ujian'];
	$id = $_POST['idUjian'];
	$soal= $_POST['soal'];
	$jawaban= $_POST['kunci'];
	$pre= preproses($_POST['kunci']);

	mysqli_query($koneksi, "INSERT into soal values ('','$id','$soal','$jawaban','$pre')");
	if ($user == '1') {
		echo "<script> alert ('Data soal berhasil ditambahkan');
		document.location='indexadmin.php?page=kelolaujian&id_ujian=".$idujian."';
		</script>";
	}elseif ($user == '2') {
		echo "<script> alert ('Data soal berhasil ditambahkan');
		document.location='indexguru.php?page=kelolaujian&id_ujian=".$idujian."';
		</script>";
	}

}


if (isset($_POST['updateSoal'])) {
	$user = $_POST['user'];
	$idujian = $_POST['idUjian'];
	$id = $_POST['id_soal'];
	$soal= $_POST['soal'];
	$jawaban= $_POST['kunci'];
	$pre= preproses($_POST['kunci']);

	mysqli_query($koneksi, "UPDATE soal set soal = '$soal', kunci_jawaban = '$jawaban', kunci_jawaban_stem = '$pre' where id_soal = '$id'");
	if ($user == '1') {
		echo "<script> alert ('Data soal berhasil diubah');
		document.location='indexadmin.php?page=kelolaujian&id_ujian=".$idujian."';
		</script>";
	}elseif ($user == '2') {
		echo "<script> alert ('Data soal berhasil diubah');
		document.location='indexguru.php?page=kelolaujian&id_ujian=".$idujian."';
		</script>";
	}

}


if (isset($_POST['hapusSoal'])) {
	$idujian = $_GET['id_ujian'];
	$idsoal= $_POST['id'];
	$user = $_POST['user'];
	$sql = "DELETE from soal where id_soal = '$idsoal'";
	mysqli_query($koneksi, $sql) or die(mysqli_error());
	if ($user == '1') {
		echo "<script> alert ('Data soal berhasil dihapus');
		document.location='indexadmin.php?page=kelolaujian&id_ujian=".$idujian."';
		</script>";
	}elseif ($user == '2') {
		echo "<script> alert ('Data soal berhasil dihapus');
		document.location='indexguru.php?page=kelolaujian&id_ujian=".$idujian."';
		</script>";
	}
}






//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//////////////////////////////////// PELAJARAN


if (isset($_POST['hapusPelajaran'])) {
	$idPelajaran= $_POST['id'];
	$sql = "DELETE from pelajaran where id_pelajaran = '$idPelajaran'";
	mysqli_query($koneksi, $sql) or die(mysqli_error());
	echo "<script> alert ('Data pelajaran berhasil dihapus');
	document.location='indexadmin.php?page=pelajaran';
	</script>";

}

if (isset($_POST['updatePelajaran'])){

	$id_pelajaran = $_POST['id_pelajaran'];
	$nama_pelajaran = $_POST['nama_pelajaran'];
	$sql = "UPDATE pelajaran SET nama_pelajaran='$nama_pelajaran' WHERE id_pelajaran='$id_pelajaran' ";
	if (mysqli_query($koneksi, $sql)) {
		echo "<script> alert ('Data pelajaran berhasil diubah');	
		document.location='indexadmin.php?page=pelajaran';
		</script>";
	}
	else{
		echo "ERROR, data gagal diupdate". mysqli_error();
	}
}


if (isset($_POST['simpanPelajaran'])) {
	$namaPelajaran= $_POST['namaPelajaran'];
	mysqli_query($koneksi, "INSERT into pelajaran values ('','$namaPelajaran')") or die(mysqli_error());
	echo "<script> alert ('Data pelajaran berhasil ditambahkan');
	document.location='indexadmin.php?page=pelajaran';
	</script>";
}


//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//

/////////////////////////////////// GURU

if (isset($_POST['cariGuru'])) {
	$key = $_POST['txtCari'];
	$sql = "SELECT * from guru where nama_guru like '%".$key."%' order by nama_guru";
	$guru_hasil = mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");	
}
else
{
	$sql = "SELECT * from guru order by nama_guru";
	$guru_hasil = mysqli_query($koneksi, $sql) or exit("Error query: <b>".$sql."</b>.");
}


if (isset($_POST['guruTambah']))
{
	$lokasi_file = $_FILES['foto-guru']['tmp_name'];
	$tipe_file   = $_FILES['foto-guru']['type'];
	$nama_file   = $_FILES['foto-guru']['name'];
	$direktori   = "../img/guru/$nama_file";
	if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$direktori); 
		$sql = "INSERT INTO guru (nik_guru, nama_guru, pass_guru,id_pelajaran, foto_guru)";
		$sql.= "VALUES ('".$_POST['nikGuru']."', '".$_POST['namaGuru']."','123456', '".$_POST['pelajaranGuru']."','$nama_file')";
		mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
		echo "<script> alert ('Data guru berhasil ditambahkan');
		document.location='indexadmin.php?page=guru';
		</script>";
	}
	
}  

if (isset($_POST['hapusGuru'])) {
	$nikGuru= $_POST['id'];
	$sql = "DELETE from guru where nik_guru = '$nikGuru'";
	mysqli_query($koneksi, $sql) or die(mysqli_error());
	echo "<script> alert ('Data guru berhasil dihapus');
	document.location='indexadmin.php?page=guru';
	</script>";

}

if (isset($_POST['guruSimpan']))
{

	$lokasi_file = $_FILES['foto-guru']['tmp_name'];
	$tipe_file   = $_FILES['foto-guru']['type'];
	$nama_file   = $_FILES['foto-guru']['name'];
	$direktori   = "../img/guru/$nama_file";
	if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$direktori); 
		$sql = "UPDATE guru SET ";
		$sql.= "nama_guru='".$_POST['namaGuru']."', id_pelajaran='".$_POST['pelajaranGuru']."', foto_guru='$nama_file'";
		$sql.= "WHERE nik_guru = ".$_POST['nikGuru'];
		mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
		echo "<script> alert ('Data guru berhasil diubah');
		document.location='indexadmin.php?page=guru';
		</script>";
	}
	
}

//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//////////////////////////////////SISWA



if (isset($_POST['cariSiswa'])) {
	$key = $_POST['txtCari'];
	$sql = "SELECT * from siswa where nama_siswa like '%".$key."%'";
	$siswa_hasil = mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");	
}
else
{
	$sql = "SELECT * from siswa";									
	$siswa_hasil = mysqli_query($koneksi, $sql) or exit("Error query: <b>".$sql."</b>.");
}


if (isset($_POST['siswaSimpan']))
{

	$lokasi_file = $_FILES['foto-siswa']['tmp_name'];
	$tipe_file   = $_FILES['foto-siswa']['type'];
	$nama_file   = $_FILES['foto-siswa']['name'];
	$direktori   = "../img/siswa/$nama_file";
	if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$direktori); 
		$sql = "UPDATE siswa SET ";
		$sql.= "nama_siswa='".$_POST['namaSiswa']."', nama_kelas='".$_POST['kelasSiswa']."', foto_siswa='$nama_file'";
		$sql.= "WHERE nis_siswa = ".$_POST['nisSiswa'];
		mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
		echo "<script> alert ('Data siswa berhasil diubah');
		document.location='indexadmin.php?page=siswa';
		</script>";
	}
	
}

if (isset($_POST['siswaTambah']))
{
	$lokasi_file = $_FILES['foto-siswa']['tmp_name'];
	$tipe_file   = $_FILES['foto-siswa']['type'];
	$nama_file   = $_FILES['foto-siswa']['name'];
	$direktori   = "../img/siswa/$nama_file";
	if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$direktori); 
		$sql = "INSERT INTO siswa(nama_siswa, nis_siswa,nama_kelas, pass_siswa, foto_siswa)";
		$sql.= "VALUES ('".$_POST['namaSiswa']."', '".$_POST['nisSiswa']."', '".$_POST['kelasSiswa']."','123456','$nama_file')";
		mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
		echo "<script> alert ('Data siswa berhasil ditambahkan');
		document.location='indexadmin.php?page=siswa';
		</script>";
	}
	
}
if (isset($_POST['hapusSiswa'])) {
	$idSiswa= $_POST['id'];
	$sql = "DELETE from siswa where nis_siswa = '$idSiswa'";
	mysqli_query($koneksi, $sql) or die(mysqli_error());
	echo "<script> alert ('Data siswa berhasil dihapus');
	document.location='indexadmin.php?page=siswa';
	</script>";

}

//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
////////////////////////////////////////// ADMIN



if (isset($_POST['cariAdmin'])) {
	$key = $_POST['txtCari'];
	$sql = "SELECT * from admin where nama_admin like '%".$key."%'";
	$admin_hasil = mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");	
}
else
{
	$sql = "SELECT * from admin";									
	$admin_hasil = mysqli_query($koneksi, $sql) or exit("Error query: <b>".$sql."</b>.");
}

if (isset($_POST['adminSimpan']))
{

	$lokasi_file = $_FILES['foto-admin']['tmp_name'];
	$tipe_file   = $_FILES['foto-admin']['type'];
	$nama_file   = $_FILES['foto-admin']['name'];
	$direktori   = "../img/admin/$nama_file";
	if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$direktori); 
		$sql = "UPDATE admin SET ";
		$sql.= "nama_admin='".$_POST['namaAdmin']."', foto_admin='$nama_file'";
		$sql.= "WHERE id_admin = ".$_POST['idAdmin'];
		mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
		echo "<script> alert ('Data admin berhasil diubah');
		document.location='indexadmin.php?page=admin';
		</script>";
	}
	
}

if (isset($_POST['adminTambah']))
{
	$lokasi_file = $_FILES['foto-admin']['tmp_name'];
	$tipe_file   = $_FILES['foto-admin']['type'];
	$nama_file   = $_FILES['foto-admin']['name'];
	$direktori   = "../img/admin/$nama_file";
	if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$direktori); 
		$sql = "INSERT INTO admin(id_admin , nama_admin, uname_admin, pass_admin, foto_admin)";
		$sql.= "VALUES ( '','".$_POST['namaAdmin']."','".$_POST['unameAdmin']."','123456','$nama_file')";
		mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
		echo "<script> alert ('Data admin berhasil ditambahkan');
		document.location='indexadmin.php?page=admin';
		</script>";
	}
	
}
if (isset($_POST['hapusAdmin'])) {
	$idAdmin= $_POST['id'];
	$sql = "DELETE from admin where id_admin = '$idAdmin'";
	mysqli_query($koneksi, $sql) or die(mysqli_error());
	echo "<script> alert ('Data admin berhasil dihapus');
	document.location='indexadmin.php?page=admin';
	</script>";

}



//-----------------------------------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------------------------------------------------//
////////////////////////////////////////// PROFIL


if (isset($_POST['adminSimpanProfil']))
{
	
	$lokasi_file = $_FILES['foto-admin']['tmp_name'];
	$tipe_file   = $_FILES['foto-admin']['type'];
	$nama_file   = $_FILES['foto-admin']['name'];
	$direktori   = "../img/admin/$nama_file";
	if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$direktori); 
		$sql = "UPDATE admin SET ";
		$sql.= "nama_admin='".$_POST['namaAdmin']."', pass_admin ='".$_POST['passAdmin']."' , foto_admin='$nama_file'";
		$sql.= "WHERE id_admin = ".$_POST['idAdmin'];
		mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
		echo "<script> alert ('Data profil berhasil diubah');
		document.location='indexadmin.php?page=home';
		</script>";
	}
}

if (isset($_POST['siswaSimpanProfil']))
{
	
	$lokasi_file = $_FILES['foto-siswa']['tmp_name'];
	$tipe_file   = $_FILES['foto-siswa']['type'];
	$nama_file   = $_FILES['foto-siswa']['name'];
	$direktori   = "../img/siswa/$nama_file";
	if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$direktori); 
		$sql = "UPDATE siswa SET ";
		$sql.= "nama_siswa='".$_POST['namaSiswa']."', pass_siswa ='".$_POST['passSiswa']."' , foto_siswa='$nama_file'";
		$sql.= "WHERE nis_siswa = ".$_POST['nisSiswa'];
		mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
		echo "<script> alert ('Data profil berhasil diubah');
		document.location='indexsiswa.php?page=home';
		</script>";
	}
}

if (isset($_POST['guruSimpanProfil']))
{
	
	$lokasi_file = $_FILES['foto-guru']['tmp_name'];
	$tipe_file   = $_FILES['foto-guru']['type'];
	$nama_file   = $_FILES['foto-guru']['name'];
	$direktori   = "../img/guru/$nama_file";
	if (!empty($lokasi_file)) {
		move_uploaded_file($lokasi_file,$direktori); 
		$sql = "UPDATE guru SET ";
		$sql.= "nama_guru='".$_POST['namaGuru']."', pass_guru ='".$_POST['passGuru']."' , foto_guru='$nama_file'";
		$sql.= "WHERE nik_guru = ".$_POST['nikGuru'];
		mysqli_query($koneksi, $sql) or exit("Error query : <b>".$sql."</b>.");
		echo "<script> alert ('Data profil berhasil diubah');
		document.location='indexguru.php?page=home';
		</script>";
	}
}

//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
///////////////////////////////////////// HOME





//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
////////////////////////////////////////// NILAI SISWA




//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
//------------------------------------------------------------------------------------------------------------------------------------------------------//
/////////////////////////////////////
//FUNGSI PENCOCOKAN //
///////////////////////////////////////



//membersihkan simbol dan angka
function hapus_simbol($string) {
	$string = strtolower($string);
	$string2 = preg_replace('/[^A-Za-z0-9\-]/', ' ', $string);
	return preg_replace('/\s+/', ' ',$string2);
}

//memecah per kata
function pecah_kata($kalimat) {
	$data = explode(" ",$kalimat);
	return $data;
}

////////////////////////////////////////
/// STEMMING  fungsi START  //////////
////////////////////////////////

function cekKamus($kata){ 
	include 'koneksi.php';
	$sql = mysqli_query($koneksi, "SELECT word from dictionary where word ='$kata' LIMIT 1");
	$result = mysqli_num_rows($sql);
	
	if($result==1){
		return true; // True jika ada
	}else{
		 return false; // jika tidak ada FALSE
		}
	}

//fungsi untuk menghapus suffix seperti -ku, -mu, -kah, dsb
	function Del_Inflection_Suffixes($kata){ 
		$kataAsal = $kata;

	if(preg_match('/([km]u|nya|[kl]ah|pun)\z/i',$kata)){ // Cek Inflection Suffixes
		$__kata = preg_replace('/([km]u|nya|[kl]ah|pun)\z/i','',$kata);

		return $__kata;
	}
	return $kataAsal;
}



// Hapus Derivation Suffixes ("-i", "-an" atau "-kan")
function Del_Derivation_Suffixes($kata){
	$kataAsal = $kata;
	if(preg_match('/(i|an)\z/i',$kata)){ // Cek Suffixes
		$__kata = preg_replace('/(i|an)\z/i','',$kata);
		if(cekKamus($__kata)){ // Cek Kamus
			return $__kata;
		}else if(preg_match('/(kan)\z/i',$kata)){
			$__kata = preg_replace('/(kan)\z/i','',$kata);
			if(cekKamus($__kata)){
				return $__kata;
			}
		}
		/*– Jika Tidak ditemukan di kamus –*/
	}
	return $kataAsal;
}

// Hapus Derivation Prefix ("di-", "ke-", "se-", "te-", "be-", "me-", atau "pe-")
function Del_Derivation_Prefix($kata){
	$kataAsal = $kata;

	/* —— Tentukan Tipe Awalan ————*/
	if(preg_match('/^(di|[ks]e)/',$kata)){ // Jika di-,ke-,se-
		$__kata = preg_replace('/^(di|[ks]e)/','',$kata);
		
		if(cekKamus($__kata)){
			return $__kata;
		}
		
		$__kata__ = Del_Derivation_Suffixes($__kata);

		if(cekKamus($__kata__)){
			return $__kata__;
		}
		
		if(preg_match('/^(diper)/',$kata)){ //diper-
			$__kata = preg_replace('/^(diper)/','',$kata);
			$__kata__ = Del_Derivation_Suffixes($__kata);

			if(cekKamus($__kata__)){
				return $__kata__;
			}
			
		}
		
		if(preg_match('/^(ke[bt]er)/',$kata)){  //keber- dan keter-
			$__kata = preg_replace('/^(ke[bt]er)/','',$kata);
			$__kata__ = Del_Derivation_Suffixes($__kata);

			if(cekKamus($__kata__)){
				return $__kata__;
			}
		}

	}
	
	if(preg_match('/^([bt]e)/',$kata)){ //Jika awalannya adalah "te-","ter-", "be-","ber-"

	$__kata = preg_replace('/^([bt]e)/','',$kata);
	if(cekKamus($__kata)){
			return $__kata; // Jika ada balik
		}
		
		$__kata = preg_replace('/^([bt]e[lr])/','',$kata);	
		if(cekKamus($__kata)){
			return $__kata; // Jika ada balik
		}	
		
		$__kata__ = Del_Derivation_Suffixes($__kata);
		if(cekKamus($__kata__)){
			return $__kata__;
		}
	}
	
	if(preg_match('/^([mp]e)/',$kata)){
		$__kata = preg_replace('/^([mp]e)/','',$kata);
		if(cekKamus($__kata)){
			return $__kata; // Jika ada balik
		}
		$__kata__ = Del_Derivation_Suffixes($__kata);
		if(cekKamus($__kata__)){
			return $__kata__;
		}
		
		if(preg_match('/^(memper)/',$kata)){
			$__kata = preg_replace('/^(memper)/','',$kata);
			if(cekKamus($kata)){
				return $__kata;
			}
			$__kata__ = Del_Derivation_Suffixes($__kata);
			if(cekKamus($__kata__)){
				return $__kata__;
			}
		}
		
		if(preg_match('/^([mp]eng)/',$kata)){
			$__kata = preg_replace('/^([mp]eng)/','',$kata);
			if(cekKamus($__kata)){
				return $__kata; // Jika ada balik
			}
			$__kata__ = Del_Derivation_Suffixes($__kata);
			if(cekKamus($__kata__)){
				return $__kata__;
			}
			
			$__kata = preg_replace('/^([mp]eng)/','k',$kata);
			if(cekKamus($__kata)){
				return $__kata; // Jika ada balik
			}
			$__kata__ = Del_Derivation_Suffixes($__kata);
			if(cekKamus($__kata__)){
				return $__kata__;
			}
		}
		
		if(preg_match('/^([mp]eny)/',$kata)){
			$__kata = preg_replace('/^([mp]eny)/','s',$kata);
			if(cekKamus($__kata)){
				return $__kata; // Jika ada balik
			}
			$__kata__ = Del_Derivation_Suffixes($__kata);
			if(cekKamus($__kata__)){
				return $__kata__;
			}
		}
		
		if(preg_match('/^([mp]e[lr])/',$kata)){
			$__kata = preg_replace('/^([mp]e[lr])/','',$kata);
			if(cekKamus($__kata)){
				return $__kata; // Jika ada balik
			}
			$__kata__ = Del_Derivation_Suffixes($__kata);
			if(cekKamus($__kata__)){
				return $__kata__;
			}
		}
		
		if(preg_match('/^([mp]en)/',$kata)){
			$__kata = preg_replace('/^([mp]en)/','t',$kata);
			if(cekKamus($__kata)){
				return $__kata; // Jika ada balik
			}
			$__kata__ = Del_Derivation_Suffixes($__kata);
			if(cekKamus($__kata__)){
				return $__kata__;
			}
			
			$__kata = preg_replace('/^([mp]en)/','',$kata);
			if(cekKamus($__kata)){
				return $__kata; // Jika ada balik
			}
			$__kata__ = Del_Derivation_Suffixes($__kata);
			if(cekKamus($__kata__)){
				return $__kata__;
			}
		}

		if(preg_match('/^([mp]em)/',$kata)){
			$__kata = preg_replace('/^([mp]em)/','',$kata);
			if(cekKamus($__kata)){
				return $__kata; // Jika ada balik
			}
			$__kata__ = Del_Derivation_Suffixes($__kata);
			if(cekKamus($__kata__)){
				return $__kata__;
			}
			
			$__kata = preg_replace('/^([mp]em)/','p',$kata);
			if(cekKamus($__kata)){
				return $__kata; // Jika ada balik
			}
			
			$__kata__ = Del_Derivation_Suffixes($__kata);
			if(cekKamus($__kata__)){
				return $__kata__;
			}
		}	
	}
	return $kataAsal;
}




//////////////////////////
/// STEMING FUNGSI END
///////////////////////////////////



function cari_kata_dasar($kata){ 

	$kataAsal = $kata;

	$cekKata = cekKamus($kata);
	if($cekKata == true){ // Cek Kamus
		return $kata; // Jika Ada maka kata tersebut adalah kata dasar
	}else{ //jika tidak ada dalam kamus maka dilakukan stemming
		$kata = Del_Inflection_Suffixes($kata);
		if(cekKamus($kata)){
			return $kata;
		}
		
		$kata = Del_Derivation_Suffixes($kata);
		if(cekKamus($kata)){
			return $kata;
		}
		
		$kata = Del_Derivation_Prefix($kata);
		if(cekKamus($kata)){
			return $kata;
		}
	}
}


//mencari sampai hasil stem untuk guru
function preproses($input) {
	include 'koneksi.php';
	$data_pecah = pecah_kata(hapus_simbol($input));
	for($i=0;$i<count($data_pecah);$i++){

		$result=mysqli_query($koneksi, "SELECT kata FROM katahubung WHERE kata = '$data_pecah[$i]'");
		$jml=mysqli_num_rows($result); 
		
		if($jml>0){
			$cek_filtering[$i] = '';
		}else{
			$cek_filtering[$i] = $data_pecah[$i];
		};

	}           
	$hasil_filtering = strtolower(implode(" ",$cek_filtering));
	$array_data_filtering = explode(" ",$hasil_filtering);
	$data_stem = array();
	
	foreach($array_data_filtering as $katasteming) {	
		$data_stem[] = cari_kata_dasar($katasteming);
		$i++;
	}
	
	$x1= implode(' ',$data_stem);
	
	$data = $x1;
	return $data;
}

function konversi($nilai){
	$nilai_akhir = 0;
	if ($nilai >= 0.01 && $nilai <= 0.10) {
		return $nilai_akhir= 10;
	}elseif ($nilai > 0.10 && $nilai <= 0.20) {
		return $nilai_akhir= 20;
	}elseif ($nilai > 0.20 && $nilai <= 0.30) {
		return $nilai_akhir= 30;
	}elseif ($nilai > 0.30 && $nilai <= 0.40) {
		return $nilai_akhir= 40;
	}elseif ($nilai > 0.40 && $nilai <= 0.50) {
		return $nilai_akhir= 50;
	}elseif ($nilai > 0.50 && $nilai <= 0.60) {
		return $nilai_akhir= 60;
	}elseif ($nilai > 0.60 && $nilai <= 0.70) {
		return $nilai_akhir= 70;
	}elseif ($nilai > 0.70 && $nilai <= 0.80) {
		return $nilai_akhir= 80;
	}elseif ($nilai > 0.80 && $nilai <= 0.90) {
		return $nilai_akhir= 90;
	}elseif ($nilai > 0.90) {
		return $nilai_akhir = 100;
	}
}

?>