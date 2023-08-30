<?php
include "../koneksi.php"; 
session_start();
if($_SESSION['level']=="masyarakat"){
header("Location:../Halaman Utama/tampilan");
}
if(!isset($_SESSION)){
    header("Location:../login/login.php");
}
$id_pengaduan = $_GET['id_pengaduan'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="laporan.css">
  <body>
          <div class="container" style="width:100%;">
              <form action="proses_tanggapan.php?id_pengaduan=<?php echo $id_pengaduan?>" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="color: white;">Keluh kesah anda</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="tanggapan"></textarea>
              </div>
              <button type="submit" class="btn btn-success">kirim</button>
                <input type="hidden" name="id_pengaduan">
            
              </form>
            </div>
          
      </div>

         <script src="./bootstrap.min.js"></script>
    </body>
</html>