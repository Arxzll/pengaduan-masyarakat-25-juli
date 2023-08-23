<?php
include "../koneksi.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$proses_login = $koneksi->query("SELECT * FROM `masyarakat` WHERE username ='$username' AND password='$password';");
$data = mysqli_num_rows($proses_login);
if($data > 0){

  $data = mysqli_fetch_array($proses_login);
  $_SESSION['username'] = $data['username'];
  $_SESSION['nik'] = $data['nik'];
    header("location: ../Halaman Utama/tampilan.php");
}else {
  $_SESSION['username'] = $data['username'];
  $_SESSION['nik'] = $data['nik'];
    echo "Akun Tidak Ada!";
  }
  
?>
