<?php
if(!defined("ADMIN")){
    exit();
}
?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Hang Hoa</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hang Hoa</h6>
            </div>
            <div class="card-body">
                <form action="./modules/product/process.php" method="POST">
                    <div class="form-group">
                        <label>MSHH</label>
                        <input type="text" name="MSHH" class="form-control" value="" />
                    </div>
                    <div class="form-group">
                        <label>Ten Hang Hoa</label>
                        <input type="text" name="TenHH" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Quy Cach</label>
                        <input type="text" name="QuyCach" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Gia</label>
                        <input type="text" name="Gia" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>So Luong Hang</label>
                        <input type="text" name="SoLuongHang" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Loai Hang Hoa</label>
                        <select class="form-control" name="maloai">
                            <?php
                                $sql = "SELECT * FROM LOAIHANGHOA";
                                $result = mysqli_query($db, $sql);

                                while($row = mysqli_fetch_assoc($result)):
                            ?>  
                                <option value="<?=$row["MaLoaiHang"]?>"><?=$row["TenLoaiHang"]?></option>
                            <?php
                                endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File Hinh</label>
                        <input type="file" name="filehinh" name="filehinh" class="form-control" multiple />
                    </div>
                    <button type="submit" class="btn btn-primary" nam="themhang">Them Hang</button>
                </form>
                <div class="table-responsive">
                <table class="table mt-4 table-bordered table-data" data-get="orders">
                    <thead>
                    <tr>
                        <th>Ten Hang</th>
                        <th>Gia</th>
                        <th>So Luong Hang</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM HANGHOA;";
                            $result = mysqli_query($db, $sql);

                            while($row = mysqli_fetch_assoc($result)):
                        ?>
                            <tr>
                                <td><?=$row["TenHH"]?></td>
                                <td><?=$row["Gia"]?></td>
                                <td><?=$row["SoLuongHang"]?></td>
                                <td>
                                    <a href="index.php?module=product&action=edit&id=<?=$row["MSHH"]?>" class="btn btn-primary">
                                        Chinh Sua
                                    </a>
                                    <a href="" class="btn btn-danger">
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