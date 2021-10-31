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
                <form action="" method="POST">
                    <div class="form-group">
                        <label>MSHH</label>
                        <input type="text" name="MSHH" class="form-control" value="<?=$row["SoFax"]?>" />
                    </div>
                    <div class="form-group">
                        <label>Ten Hang Hoa</label>
                        <input type="text" name="TenHH" name="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Quy Cach</label>
                        <input type="text" name="QuyCach" name="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Gia</label>
                        <input type="text" name="Gia" name="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>So Luong Hang</label>
                        <input type="text" name="SoLuongHang" name="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Loai Hang Hoa</label>
                        <select class="form-control">
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
                    <button type="submit" class="btn btn-primary">Sua Hang</button>
                </form>
            </div>
            </div>
        </div>        
    </div>
</div>