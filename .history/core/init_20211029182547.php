<?php
    header("Content-type: text/html; charset=utf-8");
    $servername = "localhost";
    $username = "root";
    $password = "long2000;
    $dbname = "quanlybanhang1";

    $db = mysqli_connect($servername, $username, $password, $dbname);

    if(mysqli_connect_errno()){
        exit("Loi khi ket khoi Database");
    }

    mysqli_set_charset($db, "UTF8");
?>