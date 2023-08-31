<?php

// die();
include "../koneksi.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$proses_login = $koneksi->query("SELECT * FROM `masyarakat` WHERE username ='$username' AND password='$password';");
$data = mysqli_num_rows($proses_login);
if($data > 0){
  // echo "Masyarakat";
  // die();
  $data = mysqli_fetch_array($proses_login);
  $_SESSION['username'] = $data['username'];
  $_SESSION['nik'] = $data['nik'];
  $_SESSION['level'] ='masyarakat';  
  header("location: ../Halaman Utama/tampilan.php");
}else {

$proses_login = $koneksi->query("SELECT * FROM `petugas` WHERE username ='$username' AND password='$password' AND level='petugas';");
$data = mysqli_num_rows($proses_login);
if($data > 0){
  // echo "Masyarakat";
  // die();
  $data = mysqli_fetch_array($proses_login);
  $_SESSION['username'] = $data['username'];
  $_SESSION['id_petugas'] = $data['id_petugas'];
  $_SESSION['level'] ='petugas';  
  header("location: ../petugas/tampilan.php");
  exit();
}else {

  $proses_login = $koneksi->query("SELECT * FROM `petugas` WHERE username ='$username' AND password='$password' AND level='admin';");
  $data = mysqli_num_rows($proses_login);
  if($data > 0){
    // echo "admin";
    // die();
  
    $data = mysqli_fetch_array($proses_login);
    $_SESSION['username'] = $data['username'];       
    $_SESSION['id_petugas'] = $data['id_petugas'];
    $_SESSION['level'] = $data['level'];
      header("location: ../admin/tampilan.php");
  }
  else{
    echo "akun tidak ada";
  }
  } 
}
?>


<!-- 
  require '../koneksi.php';

session_start();$username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username = '$username'");

        // cek apakah ada hasil dari query
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['id_petugas'] = $row['id_petugas'];

            if (password_verify($password, $row['password'])) {
                echo "
                    <script>
                        alert('Selamat datang $username di pengaduan masyarakat');
                        document.location.href = '../Halaman Utama/tampilan.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Password yang Anda masukkan salah');
                        document.location.href = '../login.php';
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Akun anda belum terdaftar');
                    document.location.href = '../login.php';
                </script>
            ";
        }
    

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username = '$username'");

        // cek apakah ada hasil dari query
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['nik'] = $row['nik'];

            if (password_verify($password, $row['password'])) {
                echo "
                    <script>
                        alert('Selamat datang $username di pengaduan masyarakat');
                        document.location.href = '../Halaman Utama/tampilan.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Password yang Anda masukkan salah');
                        document.location.href = '../login/login.php';
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Akun anda belum terdaftar');
                    document.location.href = '../login.php';
                </script>
            ";
        }
    } -->