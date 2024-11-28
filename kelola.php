<?php
 include 'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            $nisn = $_POST['nisn'];
            $nama = $_POST['nama'];
            $photo = $_FILES['photo']['name'];
            $alamat = $_POST['alamat'];
            $created_at = date('Y-m-d H:i:s');

            $dir = "img/";
            $tmp = $_FILES['photo']['tmp_name'];
            $photo_name = $nama."_".$photo;

            move_uploaded_file($tmp, $dir.$photo_name);

            $query = "INSERT INTO siswa VALUES(null,'$nisn','$nama','$photo','$alamat','$created_at',null,null)";
            $sql = mysqli_query($conn,$query);

            if($sql){
                header("location: index.php");
            }else{
                echo $query;
            }
        } elseif($_POST['aksi'] == "edit"){
            var_dump($_POST);
            $id_siswa = $_POST['id_siswa'];
            $nisn = $_POST['nisn'];
            $nama = $_POST['nama'];
            $photo = $_FILES['photo']['name'];
            $alamat = $_POST['alamat'];
            $query = "SELECT * FROM siswa where id_siswa = '$id_siswa;'";
            $sql = mysqli_query($conn,$query);

            $dir = "img/";
            $tmp = $_FILES['photo']['tmp_name'];
            $photo_name = $nama."_".$photo;

            move_uploaded_file($tmp, $dir.$photo_name);

            $result = mysqli_fetch_assoc($sql);
            $created_at = $result['created_at'];
            $update_at = date('Y-m-d H:i:s');

            $query = "UPDATE siswa SET nisn = '$nisn', nama = '$nama', photo = '$photo', alamat = '$alamat', created_at = '$created_at', update_at = '$update_at', delete_at = NULL 
                    WHERE id_siswa = '$id_siswa';";
            $sql = mysqli_query($conn,$query);

            if($sql){
                header("location: index.php");
            }else{
                echo $query;
            }


        }
    }
    if(isset($_GET['hapus'])){
        $id_siswa = $_GET['hapus'];
        $delete_at = date('Y-m-d H:i:s');
        $query = "UPDATE siswa SET delete_at = '$delete_at' WHERE id_siswa = '$id_siswa';";
        $sql = mysqli_query($conn, $query);
        if($sql){
            header("location: index.php");
        }else{
            echo $query;
        }
    }
    
?>
