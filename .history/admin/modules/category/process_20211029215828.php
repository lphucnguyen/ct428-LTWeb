<?php
    include("../../../core/init.php");
    if(isset($_POST['themloaihang'])){
        $maloaihang = $_POST['MaLoaiHang'];
        $tenloaihang = $_POST['TenLoaiHang'];
        $sql = "INSERT INTO loaihanghoa(MaLoaiHang,TenLoaiHang) VALUE('".$maloaihang."','".$tenloaihang."')";
        mysqli_query($db, $sql);
    }
    if(isset($_GET['action']) && ($_GET['action']=='xoa')){
        echo $_GET['id'];
    }
    // header('Location: ' . $_SERVER['HTTP_REFERER']);
?>