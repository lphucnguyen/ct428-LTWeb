<?php
    include("../../../core/init.php");

    // header('Location:../../index.php?module=transaction');
    if(isset($_POST['themhang'])){
        $mshh=$_POST['MSHH'];
	    $tensach=$_POST['TenHH'];
        // $tenhinhanh=$_FILES['hinhanh']['name'];
        // $tenhinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
        $quycach = $_POST['QuyCach'];
        $maloai=$_POST['maloai'];
        $gia=$_POST['Gia'];
        $soluong=$_POST['SoLuongHang'];
        var_dump($_FILES['hinhanh']['name']);
        // echo $_FILES['hinhanh'];
    }
    echo 'Ọk';
?>