<?php
session_start();
$code = "";
if (isset($_GET["code"]) && $_GET["code"] != "") {
    $code = mysqli_real_escape_string($db, $_GET["code"]);
}
if (isset($code) && $code != "") {
    $sql = "SELECT *, payment.name AS payment_name, transaction.id AS transaction_id FROM transaction
                INNER JOIN payment
                ON transaction.payment_id = payment.id
                WHERE code = '" . $code . "'
        ";
    $result = mysqli_query($db, $sql);
    $errors = array();
    if (mysqli_num_rows($result) == 0) {
        $errors[] = "Code is not exist.";
    }
}
?>

<div class="breadcum">
    <div class="breadcum-title">
        <h3>Check bill</h3>
    </div>
    <div class="breadcum-content">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="?action=checkbill">Checkbill</a></li>
        </ul>
    </div>
</div>

<main>
    <div class="container">
        <div class="col-12">
            <form action="includes/process.php" method="GET" class="ord-code-form">
                <input type="hidden" name="action" value="getCode" />
                <h5>Mã số đơn hàng: </h5>
                <div class="form-group row">
                    <div class="col-lg-11">
                        <input type="text" name="ord-code" class="form-control" value="<?=$_SESSION["code"]?>">
                    </div>
                    <div class="col-lg-1">
                        <button type="submit" class="btn ord-code-btn text-uppercase">Check</button>
                    </div>

                </div>
            </form>
            <form action="">
                <h5>Thông tin: </h5>
                <div class="information-customer">
                    <?php
                    if (!isset($_SESSION["account"]))
                        header("location:index.php");
                    if (isset($_SESSION["code"])) {
                        if ($_SESSION["code"] == "None")
                            echo 'Vui lòng nhập mã đơn hàng';
                        else if($_SESSION["code"]=="Unknown")
                            echo 'Không có mã đơn hàng này';
                        else {
                            $sql = "SELECT * FROM DATHANG,KHACHHANG where DATHANG.MSKH=KHACHHANG.MSKH and SoDonDH='" . $_SESSION["code"] . "';";
                            $result = mysqli_query($db, $sql);

                            $row = mysqli_fetch_assoc($result);
                            echo '
                    <p class="SoDonDH"><span class="information-customer__title">Mã đơn: </span> ' . $_SESSION["code"] . '</p>
                    <p class="MSNV"><span class="information-customer__title">Mã số nhân viên xác nhận: </span>' . $row["MSNV"] . '</p>
                    <p class="NgayDH"><span class="information-customer__title">Ngày đặt hàng: </span>' . $row["NgayDH"] . '</p>
                    <p class="NgayGH"><span class="information-customer__title">Ngày giao hàng: </span>' . $row["NgayGH"] . '</p>
                    <p class="TrangThaiDH"><span class="information-customer__title">Trạng thái đặt hàng: </span>' . $row["TrangThaiDH"] . '</p>
                    <p class="HoTenKH"><span class="information-customer__title">Họ tên khách hàng: </span>' . $row["HoTenKH"] . '</p>
                    <p class="phone"><span class="information-customer__title">Số điện thoại: </span>' . $row["SoDienThoai"] . '</p>
                    <p class="address"><span class="information-customer__title">Địa chỉ: </span>' . $row["DiaChi"] . '</p>';
                        }
                    }
                    ?>


                </div>
                <h5>Sản phẩm: </h5>
                <div class="cart-body check-bill-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tất cả sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION["code"]))
                                if ($_SESSION["code"] == "None")
                                    echo 'Vui lòng nhập mã đơn hàng';
                                else {
                                    $total = 0;
                                    $sql1 = "SELECT * FROM CHITIETDATHANG,HANGHOA WHERE SoDonDH='" . $_SESSION["code"] . "' and CHITIETDATHANG.MSHH=HANGHOA.MSHH;";
                                    $result1 = mysqli_query($db, $sql1);
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        $sql_image = "SELECT * FROM HINHHANGHOA WHERE MSHH='" . $row1["MSHH"] . "'";
                                        $result_image = mysqli_query($db, $sql_image);
                                        $row_image = mysqli_fetch_assoc($result_image);

                                        echo '       
                            <tr>
                            <td class="cart-body__name">
                                <a href="index.php?action=product&id='.$row1['MSHH'].'">
                                    <img src="uploads/' . $row_image["tenhinh"] . '" alt="">
                                    <h6>' . $row1["TenHH"] . '</h6>
                                </a>
                            </td>
                            <td>' . $row1["Gia"] . '</td>
                            <td>' . $row1["SoLuong"] . '</td>
                            <td>' . $row1["GiaDatHang"] . '</td>
                        </tr>';
                                        $total += $row1["GiaDatHang"];
                                    }
                                    $_SESSION["Total"] = $total;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="total-price">
                <h5 class="total-price__title">Tổng giá: </h5>
                <h5 class="total-price__value">$
                    <?php if (!isset($_SESSION["Total"]))
                        echo "0";
                    else
                        echo $_SESSION["Total"]; ?></h5>
            </div>
        </div>
    </div>
</main>