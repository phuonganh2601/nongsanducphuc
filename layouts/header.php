<?php 
    include 'inc/connect.php';
    include 'helpers/helper.php';
    session_start();
    $baseFolder = dirname(__FILE__, 3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Font Awaesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/client/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/style.css" type="text/css">
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
                        <li><a href="order.php">Đơn hàng của tôi</a></li>
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
                                <li><i class="fa fa-envelope"></i> ogani@gmail.com</li>
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
                                        <li><a href="my-order.php">Đơn hàng của tôi</a></li>
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
                        ),-3,'.','.') : 0 ?> VND</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->