<?php 
    include 'layouts/header.php'; 
    include 'inc/search.php';
    $productIds = array_column($_SESSION['shopping_cart'], 'item_id');
    if (!empty(checkProductInStock($connect, $productIds))) {
        $productNames = implode(', ', array_column(checkProductInStock($connect, $productIds), 'name'));
        $msg = "Sản phẩm $productNames đã hết hàng";
        foreach (array_column(checkProductInStock($connect, $productIds), 'id') as $productId){
            unset($_SESSION['shopping_cart'][$productId]);
        }
        echo '<script>
            alert("' . $msg . '");
            window.location.href = "shopping-cart.php";
        </script>';
        die;
    }
?>
<h3 class="text-center mt-3 text-uppercase" style="font-weight: bold;">ĐẶT HÀNG</h3>
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="handles/pay.php" method="POST" id="checkout-form">
                <input type='hidden' name='total' value='<?= array_reduce(
                                    $_SESSION['shopping_cart'],
                                    function ($total, $item) {
                                        $total += $item['item_price'] * $item['item_qty'];

                                        return $total;
                                    },
                                    0
                                ) ?>'>

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout__input">
                            <p>Họ và tên <span class="text-danger">*</span></p>
                            <input type="text" placeholder="Nhập họ và tên" name="name" class="checkout__input__add" value="<?= $_SESSION['user']['name'] ?>" required>
                        </div>
                        <div class="checkout__input">
                            <p>Số điện thoại <span class="text-danger">*</span></p>
                            <input type="tel" placeholder="Nhập số điện thoại" name="tel" class="checkout__input__add" value="<?= $_SESSION['user']['phone'] ?>" required>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ nhận hàng <span class="text-danger">*</span></p>
                            <input type="text" placeholder="Nhập địa chỉ" name="address" class="checkout__input__add" value="<?= $_SESSION['user']['address'] ?>" required>
                        </div>
                        <div class="checkout__input">
                            <p>Hình thức thanh toán <span class="text-danger">*</span></p>
                            <select class="checkout__input__add" name="type" required>
                                <option value="">Vui lòng chọn hình thức thanh toán</option>
                                <option value="0">Thanh toán khi nhận hàng</option>
                                <option value="1">Chuyển khoản qua ngân hàng</option>
                                <option value="2">Thanh toán qua VNPAY</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout__order">
                            <h4>Chi tiết đơn hàng</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
                            <ul>
                                <?php foreach ($_SESSION['shopping_cart'] as $row): ?>
                                    <li><?= $row['item_name'] . " x " . $row['item_qty'] ?> <span><?= number_format($row['item_price'] * $row['item_qty'] ,-3,',','.') ?> VND</span></li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="checkout__order__total">Thành tiền <span class="total-cart">
                            <?=
                                number_format(array_reduce(
                                    $_SESSION['shopping_cart'],
                                    function ($total, $item) {
                                        $total += $item['item_price'] * $item['item_qty'];

                                        return $total;
                                    },
                                    0
                                ), -3, '.', '.')
                            ?> VND
                            </span></div>
                            <button type="submit" name="btnSubmit" class="site-btn">ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
<?php include 'layouts/footer.php'; ?>
