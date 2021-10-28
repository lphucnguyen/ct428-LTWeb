<?php
    session_start();

    if(!isset($_SESSION["account"])) header("location: login.php");

    $sql = "SELECT * FROM KHACHHANG WHERE MSKH='" . $_SESSION["account"] . "'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<div class="breadcum">
    <div class="breadcum-title">
        <h3>Tài khoản</h3>
    </div>
    <div class="breadcum-content">
        <ul>
            <li><a href="">Tài khoản</a></li>
        </ul>
    </div>
</div>

<main>
    <div class="container">
        <h3 class="mt-3 text-center">Thong tin tai khoan</h3>
        <form method="POST">
            <div class="form-group">
                <label>Ho Ten Khach Hang</label>
                <input type="text" class="form-control" value="<?=$row["HoTenKH"]?>" />
            </div>
            <div class="form-group">
                <label>Ten Cong Ty</label>
                <input type="text" name="TenCongTy" class="form-control" value="<?=$row["TenCongTy"]?>" />
            </div>
            <div class="form-group">
                <label>So Dien Thoai</label>
                <input type="text" name="SoDienThoai" class="form-control" value="<?=$row["SoDienThoai"]?>" />
            </div>
            <div class="form-group">
                <label>So Fax</label>
                <input type="text" name="SoFax" class="form-control" value="<?=$row["SoFax"]?>" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">Luu thay doi</button>
        </form>
        <form method="POST" class="mt-3">
            <div class="form-group">
                <label>Dia Chi 1: </label>
                <input type="text" name="diachi2" class="form-control" value="" />
            </div>
            <div class="form-group">
                <label>Dia Chi 2: </label>
                <input type="text" name="diachi1" class="form-control" value="" />
            </div>
            <button type="submit" class="btn btn-primary">Luu dia chi</button>
        </form>
        <h3 class="mt-3 text-center">Don Hang</h3>
        <table class="table">
        <thead>
            <tr>
                <th>So Don Hang</th>
                <th>Ngay DH</th>
                <th>Ngay GH</th>
                <th>Trang Thai DH</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM DATHANG WHERE MSKH='" . $_SESSION["account"] . "'";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($result)):
            ?>
                <tr>
                    <td><?=$row["SoDonDH"]?></td>
                    <td><?=$row["NgayDH"]?></td>
                    <td><?=$row["NgayGH"]?></td>
                    <td><?=$row["TrangThaiDH"]?></td>
                    <td>
                        <a href="includes/process.php?action=getCode&ord-code=<?=$row["SoDonDH"]?>" class="btn btn-primary">Xem Don Hang</a>
                    </td>
                </tr>
            <?php
                endwhile;
            ?>
            <tr></tr>
        </tbody>
    </table>
    </div>
</main>