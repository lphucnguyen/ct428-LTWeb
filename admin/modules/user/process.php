<?php
    session_start();
    include("../../../core/init.php");
    if(isset($_POST['suauser'])){
        $sql = "UPDATE khachhang SET Pass = '". md5($_POST['pass']) ."' WHERE MSKH='". $_POST['MSKH'] ."'";
        mysqli_query($db,$sql);
        echo $sql;
    }
    header('Location:../../index.php?module=user');
?>