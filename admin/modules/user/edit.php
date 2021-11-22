<?php
    if(!defined("ADMIN")){
        exit();
    }
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Khách hàng</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <?php
            $sql = "SELECT * FROM KHACHHANG WHERE MSKH ='" .$_GET["id"]. "'";
            $result = mysqli_query($db, $sql);
            $result = mysqli_fetch_assoc($result);
        ?>
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Khách hàng</h6>
                </div>
                <div class="card-body">
                    <form action="./modules/user/process.php" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mã số khách hàng:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" name="MSKH" value="<?=$result["MSKH"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Họ tên khách hàng:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?=$result["HoTenKH"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tên công ty:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?=$result["TenCongTy"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Số điện thoại:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?=$result["SoDienThoai"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Số Fax:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" value="<?=$result["SoFax"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" name="pass" class="form-control">
                            </div>
                        </div>
                        <button name="suauser" type="submit" class="btn btn-success float-right">Cập nhật</button>               
                    </form>
                </div>
            </div>        
        </div>
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Đơn hàng</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-data" data-get="orders">
                        <thead>
                        <tr>
                            <th>Đơn hàng</th>
                            <th>Giá trị đơn hàng</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql1 = "SELECT * FROM DATHANG JOIN KHACHHANG ON khachhang.MSKH = dathang.MSKH WHERE KHACHHANG.MSKH='" . $_GET["id"] . "'";
                            $result1 = mysqli_query($db, $sql1);
                            $i = 0;

                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $sql_total = "SELECT SUM(GiaDatHang) AS Total FROM Chitietdathang WHERE SoDonDH='" . $row1["SoDonDH"] . "'";
                                $result_total = mysqli_query($db, $sql_total);
                                $row_total = mysqli_fetch_assoc($result_total);
                                $i++;

                                echo '       
                                    <tr>
                                    <td class="cart-body__name">
                                        <a href="index.php?module=transaction&action=edit&id='.$row1['SoDonDH'].'">
                                            <h6>Đơn hàng ' . $i . '</h6>
                                        </a>
                                    </td>
                                    <td>' . number_format($row_total["Total"], 0, ',', ',') . ' VND</td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
    </div>
</div>

