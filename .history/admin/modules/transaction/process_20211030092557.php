<?php
    session_start();
    include("../../../core/init.php");
    $TrangThai = 1;
    if($_POST['TrangThaiDH'] == "Chua Xac Nhan")
        $TrangThai = 0;
    $sql = "UPDATE dathang SET TrangThaiDH = '".$_POST['TrangThaiDH']."', MSNV ='".$_SESSION["nhanvien"]."'  WHERE SoDonDH='".$_POST["SoDonDH"]."'";
    mysqli_query($db,$sql);
    header('Location:../../index.php?module=transaction');
?>