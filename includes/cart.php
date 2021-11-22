<div class="breadcum">
    <div class="breadcum-title">
        <h3>Giỏ hàng</h3>
    </div>
    <div class="breadcum-content">
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="?action=cart">Giỏ hàng</a></li>
        </ul>
    </div>
</div>
<?php
if (session_id() === "")
    session_start();
if (!isset($_SESSION["cartList"]))
    $_SESSION["cartList"] = [];
if (isset($_GET["id"]))
    if (!array_key_exists($_GET['id'], $_SESSION["cartList"]))
        $_SESSION["cartList"][$_GET['id']] = 1;
?>
<main>
    <div class="container">
        <div class="col-12">
            <form action="includes/process.php?action=update" method="GET">
                <input type="hidden" name="action" value="update">
                <div class="cart-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng cộng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION["cartList"]))
                                foreach ($_SESSION["cartList"] as $mshh => $quan) {
                                    $sql = "SELECT * FROM HANGHOA,HINHHANGHOA WHERE HANGHOA.MSHH=HINHHANGHOA.MSHH AND HANGHOA.MSHH='" . $mshh . "';";
                                    $result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row) {
                                        echo ' <tr>
                                    <td class="cart-body__name">
                                        <a href="product.html">
                                            <img src="uploads/' . $row["mahinh"] . '" alt="">
                                            <h6>' . $row["TenHH"] . '</h6>
                                        </a>
                                    </td>
                                    <td>' . number_format($row["Gia"], 0, '', '.') . ' VND</td>
                                    <td>
                                        <div class="quantity">
                                            <div class="decs-quantity qtybutton"><i class="fa fa-minus"></i></div>                            
                                            <input type="number" name="qty[]" min="1" value="' . $quan . '">
                                            <input type="hidden" name="id[]" value="' . $mshh . '">
                                            <div class="inc-quantity qtybutton"><i class="fa fa-plus"></i></div>
                                        </div>
                                    </td>
                                    <td>' . number_format($quan * $row["Gia"], 0, '', '.') . ' VND</td>
                                    <td><a href="includes/process.php/?action=del&id=' . $mshh . '"><span class="fa fa-times del-product"></span></a></td>
                                </tr>';
                                    }
                                }

                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="total-price">
                    <?php
                    $total = 0;
                    foreach ($_SESSION["cartList"] as $mshh => $quan) {
                        $sql = "SELECT * FROM HANGHOA WHERE MSHH='" . $mshh . "';";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_assoc($result);
                        if (!$row) {
                            $total = 0;
                        } else
                            $total += $row["Gia"] * $quan;
                    }

                    ?>
                    <h5 class="total-price__title">Tổng cộng: </h5>
                    <h5 class="total-price__value"><?= number_format($total, 0, '', '.') ?> VND</h5>
                </div>
                <a href="index.php" type="button" class="btn-cart btn-shopping">Tiếp tục mua hàng</a>
                <div class="cart-upate">
                    <button type="submit" class="btn-cart btn-upate">Cập nhật</button>
                    <a href="?action=checkout" type="button" class="btn-cart btn-checkout">Thanh toán</a>
                </div>
            </form>
        </div>
    </div>
</main>