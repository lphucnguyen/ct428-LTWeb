<?php
if(!defined("ADMIN")){
    exit();
}
?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Loai Hang</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Loai Hang</h6>
            </div>
            <div class="card-body">
                <form action="./process.php" method="POST">
                    <div class="form-group">
                        <label>Ma Loai Hang</label>
                        <input type="text" name="MaLoaiHang" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Ten Loai Hang</label>
                        <input type="text" name="TenLoaiHang" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="themloaihang">Them Loai Hang</button>
                </form>
                <div class="table-responsive">
                <table class="table mt-4 table-bordered table-data" data-get="orders">
                    <thead>
                    <tr>
                        <th>Ma Loai Hang</th>
                        <th>Ten Loai Hang</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM LOAIHANGHOA;";
                            $result = mysqli_query($db, $sql);

                            while($row = mysqli_fetch_assoc($result)):
                        ?>
                            <tr>
                                <td><?=$row["MaLoaiHang"]?></td>
                                <td><?=$row["TenLoaiHang"]?></td>
                                <td>
                                    <a href="index.php?module=category&action=edit&id=<?=$row["MaLoaiHang"]?>" class="btn btn-primary">
                                        Chinh Sua
                                    </a>
                                    <a href="process.php" class="btn btn-danger">
                                        Xoa
                                    </a>
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