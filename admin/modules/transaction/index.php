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
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Don Hang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-data" data-get="orders">
                    <thead>
                    <tr>
                        <th>So Don DH</th>
                        <th>Ma So Khach Hang</th>
                        <th>Ma So Nhan Vien</th>
                        <th>Ngay DH</th>
                        <th>Ngay GH</th>
                        <th>Trang Thai</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM DATHANG;";
                            $result = mysqli_query($db, $sql);

                            while($row = mysqli_fetch_assoc($result)):
                        ?>
                            <tr>
                                <td><?=$row["SoDonDH"]?></td>
                                <td><?=$row["MSKH"]?></td>
                                <td><?=$row["MSNV"]?></td>
                                <td><?=$row["NgayDH"]?></td>
                                <td><?=$row["NgayGH"]?></td>
                                <td><?=$row["TrangThaiDH"]?></td>
                                <td style="width: 200px;">
                                    <a class="btn btn-primary" href="?module=transaction&action=edit&id=<?=$row["SoDonDH"]?>">Xem Don Hang</a>
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

