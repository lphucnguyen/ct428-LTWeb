<div class="breadcum">
    <div class="breadcum-title">
        <h3>Check out</h3>
    </div>
    <div class="breadcum-content">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="?action=checkout">Checkout</a></li>
        </ul>
    </div>
</div>

<main>
    <?php
    session_start();
    if (!isset($_SESSION["account"]))
        header("location:login.php");

    $sql = "Select * from KHACHHANG where MSKH='" . $_SESSION["account"] . "';";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    ?>
    <div class="container">
        <form action="includes/process.php?" class="check-out-form" method="GET">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <h3>BILLING DETAIL</h3>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-form-label">Họ tên khách hàng:</label>
                        <div class="col-lg-9">
                            <input type="text" name="name" class="form-control" value="<?= $row['HoTenKH'] ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-form-label">Tên công ty:</label>
                        <div class="col-lg-9">
                            <input type="text" name="company" class="form-control" value="<?= $row['TenCongTy'] ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-form-label">Phone:</label>
                        <div class="col-lg-9">
                            <input type="text" name="phone" class="form-control" value="<?= $row['SoDienThoai'] ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-form-label">Số Fax:</label>
                        <div class="col-lg-9">
                            <input type="text" name="Fax" class="form-control" value="<?= $row['SoFax'] ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-lg-3 col-form-label">Address:</label>
                        <div class="col-lg-9">
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
                <div class="col-lg-4 col-12">
                    <div class="order-detail">
                        <div class="order-detail__title">
                            <h3>Your Order</h3>
                        </div>
                        <div class="order-detail__product">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Products</th>
                                        <th>Total</th>
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
                                                <td>$' . $row["Gia"] * (int)$quantity . '</td>
                                            </tr>';
                                            $total += $row["Gia"] * (int)$quantity;
                                        }
                                    }
                                    ?>

                                    <tr class="order-detail__product__total">
                                        <td>Total</td>
                                        <td>$<?= $total ?></td>
                                        <input type="hidden" name="total" value="<?= $total ?>">
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-detail__submit">
                            <input type="hidden" value="placeorder" name="action">
                            <button type="submit" class="btn-order">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</main>