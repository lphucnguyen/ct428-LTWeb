<?php
    if(session_id()==="")
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
        <h3 class="mt-3 text-center">Thông tin tài khoản</h3>
        <?php
            if(isset($_SESSION["error"])):
        ?>
        <div class="text-danger mt-3"><?=$_SESSION["error"]?></div>
        <?php
            endif;
            unset($_SESSION["error"]);
        ?>
        <form method="GET" action="includes/process.php">
            <input type="hidden" name="action" value="updateAccount">
            <div class="form-group">
                <label>Họ Tên</label>
                <input type="text" class="form-control" name="hoten" value="<?=$row["HoTenKH"]?>" />
            </div>
            <div class="form-group">
                <label>Tên Công Ty</label>
                <input type="text" name="TenCongTy" class="form-control" value="<?=$row["TenCongTy"]?>" />
            </div>
            <div class="form-group">
                <label>Số Điện Thoại</label>
                <input type="text" name="SoDienThoai" class="form-control" value="<?=$row["SoDienThoai"]?>" />
            </div>
            <div class="form-group">
                <label>Số Fax</label>
                <input type="text" name="SoFax" class="form-control" value="<?=$row["SoFax"]?>" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value=""/>
            </div>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
        <form method="GET" class="mt-3" action="includes/process.php">
        <?php
         $sql = "SELECT * FROM DIACHIKH WHERE MSKH='" . $_SESSION["account"] . "'";
         $result = mysqli_query($db, $sql);
         if(mysqli_num_rows($result)<=0){
             echo '<input type="hidden" name="action" value="updateAddresses">
             <div class="form-group">
                 <label>Địa chỉ 1: </label>
                 <input type="text" name="diachi1" class="form-control" value="" />
             </div>
             <div class="form-group">
                 <label>Địa chỉ 2: </label>
                 <input type="text" name="diachi2" class="form-control" value="" />
             </div>
             <button type="submit" class="btn btn-primary">Lưu địa chỉ</button>
         </form>';
         }else{
             echo '<input type="hidden" name="action" value="updateAddresses">';
             $count=0;
         while($row = mysqli_fetch_assoc($result)){
             $count+=1;
         echo '
         <div class="form-group">
             <label>Địa chỉ '.$count.': </label>
             <input type="text" name="diachi'.$count.'" class="form-control" value="'.$row["DiaChi"].'" />
         </div>';
        }
         echo '<button type="submit" class="btn btn-primary">Lưu địa chỉ</button>
         </form>'; 
        }
        ?>
        <h3 class="mt-3 text-center">Đơn hàng</h3>
        <table class="table">
        <thead>
            <tr>
                <th>Số đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Ngày giao hàng</th>
                <th>Trạng thái đơn hàng</th>
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
                        <a href="includes/process.php?action=getCode&ord-code=<?=$row["SoDonDH"]?>" class="btn btn-primary">Xem đơn hàng</a>
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