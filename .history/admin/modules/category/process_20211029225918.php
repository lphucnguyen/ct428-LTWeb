<?php
    include("../../../core/init.php");
    $sql = '';
    if(isset($_POST['themloaihang'])){
        $maloaihang = $_POST['MaLoaiHang'];
        $tenloaihang = $_POST['TenLoaiHang'];
        $sql = "INSERT INTO loaihanghoa(MaLoaiHang,TenLoaiHang) VALUE('".$maloaihang."','".$tenloaihang."')";
    }
    if(isset($_GET['action']) && ($_GET['action']=='xoa')){
        $maloai = $_GET['id']; 
        $sql = "DELETE FROM loaihanghoa WHERE (MaLoaiHang='".$maloai."')";
    }
    if(isset($_POST['sualoaihang'])){
        $maloaihang = $_POST['MaLoaiHang'];
        $tenloaihang = $_POST['TenLoaiHang'];
        $sql = "UPDATE loaihanghoa SET tenloaihang='".$tenloaihang."' WHERE (MaLoaiHang='".$maloaihang."')";
        header('../admin/index.php?module=category');
        exit;
    }
    mysqli_query($db, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>