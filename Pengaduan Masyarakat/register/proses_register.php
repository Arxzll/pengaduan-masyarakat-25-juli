<?php

include "../koneksi.php";

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$telp = $_POST['telp'];
$proses_register = $koneksi->query("INSERT INTO `masyarakat` VALUES ('$nik','$nama','$username','$password','$telp')");
if($proses_register){
    header("location: ../Halaman Utama/tampilan.php");
}

?>
?>