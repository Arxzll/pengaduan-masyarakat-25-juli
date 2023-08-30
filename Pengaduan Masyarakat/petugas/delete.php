<?php
 include '../koneksi.php';
 $id_pengaduan = $_GET['id_pengaduan'];
    $koneksi->query("DELETE FROM `pengaduan` WHERE id_pengaduan=$id_pengaduan");
    header('location:laporan.php');