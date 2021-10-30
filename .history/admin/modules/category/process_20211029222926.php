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

    mysqli_query($db, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>