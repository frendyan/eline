<?php
include 'config/koneksi.php';
include 'fungsi2.php';


$berita = "Dalam aktivitas sehari-hari, pengguna internet di Indonesia menggunakan Bahasa Indonesia sebagai bahasa utama.";

$kunci_stem = get_stem($berita);
echo $kunci_stem;
echo "<br/>";

$berita1 = pecah_kata(hapus_simbol($berita));
for($i=0;$i<count($berita1);$i++){

    echo $berita1[$i];
    echo "<br/>";
}

?>