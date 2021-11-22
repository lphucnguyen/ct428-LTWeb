<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Trang Đăng Kí</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<?php
  include("core/init.php");
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mskh=$_POST["MSKH"];
    $hoten=$_POST["HoTenKH"];
    $congty=$_POST["TenCongTy"];
    $fax=$_POST["FAX"];
    $pass=$_POST["Pass"];
    $sdt=$_POST["SoDienThoai"];
    
    $sql = "SELECT * FROM KHACHHANG WHERE MSKH='" . $mskh . "'";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) == 0){
        $sql_insert="INSERT INTO KHACHHANG VALUES('".$mskh."','".$hoten."','".$congty."','".$sdt."','".$fax."','".md5($pass)."');";
        mysqli_query($db,$sql_insert);
        $_SESSION["account"]=$mskh;
        header("location: index.php?action=myaccount");
    }
    else {
        $_SESSION["error"] = "Mã số khách hàng đã tồn tại";
    };
  }
?>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Đăng kí khách hàng</h1>
              </div>
              <?php
                if(isset($_SESSION["error"])):
              ?>
              <div class="text-danger mt-3"><?=$_SESSION["error"]?></div>
              <?php
                endif;
                unset($_SESSION["error"]);
              ?>
              <form class="user" method="POST">
                <div class="form-group">
                  <input name="MSKH" type="text" class="form-control form-control-user"  required placeholder="Mã số khách hàng">
                </div>
                <div class="form-group">
                  <input name="HoTenKH" type="text" class="form-control form-control-user"  required placeholder="Họ tên">
                </div>
                <div class="form-group">
                  <input name="TenCongTy" type="text" class="form-control form-control-user"  required placeholder="Tên công ty">
                </div>
                <div class="form-group">
                  <input name="FAX" type="text" class="form-control form-control-user"  required placeholder="Số Fax">
                </div>
                <div class="form-group row">
                  <div class="col-12">
                    <input name="Pass" type="password" class="form-control form-control-user" required placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <input name="SoDienThoai" type="text" class="form-control form-control-user" required placeholder="Số điện thoại">
                </div>
                <button class="btn btn-primary btn-user btn-block">Đăng kí tài khoản</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login.php">Đăng nhập</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>
