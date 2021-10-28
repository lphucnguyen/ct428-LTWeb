<?php
    include("core/init.php");

    $file = "main";

    if(isset($_GET["action"])){
        if( !file_exists("includes/" . $_GET["action"] . ".php")){
            header("Location: 404.php");
            exit();
        }
        $file = $_GET["action"];
    }
    
    include("includes/header.php");

    include(dirname(__FILE__) . "/includes/" . $file . ".php");

    include("includes/footer.php");
?>