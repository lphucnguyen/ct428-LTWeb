<?php
if(!defined("ADMIN")){
    exit();
}

?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Hàng hóa</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hàng hóa</h6>
            </div>
            <div class="card-body">
                <form action="./modules/product/process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>MSHH</label>
                        <input type="text" name="MSHH" class="form-control" value="" />
                    </div>
                    <div class="form-group">
                        <label>Tên Hàng Hóa</label>
                        <input type="text" name="TenHH" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Quy Cách</label>
                        <textarea rows="10" type="text" name="QuyCach" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" name="Gia" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Số Lượng Hàng</label>
                        <input type="text" name="SoLuongHang" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Loại Hàng Hóa</label>
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
                        <div class="input-group mb-3 image-select">
                            <label for="input-hinh" class="btn btn-success w-100">Chọn Hình</label>
                            <input class="form-control" onchange="changeImage(this)" id="input-hinh" type="file" id="hinhanh" name="hinhanh[]" multiple="true">
                            <div class="image-preview">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="themhang">Thêm Hàng</button>
                </form>
                <div class="table-responsive">
                <table class="table mt-4 table-bordered table-data" data-get="orders">
                    <thead>
                    <tr>
                        <th>Tên hàng</th>
                        <th>Giá</th>
                        <th>Số lượng hàng</th>
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
                                <td><?=number_format($row["Gia"], 0, '', '.')?></td>
                                <td><?=$row["SoLuongHang"]?></td>
                                <td>
                                    <a href="index.php?module=product&action=edit&id=<?=$row["MSHH"]?>" class="btn btn-primary">
                                        Chỉnh sửa
                                    </a>
                                    <a href="./modules/product/process.php?action=xoa&id=<?=$row["MSHH"]?>" class="btn btn-danger">
                                        Xoá
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

<script>
    const imagePreview = document.querySelector(".image-preview");

    const changeImage = (e) => {
        let files = e.files;
        let filesHTML = '';

        Array.from(files).forEach(file => {
            filesHTML += '<img src="' + URL.createObjectURL(file) + '" />';
        });

        imagePreview.innerHTML = filesHTML;
    }
</script>