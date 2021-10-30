<?php
    include("../core/init.php");
    if(isset($_POST['themloaihang'])){
        $maloaihang = $_POST['MaLoaiHang'];
        $tenloaihang = $_POST['TenLoaiHang'];
        mysqli_query($db, "INSERT INTO loaihanghoa(MaLoaiHang,TenLoaiHang) VALUE('".$maloaihang."','".$tenloaihang."')");
    }
    else
        echo 'aaa';
    // header('Location: ' . $_SERVER['HTTP_REFERER']);
?>