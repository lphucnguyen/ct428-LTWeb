<?php
    include("../../../core/init.php");
    if(isset($_POST['themhang'])){
        $mshh=$_POST['MSHH'];
	    $tensach=$_POST['TenHH'];
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
            $sql = "INSERT INTO hanghoa VALUE('".$mshh."','".$tensach."','" .$quycach. "','".$gia."','".$soluong."','" .$maloai. "')";
            $sql1 = "INSERT INTO hinhhanghoa(MSHH,tenhinh,mahinh) VALUE('".$mshh."','".$file."','".$file."')";
            mysqli_query($db, $sql);
            mysqli_query($db, $sql1);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
     if(isset($_GET['action'])){
         $sql2 = "SELECT * FROM hinhhanghoa WHERE MSHH = '".$_GET['id']."'";
        // $sql = "DELETE FROM hanghoa WHERE (MSHH='".$_GET['id']."')";
        // mysqli_query($db, $sql);
        // $sql1 = "DELETE FROM hinhhanghoa WHERE (MSHH='".$_GET['id']."')";
        // mysqli_query($db, $sql1);
     }
?>