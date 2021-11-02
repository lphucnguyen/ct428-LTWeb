<?php
    // header("Content-type: text/html; charset=utf-8");
    $servername = "localhost";
    $username = "gianghoa";
    $password = "gianghoa123";
    $dbname = "quanlydathang";
    // define('DB_SERVER', '127.0.0.1');
	// define('DB_USERNAME', 'gianghoa');
	// define('DB_PASSWORD', 'gianghoa123');
	// define('DB_DATABASE', 'quanlydathang');

    $db = mysqli_connect($servername, $username, $password, $dbname);

    if(mysqli_connect_errno()){
        exit("Loi khi ket khoi Database");
    }

    mysqli_set_charset($db, "UTF8");
?>