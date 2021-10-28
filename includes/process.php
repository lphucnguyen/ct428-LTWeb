<?php
include "../core/init.php";
session_start();

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "update":
            $index = 0;
            foreach ($_SESSION["cartList"] as $key => $value) {
                $sql = "SELECT * FROM HANGHOA WHERE MSHH='" . $key . "'; ";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_assoc($result);
                if ($row["SoLuongHang"] < (int)$_GET["qty"][$index])
                    $_SESSION["cartList"][$key] = $row["SoLuongHang"];
                else
                    $_SESSION["cartList"][$key] = (int)$_GET["qty"][$index];
                $index += 1;
            }
            header("location:../index.php?action=cart");
            break;

        case "addCart":
            header("location:../index.php?action=cart&id=" . $_GET["id"] . "");
            break;

        case "del":
            unset($_SESSION["cartList"][$_GET["id"]]);
            header("location:../../index.php?action=cart");
            break;

        case "placeorder":
            if ($_GET["total"] == 0)
                header("location:../index.php?action=checkout");
            else {
                $sql = "SELECT * FROM DATHANG Where MSKH='" . $_SESSION["account"] . "'; ";
                $count = 1;
                $result = mysqli_query($db, $sql);
                if (mysqli_num_rows($result) > 0)
                    while ($row = mysqli_fetch_assoc($result)) {
                        $count += 1;
                    }
                else $count = 1;

                $MSDH = "DH" . $count . $_SESSION["account"];
                $sentDate = date("Y-m-d");
                $dc = $_GET["dc"];
                $takeDate = date('Y-m-d', strtotime($sentDate . ' + 3 days'));
                $sql1 = "INSERT INTO DATHANG VALUES('" . $MSDH . "','" . $_SESSION["account"] . "',NULL,'" . $sentDate . "','" . $takeDate . "','Chưa xác nhận','" . $dc . "');";
                $_SESSION["code"] = $MSDH;

                if (mysqli_query($db, $sql1)) {
                    foreach ($_SESSION["cartList"] as $mshh => $quantity) {
                        $sql1 = "SELECT Gia FROM HANGHOA WHERE MSHH='" . $mshh . "';";
                        $result = mysqli_query($db, $sql1);
                        $row = mysqli_fetch_assoc($result);
                        $Gia = $row["Gia"] * $quantity;

                        $sql = "INSERT INTO CHITIETDATHANG VALUES('" . $MSDH . "','" . $mshh . "','" . $quantity . "','" . $Gia . "',0);";
                        mysqli_query($db, $sql);;
                    }
                    unset($_SESSION["cartList"]);
                }
                header("location:../index.php?action=checkbill");
            }
            break;

        case "getCode":
            $order = $_GET["ord-code"];
            $sql = 'SELECT * FROM DATHANG WHERE SoDonDH="' . $order . '";';
            $result = mysqli_query($db, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                unset($_SESSION["order-detail"]);
                $_SESSION["code"] = $order;
                header("location:../index.php?action=checkbill");
            } else
                $_SESSION["code"] = "Unknown";
            header("location:../index.php?action=checkbill");

            break;
    }
}
    
    // else
    // header("location:cart.php");
