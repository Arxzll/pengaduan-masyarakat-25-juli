<?php
include "../koneksi.php";
$status = '0';
$isi = $_POST['isi_laporan'];
$nik = '243534543';
$nama_foto = $_FILES['foto']['name'];
$asal_foto =$_FILES['foto']['tmp_name'];
$tanggal = date('Y-m-d');
$id_pengaduan = ['id_pengaduan'];

$proses_pengaduan = $koneksi->query("INSERT INTO `pengaduan`(`tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES ('$tanggal','$nik','$isi','$nama_foto','$status')");
// echo $_POST 
// var_dump($_FILES['foto']);
//file foto
move_uploaded_file($asal_foto, "../image/$nama_foto");
header("location:../laporan/laporan.php");
?>