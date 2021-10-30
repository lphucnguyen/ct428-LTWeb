<?php
    include("../../core/init.php");
    if(isset($_POST['themloaihang'])){
        $maloaihang = $_POST['MaLoaiHang'];
        $tenloaihang = $_POST['TenLoaiHang'];
        $sql = "INSERT INTO loaihanghoa(MaLoaiHang,TenLoaiHang) VALUE('".$maloaihang."','".$tenloaihang."')";
        mysqli_query($db, $sql);
    }
    else
        echo 'aaa';
    // header('Location: ' . $_SERVER['HTTP_REFERER']);
?>