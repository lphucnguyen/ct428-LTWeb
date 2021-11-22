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
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Khách hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-data" data-get="orders">
                    <thead>
                    <tr>
                        <th>Mã số khách hàng</th>
                        <th>Họ tên khách hàng</th>
                        <th>Tên công ty</th>
                        <th>Số điện thoại</th>
                        <th>Số Fax</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM KHACHHANG;";
                            $result = mysqli_query($db, $sql);

                            while($row = mysqli_fetch_assoc($result)):
                        ?>
                            <tr>
                                <td><?=$row["MSKH"]?></td>
                                <td><?=$row["HoTenKH"]?></td>
                                <td><?=$row["TenCongTy"]?></td>
                                <td><?=$row["SoDienThoai"]?></td>
                                <td><?=$row["SoFax"]?></td>
                                <td style="width: 200px;">
                                    <a class="btn btn-primary" href="?module=user&action=edit&id=<?=$row["MSKH"]?>">Xem thông tin</a>
                                </td>
                            </tr>
                        <?php
                            endwhile;
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>        
    </div>

</div>

