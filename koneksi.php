<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'skb';
    $conn = mysqli_connect($host,$user,$pass,$db);
    if($conn){
        // echo "data terhubung";
    }

    mysqli_select_db($conn,$db)
?>