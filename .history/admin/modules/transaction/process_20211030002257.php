<?php
    session_start();
    include("../../../core/init.php");
    $TrangThai = 1;
    if($_POST['TrangThaiDH'] == "Chua Xac Nhan")
        $TrangThai = 0;
    mysqli_query("UPDATE dathang SET TrangThaiHD= '".$TrangThai."', MSNV ='".$_SESSION["nhanvien"]."'  WHERE SoDonDH='".$_POST["SoDonDH"]."'");
    echo $TrangThai;
?>