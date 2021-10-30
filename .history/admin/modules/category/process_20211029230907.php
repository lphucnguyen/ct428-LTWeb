<?php
    include("../../../core/init.php");
    $sql = '';
    if(isset($_POST['themloaihang'])){
        $maloaihang = $_POST['MaLoaiHang'];
        $tenloaihang = $_POST['TenLoaiHang'];
        $sql = "INSERT INTO loaihanghoa(MaLoaiHang,TenLoaiHang) VALUE('".$maloaihang."','".$tenloaihang."')";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    if(isset($_GET['action']) && ($_GET['action']=='xoa')){
        $maloai = $_GET['id']; 
        $sql = "DELETE FROM loaihanghoa WHERE (MaLoaiHang='".$maloai."')";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    if(isset($_POST['sualoaihang'])){
        $maloaihang = $_POST['MaLoaiHang'];
        $tenloaihang = $_POST['TenLoaiHang'];
        $sql = "UPDATE loaihanghoa SET tenloaihang='".$tenloaihang."' WHERE (MaLoaiHang='".$maloaihang."')";
        header('Location:../../index.php?module=category');
    }
    mysqli_query($db, $sql);
?>