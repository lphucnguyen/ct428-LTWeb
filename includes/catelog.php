<div class="breadcum">
    <div class="breadcum-title">
        <h3>Category</h3>
    </div>
    <div class="breadcum-content">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="?action=catelog">Category</a></li>
        </ul>
    </div>
</div>

<main>

    <?php
    session_start();
    if (!isset($_GET["id"]))
        $_GET["id"] = "all";
    ?>
    <!-- Products -->
    <section id="products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="products">
                        <div class="products-left">
                            <div class="category">
                                <div class="grid-menu d-flex">
                                    <div class="grid-menu_grid">
                                        <i class="fa fa-th"></i>
                                    </div>
                                    <div class="grid-menu_list">
                                        <i class="fa fa-th-list"></i>
                                    </div>
                                </div>
                                <div class="category_title tab-toggle">
                                    <div class="toggle-icon"><i class="fa fa-chevron-down"></i></div>
                                    <h6>Categories</h6>
                                </div>
                                <div class="category_list">
                                    <ul class="list-unstyled">
                                    <li><a <?=(!isset($_GET["id"]) || $_GET["id"]=="all" ? 'class="active" ' : '')?> href="index.php?action=catelog">Tất cả</a></li>
                                        <?php
                                        
                                        $sql = "SELECT * FROM LOAIHANGHOA";
                                        $result = mysqli_query($db, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<li><a '.($row["MaLoaiHang"]==$_GET["id"] ? 'class="active" ' : '').' href="index.php?action=catelog&id=' . $row["MaLoaiHang"] . '">' . $row["TenLoaiHang"] . '</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="products-right">
                            <div class="product-items d-flex">

                                <?php
                                if($_GET["id"]=="all"){
                                    $sql = "SELECT * FROM HANGHOA,HINHHANGHOA WHERE HANGHOA.MSHH=HINHHANGHOA.MSHH; ";
                                    $result = mysqli_query($db, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo ' <div class="product-item product-item-catelog grid">
                                            <div class="product-item_img">
                                                <a href="index.php?action=product&id=' . $row["MSHH"] . '"><img src="image/' . $row["mahinh"] . '" alt=""></a>
                                            </div>
                                            <form action="includes/process.php" method="GET" class="product-item_desc-form">
                                                <div class="product-item_desc">
                                                    <div class="product-item_desc-title"><a href="index.php?action=product&id=' . $row["MSHH"] . '">' . $row["TenHH"] . '</a></div>
                                                    <span class="product-item_desc-price_new">$' . $row["Gia"] . ' USD</span>
                                                    <input type="hidden" value="addCart" name="action">
                                                    <input type="hidden" value="' . $row["MSHH"] . '" name="id">
                                                    <div class="product-item_desc-descreption">
        
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                            </form>
                                        </div>';
                                    }
                                }else{

                             
                                $sql = "SELECT * FROM HANGHOA,HINHHANGHOA WHERE MaLoaiHang='" . $_GET["id"] . "' and HANGHOA.MSHH=HINHHANGHOA.MSHH; ";
                                $result = mysqli_query($db, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo ' <div class="product-item product-item-catelog grid">
                                        <div class="product-item_img">
                                            <a href="index.php?action=product&id=' . $row["MSHH"] . '"><img src="image/' . $row["mahinh"] . '" alt=""></a>
                                        </div>
                                        <form action="includes/process.php" method="GET" class="product-item_desc-form">
                                            <div class="product-item_desc">
                                                <div class="product-item_desc-title"><a href="index.php?action=product&id=' . $row["MSHH"] . '">' . $row["TenHH"] . '</a></div>
                                                <span class="product-item_desc-price_new">$' . $row["Gia"] . ' USD</span>
                                                <input type="hidden" value="addCart" name="action">
                                                <input type="hidden" value="' . $row["MSHH"] . '" name="id">
                                                <div class="product-item_desc-descreption">
    
                                                </div>
                                            </div>
                                            <button type="submit" class="btn-add-to-cart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                        </form>
                                    </div>';
                                }
                            }
                                ?>

                            </div>
                        </div>
                    </div>
                    <!-- <div class="pagination">
                        <div class="prev-pagination"><a href=""><i class="fa fa-chevron-left"></i></a></div>
                        <div class="list-pagination">
                            <ul class="list-unstyled">
                                <li class="active"><a href="">01</a></li>
                                <li><a href="">02</a></li>
                                <li><a href="">03</a></li>
                                <li><a href="">04</a></li>
                                <li><a href="">05</a></li>
                            </ul>
                        </div>
                        <div class="next-pagination"><a href=""><i class="fa fa-chevron-right"></i></a></div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</main>