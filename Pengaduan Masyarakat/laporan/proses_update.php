<?php
include '../koneksi.php';
session_start();
if(!isset($_SESSION['nik'])){
header("Location:../login/login.php");
}

$id = $_POST['id_pengaduan'];
$isi = $_POST['isi_laporan'];
$nama_foto = $_FILES['foto']['name'];
$asal_foto =$_FILES['foto']['tmp_name'];

$result = $koneksi->query("UPDATE pengaduan SET isi_laporan='$isi', foto='$nama_foto' 
WHERE id_pengaduan='$id'");
// echo $_POST 
// var_dump($_FILES['foto']);
//file foto
if($result){
    move_uploaded_file($asal_foto, "../image/$nama_foto");
header("location:laporan.php");
}
?>