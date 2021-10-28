<?php
    // session_destroy();
    session_start();
    unset($_SESSION["nhanvien"]);

    header("location: login.php")
?>