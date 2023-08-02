<?php 

class masyarakat{
    public $id_petugas;
    public $nama_petugas;
    public $username;
    public $password;
    public $telp;

    function __construct($id_petugas, $nama, $username, $password, $telp){
        $this ->id_petugas = $id_petugas;
        $this ->nama = $nama;
        $this ->username = $username;
        $this ->password = $password;
        $this ->telp = $telp;
    }
    function tampil(){
        echo $this->id_petugas;
        echo $this->nama;
        echo $this->username;
        echo $this->password;
        echo $this->telp;
       }
    function tambah(){
        include 'koneksi.php';
        $koneksi->query("INSERT INTO `masyarakat` VALUES ('$this->id_petugas','$this->nama','$this->username','$this->password','$this->telp')");
    }

    function hapus(){
        include 'koneksi.php';
        $koneksi->query("DELETE FROM `masyarakat` WHERE id_petugas=$this->id_petugas");
    }
    function update($nama,$datausername,$datapassword,$telp){
        include 'koneksi.php';
        $koneksi->query("UPDATE `masyarakat` SET `nama`='$nama',`username`='$datausername',`password`='$datapassword',`telp`='$telp' WHERE id_petugas='$this->id_petugas'");
    }
}

$warga = new masyarakat('103','alif','alif','alifganteng11','0812345');
$warga->update("skyelite","abe","skyelite01","123456");