<?php
    if(!defined("ADMIN")){
        exit();
    }
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Don Hang</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <?php
            $sql = "SELECT * FROM dathang WHERE SoDonDH ='" .$_GET["id"]. "'";
            $result = mysqli_query($db, $sql);
            $result = mysqli_fetch_assoc($result);
        ?>
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Don Hang</h6>
                </div>
                <div class="card-body">
                    <form action="./modules/transaction/process.php" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">So Don Dat Hang:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?=$result["SoDonDH"]?>" name="SoDonDH">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ma So Khach Hang:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?=$result["MSKH"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ma So Nhan Vien:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?=$_SESSION["nhanvien"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ngay Dat Hang:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?=$result["NgayDH"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ngay Giao Hang:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?=$result["NgayGH"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dia Chi:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?=$result["DiaChi"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Trang Thai Don Hang:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="TrangThaiDH">
                                    <option value="Chua Xac Nhan" <?=($result["TrangThaiDH"] == 0) ? "selected" : ""?>>Chua Xac Nhan</option>
                                    <option value="Da Xac Nhan" <?=($result["TrangThaiDH"] == 1) ? "selected" : ""?>>Da Xac Nhan</option>
                                </select>
                            </div>
                        </div>
                        <button type="" class="btn btn-success float-right">Cập nhật</button>               
                    </form>
                </div>
            </div>        
        </div>
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-data" data-get="orders">
                        <thead>
                        <tr>
                            <th>Ten Hang Hoa</th>
                            <th>Gia</th>
                            <th>So Luong</th>
                            <th>Gia Dat Hang</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * FROM CHITIETDATHANG,HANGHOA WHERE SoDonDH='" . $_GET["id"] . "' and CHITIETDATHANG.MSHH=HANGHOA.MSHH;";
                            $result1 = mysqli_query($db, $sql1);
                            $total = 0;

                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $sql_image = "SELECT * FROM HINHHANGHOA WHERE MSHH='" . $row1["MSHH"] . "'";
                                $result_image = mysqli_query($db, $sql_image);
                                $row_image = mysqli_fetch_assoc($result_image);

                                echo '       
                                    <tr>
                                    <td class="cart-body__name">
                                        <a href="index.php?action=product&id='.$row1['MSHH'].'">
                                            <img src="image/' . $row_image["tenhinh"] . '" alt="">
                                            <h6>' . $row1["TenHH"] . '</h6>
                                        </a>
                                    </td>
                                    <td>$' . $row1["Gia"] . '</td>
                                    <td>2' . $row1["SoLuong"] . '</td>
                                    <td>$' . $row1["GiaDatHang"] . '</td>
                                </tr>';
                                $total += $row1["GiaDatHang"];
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <h3 class="float-right">Total: <?=$total?></h3>
            </div>        
        </div>
    </div>
</div>

