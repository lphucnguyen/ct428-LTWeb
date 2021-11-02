<?php
include "../core/init.php";
session_start();

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "register":
            $mskh=$_GET["MSKH"];
            $hoten=$_GET["HoTenKH"];
            $congty=$_GET["TenCongTy"];
            $fax=$_GET["FAX"];
            $pass=$_GET["Pass"];
            $sdt=$_GET["SoDienThoai"];
            $sql="INSERT INTO KHACHHANG VALUES('".$mskh."','".$hoten."','".$congty."','".$sdt."','".$fax."','".$pass."');";
            if(mysqli_query($db,$sql)){
                $_SESSION["account"]=$mskh;
                header("location:../index.php?action=myaccount");
            }
            else {
                $_SESSION["error"] = "Mã số khách hàng đã tồn tại";
                header("location:../register.php");
            };
            break;

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

        case "updateAccount":
            $hoten = $_GET["hoten"];
            $congty = $_GET["TenCongTy"];
            $sdt = $_GET["SoDienThoai"];
            $fax = $_GET["SoFax"];
            $pass = $_GET["password"];
            $strPass = ($pass != '' ? ",Pass='".$pass."'" : "");

            $sql = "UPDATE KHACHHANG SET HoTenKH='".$hoten."',TenCongTy='".$congty."',SoDienThoai='".$sdt."',SoFax='".$fax."'". $strPass ." WHERE MSKH='".$_SESSION["account"]."';";
            if(mysqli_query($db,$sql))
                header("location:../index.php?action=myaccount");
            else{
                $_SESSION["error"] = "Lỗi";
                header("location:../index.php?action=myaccount");
            }

        case "updateAddresses":
            $dc1=$_GET["diachi1"];
            $dc2=$_GET["diachi2"];
            $sql = "SELECT * FROM DIACHIKH WHERE MSKH='".$_SESSION["account"]."';";
            $result = mysqli_query($db,$sql);
            if(mysqli_num_rows($result)<=0){
                $sql = "INSERT INTO DIACHIKH VALUES('".$_SESSION["account"]."dc1"."','".$dc1."','".$_SESSION["account"]."')";
                $sql1 = "INSERT INTO DIACHIKH VALUES('".$_SESSION["account"]."dc2"."','".$dc2."','".$_SESSION["account"]."')";
                if(mysqli_query($db,$sql) && mysqli_query($db,$sql1))
                    header("location:../index.php?action=myaccount");
                else {
                    $_SESSION["error"] = "Lỗi thêm địa chỉ mặc định";
                    header("location:../index.php?action=myaccount");
                }
            }
            else{
                $sql = "UPDATE DIACHIKH SET MSKH='".$_SESSION["account"]."',DiaChi='".$dc1."' WHERE  MaDC='".$_SESSION["account"]."dc1"."';";
                $sql1 = "UPDATE DIACHIKH SET MSKH='".$_SESSION["account"]."',DiaChi='".$dc2."' WHERE  MaDC='".$_SESSION["account"]."dc2"."';";
                if(mysqli_query($db,$sql) && mysqli_query($db,$sql1))
                header("location:../index.php?action=myaccount");
                else{
                        $_SESSION["error"] = "Lỗi thêm địa chỉ";  
                        header("location:../index.php?action=myaccount");
                }   
            }
    }
}
    
    // else
    // header("location:cart.php");
