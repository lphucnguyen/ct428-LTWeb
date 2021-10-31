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

        $name = array();
        foreach ($_FILES['hinhanh']['name'] as $file) {
            $name[] = $file;
        }
        $tmp_name = array();
        foreach ($_FILES['hinhanh']['tmp_name'] as $file) {
            $tmp_name[] = $file;
        }
        var_dump($tmp_name[0]);
        echo $name[0];
    }
    echo 'Ọk';
?>