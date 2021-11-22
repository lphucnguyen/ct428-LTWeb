<?php
    include("core/init.php");

    $file = "main";

    if(isset($_GET["action"])){
        if( !file_exists("includes/" . $_GET["action"] . ".php")){
            header("Location: 404.php");
            exit();
        }
        $file = $_GET["action"];
    }
    
?>

    <?php 
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" integrity="sha256-p6xU9YulB7E2Ic62/PX+h59ayb3PBJ0WFTEQxq0EjHw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <title>Be Pro Shop</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm fixed-top">
            <div class="container">
                <a href="index.php" class="navbar-brand">Be.Pro</a>
                <div class="toggle-menu">
                    <div class="toggle-bar"></div>
                </div>
                <div class="overlay">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item" style="--index: 0;">
                            <a href="index.php" class="nav-link">Trang Chủ</a>
                        </li>
                        <li class="nav-item" style="--index: 0;">
                            <a href="index.php?action=catelog" class="nav-link">Danh Mục</a>
                        </li>
                    </ul>                 
                </div>
                
                <ul class="list-unstyled d-flex user ml-auto mb-0">
                    <?php
                        session_start();
                        if(!isset($_SESSION["account"])):
                    ?>
                    <li><a href="login.php">Đăng nhập</a></li>
                    <li><a href="register.php">Đăng kí</a></li>
                    <?php
                        else:
                    ?>
                    <li>
                        <a href="index.php?action=myaccount"><i class="fa fa-user"></i></a>
                    </li>
                    <li>
                        <a href="logout.php" class="logout"><i class="fa fa-sign-out"></i></a>
                    </li>
                    <?php
                        endif;
                    ?>
                    <li>
                        <a href="?action=cart">
                            <i class="fa fa-shopping-basket"></i>
                        </a>
                    </li>
                </ul>                
            </div>
        </nav>   
    </header>

    <?php
        include(dirname(__FILE__) . "/includes/" . $file . ".php");
    ?>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo-footer">
                        <div class="logo">ModalX</div>
                    </div>
                    <div class="social-icons d-flex">
                        <div class="social-icon"><a href=""><i class="fa fa-facebook"></i></a></div>
                        <div class="social-icon"><a href=""><i class="fa fa-twitter"></i></a> </div>
                        <div class="social-icon"><a href=""><i class="fa fa-behance"></i></a> </div>
                        <div class="social-icon"><a href=""><i class="fa fa-linkedin"></i></a> </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="subcribe">
                        <div class="subcribe-top">
                            <ul>
                                <li><a href="">Man</a></li>
                                <li><a href="">Woman</a></li>
                                <li><a href="">Lookbook</a></li>
                                <li><a href="">Sale</a></li>
                                <li><a href="">Blog</a></li>
                            </ul>
                        </div>
                        <div class="subcribe-bottom">
                            <div class="subcribe-bottom-title">
                                <h6>Subcribes to news</h6>
                            </div>
                            <form action="" class="d-flex">
                                <input type="text" placeholder="Email Address">
                                <input type="submit" value="Submit">
                            </form>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact">
                        <div class="title-contact">
                            <h5>Contact US</h5>
                        </div>
                        <div class="content-contact">
                        Phone: 0843388318</br>
                        Address: Can Tho University</br>
                        Email: nguyenb1805794@student.ctu.edu.vn
                        </div>
                        <div class="payment">
                            <ul>
                                <li><img src="image/payment-1.png" alt=""></li>
                                <li><img src="image/payment-2.png" alt=""></li>
                                <li><img src="image/payment-3.png" alt=""></li>
                                <li><img src="image/payment-4.png" alt=""></li>
                                <li><img src="image/payment-5.png" alt=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
    ob_end_flush();
?>