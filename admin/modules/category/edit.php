<?php
if(!defined("ADMIN")){
    exit();
}
?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Loại Hàng</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Loại Hàng</h6>
            </div>
            <div class="card-body">
                <?php 
                    $sql = "SELECT * FROM loaihanghoa WHERE MaLoaiHang = '".$_GET['id']."'";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_assoc($result)
                ?>
                <form action="./modules/category/process.php" method="POST">
                    <div class="form-group">
                        <label>Mã Loại hàng</label>
                        <input type="text" readonly name="MaLoaiHang" class="form-control" value="<?=$row["MaLoaiHang"]?>" />
                    </div>
                    <div class="form-group">
                        <label>Tên Loại Hàng</label>
                        <input type="text" name="TenLoaiHang" class="form-control" value="<?=$row["TenLoaiHang"]?>" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="sualoaihang">Sua Loai Hang</button>
                </form>
            </div>
            </div>
        </div>        
    </div>
</div>