<?php
include "../koneksi.php";

session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

if (isset($_GET['id_pengaduan'])) {
    $id_pengaduan = $_GET['id_pengaduan'];
    
    $update_query = "UPDATE pengaduan SET status = 'proses' WHERE id_pengaduan = '$id_pengaduan'";
    
    if (mysqli_query($koneksi, $update_query)) {
        header("Location:laporan.php");
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($koneksi);
    }
} else {
    echo "Invalid report ID.";
}
?>
