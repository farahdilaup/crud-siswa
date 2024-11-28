<?php

    include 'koneksi.php';

    $query = "SELECT * FROM siswa WHERE delete_at IS NULL";
    $sql = mysqli_query($conn, $query);
    
    $no = 0;

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
    <a href="proses.php" class="btn btn-secondary mb-3">+ Tambah data</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <th class="text-center">No.</th>
                <th class="text-center">NISN</th>
                <th class="text-center">Nama Siswa</th>
                <th class="text-center">Photo Siswa</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Aksi</th>
            </thead>
            <tbody>
                <?php
                    while($result = mysqli_fetch_assoc($sql)){
                ?>
            <tr>
                <td class="text-center"><?php echo ++$no ?>.</td>
                <td class="text-center"><?php  echo $result['nisn'];?></td>
                <td class="text-center"><?php  echo $result['nama'];?></td>
                <td class="text-center"><img src="img/<?php  echo $result['photo'];?>" alt="" style="width: 150px;"></td>
                <td class="text-center"><?php  echo $result['alamat'];?></td>
                <td class="text-center">
                    <a href="proses.php?ubah=<?php echo $result['id_siswa'];?>" class="btn btn-primary">Edit</a>
                    <a href="kelola.php?hapus=<?php echo $result['id_siswa'];?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">Delete</a>
                </td>
            </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>