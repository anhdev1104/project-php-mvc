<?php 
    session_start();

    if(isset($_GET['dangxuatuser']) && $_GET['dangxuatuser'] == 1)  {
        unset($_SESSION['register']);
        unset($_SESSION['login_user']);
        header('Location: ../admin/login.php');
    }
?>

<header class="header">
    <section class="header-top container wraper">
        <div class="header-logo">
            <a href="#" class="logo-link">
                <img src="./img/logo.svg" alt="" class="logo-img">
            </a>
        </div>
        <div class="header-nav">
            <div class="nav-above wraper">
                <div class="above-item wraper account">
                    <i class="fa-regular fa-user"></i>
                    <div class="account-name"> 
                        <?php  
                            if(isset($_SESSION['register'])) {
                                echo "Hi! ".$_SESSION['register'];
                            } else if (isset($_SESSION['login_user'])) {
                                echo "Hi! ".$_SESSION['login_user'];
                            } else {
                                echo "<a href='../admin/login.php'>Login</a>";
                            }
                        ?>
                    </div>
                    <?= (isset($_SESSION['register']) || isset($_SESSION['login_user'])) ? '<a href="index.php?dangxuatuser=1" class="page-logout">Đăng xuất</a>' : '' ?>
                </div>
                
                <div class="above-item header_search wraper" id="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>Tìm kiếm</span>
                    <div class="search-block ">
                        <form action="#" class="search-form">
                            <input type="text" class="search-input" placeholder="Nhập từ khoá tìm kiếm">
                            <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        </form>
                    </div>
                </div>

                <div class="above-item wraper">VN</div>
                <div class="above-item wraper">EN</div>
                <a title="Giỏ hàng" href="viewcart.php" class="above-item wraper">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
            
            <!-- NAVBAR -->
            <?php include('nav.php') ?>
        </div>
    </section>
</header>