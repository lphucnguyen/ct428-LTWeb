<div class="breadcum">
    <div class="breadcum-title">
        <h3>Trang Chủ</h3>
    </div>
    <div class="breadcum-content">
        <ul>
            <li><a href="">Trang Chủ</a></li>
        </ul>
    </div>
</div>

<main>
    <!-- Feature -->
    <section id="product" class="pt-5">
        <h2 class="text-center">Tất cả sản phẩm</h2>
        <div class="container mt-3">
            <div class="row">
                <?php
                include("core/init.php");
                $sql = 'SELECT * FROM HANGHOA';
                $result = mysqli_query($db, $sql);
                if (mysqli_affected_rows($db) > 0) {
                    while ($row = mysqli_fetch_assoc($result)){
                        $sql_image = "SELECT * FROM HINHHANGHOA WHERE MSHH='" . $row["MSHH"] . "'";
                        $result_image = mysqli_query($db, $sql_image);
                        $row_image = mysqli_fetch_assoc($result_image);

                        echo '<div class="col-6 col-lg-3">
                            <div class="product-item">
                                <div class="product-item_img">
                                    <a href="index.php?action=product&id=' . $row["MSHH"] . '"><img src="uploads/'.$row_image["tenhinh"].'" alt=""></a>
                                </div>                                                                  
                                <div class="product-item_desc">
                                    <div class="product-item_desc-title"><a href="index.php?action=product">' . $row["TenHH"] . '</a></div>
                                    <span class="product-item_desc-price_new">' . number_format($row["Gia"], 0, '', '.') . ' VND</span>
                                </div>
                                <a href="includes/process.php?action=addCart&id=' . $row["MSHH"] . '"><button class="btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button></a>
                            </div>
                        </div>';
                    }
                }
                ?>
                <!-- <div class="col-6 col-lg-3">
                        <div class="product-item">
                            <div class="product-item_img">
                                <a href=""><img src="image/product-2.png" alt=""></a>
                            </div>                                                                  
                            <div class="product-item_desc">
                                <div class="product-item_desc-title"><a href="">Essentia cotton-blend</a></div>
                                <span class="product-item_desc-price_new">$100.00 USD</span>
                            </div>
                            <a href=""><button class="btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button></a>                                                                                          
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="product-item">
                            <div class="product-item_img">
                                <a href=""><img src="image/product-3.png" alt=""></a>
                            </div>                                                                  
                            <div class="product-item_desc">
                                <div class="product-item_desc-title"><a href="">Essentia cotton-blend</a></div>
                                <span class="product-item_desc-price_new">$100.00 USD</span>
                            </div>
                            <a href=""><button class="btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button></a>                                                                                                 
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="product-item">
                            <div class="product-item_img">
                                <a href=""><img src="image/product-4.png" alt=""></a>
                            </div>                                                                  
                            <div class="product-item_desc">
                                <div class="product-item_desc-title"><a href="">Essentia cotton-blend</a></div>
                                <span class="product-item_desc-price_new">$100.00 USD</span>
                            </div>
                            <a href=""><button class="btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button></a>                                                                                                  
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="product-item">
                            <div class="product-item_img">
                                <a href=""><img src="image/product-5.png" alt=""></a>
                            </div>                                                                  
                            <div class="product-item_desc">
                                <div class="product-item_desc-title"><a href="">Essentia cotton-blend</a></div>
                                <span class="product-item_desc-price_new">$100.00 USD</span>
                            </div>
                            <a href=""><button class="btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button></a>                                                                                                   
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="product-item">
                            <div class="product-item_img">
                                <a href=""><img src="image/product-6.png" alt=""></a>
                            </div>                                                                  
                            <div class="product-item_desc">
                                <div class="product-item_desc-title"><a href="">Essentia cotton-blend</a></div>
                                <span class="product-item_desc-price_new">$100.00 USD</span>
                            </div>
                            <a href=""><button class="btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button></a>                                                                                                  
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="product-item">
                            <div class="product-item_img">
                                <a href=""><img src="image/product-7.png" alt=""></a>
                            </div>                                                                  
                            <div class="product-item_desc">
                                <div class="product-item_desc-title"><a href="">Essentia cotton-blend</a></div>
                                <span class="product-item_desc-price_new">$100.00 USD</span>
                            </div>
                            <a href=""><button class="btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button></a>                                                                                                  
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="product-item">
                            <div class="product-item_img">
                                <a href=""><img src="image/product-8.png" alt=""></a>
                            </div>                                                                  
                            <div class="product-item_desc">
                                <div class="product-item_desc-title"><a href="">Essentia cotton-blend</a></div>
                                <span class="product-item_desc-price_new">$100.00 USD</span>
                            </div>
                            <a href=""><button class="btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button></a>                                                                                                   
                        </div>
                    </div> -->

                <!-- <div class="col-md-12 load-more">
                    <div class="load-more_content">
                        <i class="fa fa-refresh"></i><span>LOAD MORE</span>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
</main>