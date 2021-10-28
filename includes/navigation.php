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
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Sign Up</a></li>
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