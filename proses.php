<?php
    include 'koneksi.php';

    $id_siswa ='';
    $nisn ='';
    $nama ='';
    $photo ='';
    $alamat ='';

    if(isset($_GET['ubah'])){
        $id_siswa = $_GET['ubah'];

        $query = "SELECT * FROM siswa where id_siswa = '$id_siswa;'";
        $sql = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($sql);

        $nisn =$result['nisn'];
        $nama =$result['nama'];
        $photo =$result['photo'];
        $alamat =$result['alamat'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <title>SKB Tambahan</title>
</head>
<body>
    <div class="container">
    <h5 class="mt-3 mb-5 text-center">SKB Tambahan soal 2</h5>
    <nav class="navbar bg-body-tertiary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand">
            Aplikasi CRUD Data Siswa
            </a>
        </div>
    </nav>
    <form action="kelola.php" method="post" enctype="multipart/form-data">
        <div class="container bg-body-tertiary p-4" style="border-radius: 15px;">
        <input type="hidden" name="id_siswa" value="<?php echo $id_siswa?>">
        <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label"><b>NISN *</b></label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label"><b>Nama Siswa *</b></label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="photo" class="col-sm-2 col-form-label"><b>Photo Siswa *</b></label>
                <div class="col-sm-10">
                <img src="img/<?php echo $result['photo']; ?>" alt="Foto Siswa" style="max-width: 150px; max-height: 150px; margin-bottom: 10px;">
                    <input required type="file" class="form-control" id="photo" name="photo" value="<?php echo $photo;?>">
                </div>
            </div>
            <div class="mb-5 row">
                <label for="alamat" class="col-sm-2 col-form-label"><b>Alamat *</b></label>
                <div class="col-sm-10">
                    <textarea required type="text" class="form-control" id="alamat" name="alamat"><?php echo $alamat ?></textarea>
                </div>
            </div>
            <?php
                if(isset($_GET['ubah'])){
            ?>
                <button class="btn btn-primary" type="sumbit" name="aksi" value="edit">Edit data</button>
            <?php    
                } else {
            ?>
                <button class="btn btn-primary" type="sumbit" name="aksi" value="add">Tambah data</button>
            <?php
                }
            ?>
            <a href="/skb" class="btn btn-danger">Back</a>
        </div>
    </form>
    </div>
</body>
</html>