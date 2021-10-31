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

        $path = '../../../image/';
        $i = 0;
        $name = array();
        
        foreach ($_FILES['hinhanh']['name'] as $file) {
            $tenhinhanh_tmp=$_FILES['hinhanh']['tmp_name'][$i];
            $name[] = $file;
            $path_file = $path . $file;
            move_uploaded_file($tenhinhanh_tmp,$path_file);
            $i++;
            $sql = "INSERT INTO hanghoa VALUE('".$mshh."','".$tensach."','" .$quycach. "','".$gia."','".$soluong."','" .$maloai. "')"
            $sql1 = "INSERT INTO hinhhanghoa(MSHH,TenHinh) VALUE('".$mshh."','" .$mshh.'.'.$path_file. "')"
        }
    }
    echo 'Ọk';
?>