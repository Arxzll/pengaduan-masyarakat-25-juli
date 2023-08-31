<?php
include '../koneksi.php';


session_start();
if (!isset($_SESSION['nik'])) {
    header('Location:../login/login.php');
}

$id = $_GET['id_pengaduan'];

$query = "select * from pengaduan where id_pengaduan = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$d = mysqli_fetch_assoc($result)
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
        <?php
        include "../koneksi.php";
        $id = $_GET['id_pengaduan'];
        $data = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id'");
        while ($d = mysqli_fetch_array($data)) {


        ?>
            <form action="proses_update.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" style="color: white;">Keluh kesah anda</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="isi_laporan"><?php echo $d['isi_laporan']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="color: white;">Foto</label>
                    <input name="foto" type="file" style="color: white;">
                </div>
                <div class="mb-3">
                <input type="hidden" name="id_pengaduan" value="<?php echo $d['id_pengaduan']; ?>">
                </div>
                <button type="submit" class="btn btn-success">update</button>
                <a href="laporan.php" class="btn btn-danger">Kembali</a>
            </form>
        <?php } ?>
    </div>

    </div>

    <script src="./bootstrap.min.js"></script>
</body>

</html>