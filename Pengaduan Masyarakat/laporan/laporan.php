<?php
include "../koneksi.php"; 
session_start();
if(!isset($_SESSION['nik'])){
  header('Location:../login/login.php');
}

$result = mysqli_query($koneksi, "SELECT *
FROM tanggapan
RIGHT JOIN pengaduan
ON pengaduan.id_pengaduan = tanggapan.id_pengaduan;");
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
    <!-- As a heading -->
    <nav class="navbar navbar-dark d-flex justify-content-center"style="border: 1px solid rgba(65, 53, 67, 0.40);
    background: #343334;">
      <div class="container-fluid">
        <div class="navbar-brand mb-0 ">Pengaduan Masyarakat</div>
      </div>
    </nav>
       
      <div class="d-flex">

      
        <div class="d-flex align-items-start" style="width: 120px;
        height: 90vh;
        border-right: 1px solid #343334;
        background: rgba(49, 46, 50, 0.85); opacity:0.9px;">
            <div class="nav flex-column nav-pills me-3 text" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link" href="../Halaman Utama/tampilan.php">Home</a>
              <a class="nav-link" href="../laporan/laporan.php">Laporan</a>
              <a class="nav-link" href="../pengaduan/pengaduan.php">Pengaduan</a>
              <a class="nav-link" href="../logout.php">Log out</a>
          </div>
          
          </div>


          <div style="width: 100%; justify-content: center;">
                <table class="table" style="background-color: #ffff; border-radius:4px; text-align:center;" width="100px">
                  <thead>

                    <tr>
                        <th scope="col">id_pengaduan</th>
                        <th scope="col">tanggal_pengaduan</th>
                        <th scope="col">isi_laporan</th>
                        <th scope="col">foto</th>
                        <th scope="col">Tanggapan</th>
                        <th scope="col">status</th>
                        <th scope="col">opsi</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    <?php  
                      while($user_data = mysqli_fetch_array($result)) {         
                          echo "<tr>";
                          echo "<td>".$user_data['id_pengaduan']."</td>";
                          echo "<td>".$user_data['tgl_pengaduan']."</td>";
                          echo "<td>".$user_data['isi_laporan']."</td>";?>

                          <td><img height="80px" width="100px" src="../image/<?=$user_data['foto']?>"></td>   
                          <?php
                          echo "<td>".$user_data['tanggapan']."</td>";          
                          echo "<td>".$user_data['status']."</td>";    
                          echo "<td><a href='update.php?id_pengaduan=$user_data[id_pengaduan]' class='btn btn-success '>Edit</a>  <a href='delete.php?id_pengaduan=$user_data[id_pengaduan]'class='btn btn-danger'>Delete</a></td></tr>";        
                        }
                      ?>
                    </tbody>
                  </table>
            </div>
         <script src="./bootstrap.min.js"></script>
    </body>
</html>

   <!-- <div style="width: 800px;">
            <table class="table" style="color: aliceblue; width: 800px;">
              <thead>
                <tr>  
                  <th scope="col">id_pengaduan</th>
                  <th scope="col">tanggal_pengaduan</th>
                  <th scope="col">isi_laporan</th>
                  <th scope="col">foto</th>
                  <th scope="col">status</th>
                  <th scope="col">opsi</th>
                </tr>
              </thead>
              <tbody>
    // while($user_data = mysqli_fetch_array($result)) {         
    //     echo "<tr>";
    //     echo "<td>".$user_data['id_pengaduan']."</td>";
    //     echo "<td>".$user_data['tgl_pengaduan']."</td>";
    //     echo "<td>".$user_data['isi_laporan']."</td>";    
    //     echo "<td>".$user_data['foto']."</td>";    
    //     echo "<td>".$user_data['status']."</td>";    
    //     echo "<td><a href='edit.php?id_pengaduan=$user_data[id_pengaduan]'>Edit</a> | <a href='delete.php?id_pengaduan=$user_data[id_pengaduan]'>Delete</a></td></tr>";    
          //    </tbody>
          //   </table>
          // </div>