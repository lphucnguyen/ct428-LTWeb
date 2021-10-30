<?php
    if(isset($_POST['themloaihang'])){
        $maloaihang = $_POST['MaLoaiHang'];
        $tenloaihang = $_POST['TenLoaiHang'];
        echo $maloaihang ;
    }
    else
        echo 'aaa';
    // header('Location: ' . $_SERVER['HTTP_REFERER']);
?>