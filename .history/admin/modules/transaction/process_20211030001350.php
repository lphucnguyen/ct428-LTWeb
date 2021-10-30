<?php
    include("../../../core/init.php");
    $TrangThai = 1;
    if($_POST['TrangThaiDH'] == "Chua Xac Nhan")
        $TrangThai = 0;
    // mysqli_query("UPDATE dathang SET TrangThai= 'Đang xử lý', MSNV ='".$_SESSION['msnv']."'  WHERE SoDonDH='".$_GET['sohd']."'");
    echo $TrangThai;
?>