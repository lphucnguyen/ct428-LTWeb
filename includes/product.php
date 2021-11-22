<div class="breadcum">
    <div class="breadcum-title">
        <h3>Sản phẩm</h3>
    </div>
</div>
<main>
    
    <?php
    if (!isset($_GET["id"]))
        header("location:index.php");
    $sql = "SELECT * FROM HANGHOA,HINHHANGHOA WHERE HANGHOA.MSHH=HINHHANGHOA.MSHH and HANGHOA.MSHH='" . $_GET["id"] . "' ;";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$row)
        header("location:index.php");
    $loaihang = $row["MaLoaiHang"];
    ?>

    <section id="wrapper-product">
        <section id="product">
            <div class="container">
                <div class="product-detail">
                    <div class="row">
                        <div class="col-lg-6 ord-2">
                            <div class="product__detail__content">
                                <h6>LifeStyle</h6>
                                <h4><?= $row["TenHH"] ?></h4>
                                <p><?= $row["QuyCach"] ?></p>
                                <form action="includes/process.php?" method="GET">

                                    <div class="price-button">
                                        <div class="price_content">
                                            <span class="new-price-product"><?= number_format($row["Gia"], 0, '', '.') ?> VND</span>

                                        </div>
                                    </div>
                                    <div class="button_content">
                                 
                                            <input type="hidden" value="addCart" name="action">
                                            <input type="hidden" value="<?=$row['MSHH']?>" name="id">
                                            <button name="add-to-cart" type="submit">+ Add to cart</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5 ord-1">
                            <div class="product__detail__img">
                                <div class="product__detail__img__main" data-slide="1">
                                    <img src="uploads/<?= $row["mahinh"] ?>" alt="main-clothes">
                                </div>
                                <div class="product__detail__img__option">
                                    <div class="product__detail__img__control prev"><i class="fa fa-chevron-up"></i></div>
                                    <div class="product__detail__img__option_selects">
                                        <?php
                                        $sql1 = "SELECT * FROM HINHHANGHOA WHERE MSHH='" . $_GET["id"] . "'";
                                        $result1 = mysqli_query($db, $sql1);
                                        $count = 1;
                                        if (mysqli_num_rows($result1) > 0)
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                echo '  <div class="product__detail__img__option_select" data-slide="' . $count . '">
                                                        <img src="uploads/' . $row1["mahinh"] . '" alt="img-select">
                                                    </div>';
                                                $count += 1;
                                            }
                                        ?>
                                    </div>
                                    <div class="product__detail__img__control next"><i class="fa fa-chevron-down"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="related-product">
            <div class="container">
                <!-- <div class="prev-control-related"><i class="fa fa-angle-left"></i></div> -->
                <div class="related-title">
                    <h4>Sản phẩm liên quan</h4>
                    <!-- <div class="control-slick">
                        <button class="control-button prev"><i class="fa fa-angle-left"></i></button>
                        <button class="control-button next"><i class="fa fa-angle-right"></i></button>
                    </div> -->
                </div>
                <div class="product-items product-related d-flex">
                    <?php
                    $sql2 = "SELECT * FROM HANGHOA WHERE MaLoaiHang='" . $loaihang . "' LIMIT 4;";
                    $result2 = mysqli_query($db, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $sql1 = "SELECT * FROM HINHHANGHOA WHERE MSHH='" . $row2["MSHH"] . "';";
                        $result1 = mysqli_query($db, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);

                        echo '<div class="product-item product-item-catelog related">
                    <div class="product-item_img">
                        <a href="index.php?action=product&id=' . $row1["MSHH"] . '"><img src="uploads/' . $row1["mahinh"] . '" alt=""></a>
                    </div>                                                                  
                    <div class="product-item_desc">
                        <div class="product-item_desc-title"><a href="index.php?action=product&id=' . $row2["MSHH"] . '">' . $row2["TenHH"] . '</a></div>
                        <span class="product-item_desc-price_new">' . number_format($row2["Gia"], 0, '', '.') . ' VND</span>
                        <div class="product-item_desc-descreption">
                            
                        </div>
                    </div>
                    <a href="includes/process.php?action=addCart&id=' . $row2["MSHH"] . '"><button class="btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button></a>                                                                                                 
                </div>';
                    }

                    ?>
                </div>
                <!-- <div class="next-control-related"><i class="fa fa-angle-right"></i></div>                         -->
            </div>
        </section>
    </section>

</main>

<?php
ob_end_flush();
?>