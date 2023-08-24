<?php 

class masyarakat{
    public $nik;
    public $nama;
    public $username;
    public $password;
    public $telp;

    function __construct($nik, $nama, $username, $password, $telp){
        $this ->nik = $nik;
        $this ->nama = $nama;
        $this ->username = $username;
        $this ->password = $password;
        $this ->telp = $telp;
    }
    function tampil(){
        echo $this->nik;
        echo $this->nama;
        echo $this->username;
        echo $this->password;
        echo $this->telp;
       }
    function tambah(){
        include 'koneksi.php';
        $koneksi->query("INSERT INTO `masyarakat` VALUES ('$this->nik','$this->nama','$this->username','$this->password','$this->telp')");
    }

    function hapus(){
        include 'koneksi.php';
        $koneksi->query("DELETE FROM `masyarakat` WHERE nik=$this->nik");
    }
    function update($nama,$datausername,$datapassword,$telp){
        include 'koneksi.php';
        $koneksi->query("UPDATE `masyarakat` SET `nama`='$nama',`username`='$datausername',`password`='$datapassword',`telp`='$telp' WHERE nik='$this->nik'");
    }
}

$warga = new masyarakat('103','alif','alif','alifganteng11','0812345');
$warga->update("skyelite","abe","skyelite01","123456");