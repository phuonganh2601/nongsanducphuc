<?php 
    include 'layouts/header.php'; 
    include 'inc/search.php';
    unset($_SESSION['order_id']);
?>
    <div class="container jumbotron text-center">
        <h2 class="display-3">Cảm ơn quý khách đã mua hàng của chúng tôi!</h2>
        <hr>
        <p>
            Nhấn vào <a href="orders.php" style="color: #008747; font-weight: bold;">đây</a> để xem đơn hàng của bạn
        </p>
        <p class="lead">
            <a class="site-btn" href="product-grid.php" role="button">Tiếp tục mua hàng</a>
        </p>
    </div>
<?php include 'layouts/footer.php'; ?>
