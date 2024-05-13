<?php 
    include 'inc/connect.php';
    include 'helpers/helper.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    session_start();
    $baseFolder = dirname(__FILE__, 3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Đức Phúc - Nông sản sạch">
    <meta name="keywords" content="Duc Phuc, nong san, nong san sach, nong san Duc Phuc">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đức Phúc - Nông sản sạch</title>
	<link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

    <!-- Font Awaesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/client/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/comment.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/dataTables.dataTables.css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo d-flex justify-content-center">
            <a class="text-dark" href="index.php"><img src="assets/client/img/logo.png" /></a>
        </div>
        <div class="humberger__menu__widget">
            <?php if (!isset($_SESSION['user'])): ?>
                <div class="header__top__right__auth">
                    <a href="login.php"><i class="fa fa-user"></i> Đăng nhập</a>
                </div>
                <div class="header__top__right__auth">
                    <a href="register.php">| Đăng ký</a>
                </div>
            <?php else: ?>
                <div class="header__top__right__language">
                    <div>Xin chào, <?= $_SESSION['user']['name'] ?></div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="profile.php">Thông tin cá nhân</a></li>
                        <li><a href="change-password.php">Đổi mật khẩu</a></li>
                        <li><a href="orders.php">Đơn hàng của tôi</a></li>
                        <li><a href="logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <div id="mobile-menu-wrap"><div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_collapsed" style="outline: none;"><span class="slicknav_menutxt">MENU</span><span class="slicknav_icon"><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a><nav class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu" style="display: none;">
            <ul>
                <li><a style="font-family: sans-serif;" href="index.php">Trang chủ</a></li>
                <li><a style="font-family: sans-serif;" href="introduce.php">Giới thiệu</a></li>
                <li><a style="font-family: sans-serif;" href="product-grid.php">Sản phẩm</a></li>
            </ul>
        </nav></div></div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> huyhoang.sdv@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <?php if (!isset($_SESSION['user'])): ?>
                                <div class="header__top__right__auth">
                                    <a href="login.php"><i class="fa fa-user"></i> Đăng nhập</a>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="register.php">| Đăng ký</a>
                                </div>
                            <?php else: ?>
                                <div class="header__top__right__language">
                                    <div>Xin chào, <?= $_SESSION['user']['name'] ?></div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="profile.php">Thông tin cá nhân</a></li>
                                        <li><a href="change-password.php">Đổi mật khẩu</a></li>
                                        <li><a href="orders.php">Đơn hàng của tôi</a></li>
                                        <li><a href="logout.php">Đăng xuất</a></li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a class="text-dark" href="index.php"><img src="assets/client/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="introduce.php">Giới thiệu</a></li>
                            <li><a href="product-grid.php">Sản phẩm</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a class="text-dark" href="shopping-cart.php"><i class="fa fa-shopping-bag"></i> <span id="qty_cart"><?= isset($_SESSION['shopping_cart']) ? array_sum(array_column($_SESSION['shopping_cart'], 'item_qty')) : 0 ?></span> Giỏ hàng</a></li>
                        </ul>
                        <div class="header__cart__price">Tổng: <span id="price_cart"><?= isset($_SESSION['shopping_cart']) ? number_format(array_reduce($_SESSION['shopping_cart'], 
                            function($total, $item) {
                                $total += $item['item_price'] * $item['item_qty'];

                                return $total;
                            }, 
                            0
                        ),-3,',','.') : 0 ?> VND</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->