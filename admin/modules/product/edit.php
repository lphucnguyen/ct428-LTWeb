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
        <?php
            $sql = "SELECT * FROM hanghoa WHERE MSHH ='" .$_GET["id"]. "'";
            $result = mysqli_query($db, $sql);
            $result1 = mysqli_fetch_assoc($result);
        ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Hàng hóa</h6>
            </div>
            <div class="card-body">
                <form action="./modules/product/process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>MSHH</label>
                        <input type="text" readonly name="MSHH" class="form-control" value="<?=$result1["MSHH"]?>" />
                    </div>
                    <div class="form-group">
                        <label>Tên hàng hóa</label>
                        <input type="text" name="TenHH" class="form-control"  value="<?=$result1["TenHH"]?>" />
                    </div>
                    <div class="form-group">
                        <label>Quy cách</label>
                        <textarea rows="10" type="text" name="QuyCach" class="form-control"><?=$result1["QuyCach"]?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" name="Gia" class="form-control"  value="<?=$result1["Gia"]?>" />
                    </div>
                    <div class="form-group">
                        <label>Số lượng hàng</label>
                        <input type="text" name="SoLuongHang" class="form-control"  value="<?=$result1["SoLuongHang"]?>" />
                    </div>
                    <div class="form-group">
                        <label>Loại hàng hóa</label>
                        <select class="form-control" name="maloai">
                            <?php
                                $sql = "SELECT * FROM LOAIHANGHOA";
                                $result = mysqli_query($db, $sql);

                                while($row = mysqli_fetch_assoc($result)):
                            ?>  
                                <option value="<?=$row["MaLoaiHang"]?>" <?=($row["MaLoaiHang"] == $result1["MaLoaiHang"]) ? "selected" : ""?>><?=$row["TenLoaiHang"]?></option>
                            <?php
                                endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File hình</label>
                        <div class="input-group mb-3 image-select">
                            <label for="input-hinh" class="btn btn-success w-100">Chọn hình</label>
                            <input class="form-control" onchange="changeImage(this)" id="input-hinh" type="file" id="hinhanh" name="hinhanh[]" multiple="true">
                            <div class="image-preview">
                            <?php
                                $sql = "SELECT * FROM HINHHANGHOA WHERE MSHH='" . $_GET["id"] . "'";
                                $result = mysqli_query($db, $sql);

                                while($row = mysqli_fetch_assoc($result)):
                            ?>  
                                <img src="../uploads/<?=$row["tenhinh"]?>" />
                            <?php
                                endwhile;
                            ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="suahang">Sửa hàng</button>
                </form>
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