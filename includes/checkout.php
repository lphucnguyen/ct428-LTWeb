<div class="breadcum">
    <div class="breadcum-title">
        <h3>Thanh toán</h3>
    </div>
    <div class="breadcum-content">
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="?action=checkout">Thanh toán</a></li>
        </ul>
    </div>
</div>

<main>
    <?php
    if (!isset($_SESSION["account"]))
        header("location:login.php");

    $sql = "Select * from KHACHHANG where MSKH='" . $_SESSION["account"] . "';";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    ?>
    <div class="container">
        <form action="includes/process.php?" class="check-out-form" method="GET">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <h3>Chi tiết hóa đơn</h3>
                    <div class="form-group row">
                        <label for="" class="col-lg-4 col-form-label">Họ tên khách hàng:</label>
                        <div class="col-lg-8">
                            <input type="text" name="name" class="form-control" value="<?= $row['HoTenKH'] ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-4 col-form-label">Tên công ty:</label>
                        <div class="col-lg-8">
                            <input type="text" name="company" class="form-control" value="<?= $row['TenCongTy'] ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-4 col-form-label">Số điện thoại:</label>
                        <div class="col-lg-8">
                            <input type="text" name="phone" class="form-control" value="<?= $row['SoDienThoai'] ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-4 col-form-label">Số Fax:</label>
                        <div class="col-lg-8">
                            <input type="text" name="Fax" class="form-control" value="<?= $row['SoFax'] ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-lg-4 col-form-label">Địa chỉ:</label>
                        <div class="col-lg-8">
                            <select type="select" name="dc" class="form-control">
                       
                                <?php

                                $sql = "SELECT * FROM DIACHIKH WHERE MSKH='" . $_SESSION["account"] . "';";
                                $result = mysqli_query($db, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value ="'.$row["DiaChi"].'">' . $row["DiaChi"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 col-12">
                    <div class="order-detail">
                        <div class="order-detail__title">
                            <h3>Đơn hàng của bạn</h3>
                        </div>
                        <div class="order-detail__product">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Tổng cộng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION["cartList"])) {
                                        $total = 0;
                                        foreach ($_SESSION["cartList"] as $mshh => $quantity) {
                                            $sql = "Select * from HANGHOA where MSHH='" . $mshh . "';";
                                            $result = mysqli_query($db, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                            echo ' <tr>
                                                <td>' . $row["TenHH"] . ' x' . $quantity . '</td>
                                                <td>' . number_format($row["Gia"] * (int)$quantity , 0, '', '.') . ' VND</td>
                                            </tr>';
                                            $total += $row["Gia"] * (int)$quantity;
                                        }
                                    }
                                    ?>

                                    <tr class="order-detail__product__total">
                                        <td>Tổng cộng</td>
                                        <td><?= number_format($total , 0, '', '.') ?> VND</td>
                                        <input type="hidden" name="total" value="<?= $total ?>">
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-detail__submit">
                            <input type="hidden" value="placeorder" name="action">
                            <button type="submit" class="btn-order">Mua hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</main>