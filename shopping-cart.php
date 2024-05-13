<?php 
    include './layouts/header.php'; 
    include './inc/search.php';
?>
<h3 class="text-center mt-3" style="font-weight: bold;">GIỎ HÀNG</h3>
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th width="200">Đơn giá</th>
                                <th>Số lượng</th>
                                <th width="350">Tổng tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($_SESSION['shopping_cart'])): ?>
                                <?php foreach ($_SESSION['shopping_cart'] as $row): ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <a href="product-details.php?id=<?= $row['item_id'] ?>" style="color: #1c1c1c;"><img src="assets/admin/img/products/<?= $row['item_image'] ?>" alt="<?= $row['item_name'] ?>" width="100">
                                            <h5><?= $row['item_name'] ?></h5></a>
                                        </td>
                                        <td class="shoping__cart__price">
                                            <?= number_format($row['item_price'],-3,',','.') ?> VND
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <span class="dec qtybtn" data-id="<?= $row['item_id'] ?>">-</span>
                                                    <input type="text" value="<?= $row['item_qty'] ?>" readonly>
                                                    <span class="inc qtybtn" data-id="<?= $row['item_id'] ?>">+</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            <?= number_format($row['item_price'] * $row['item_qty'],-3,',','.') ?> VND
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close del-item" data-id="<?= $row['item_id'] ?>"></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" align="center">Chưa có sản phẩm nào trong giỏ hàng</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="product-grid.php" class="site-btn">Tiếp tục mua hàng</a>
                </div>
            </div>
            <?php if (isset($_SESSION['shopping_cart']) && count($_SESSION['shopping_cart']) > 0): ?>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Giỏ hàng</h5>
                        <ul>
                            <li>Tổng tiền <span id="total_price">
                                <?= 
                                    number_format(array_reduce($_SESSION['shopping_cart'], 
                                    function($total, $item) {
                                        $total += $item['item_price'] * $item['item_qty'];
        
                                        return $total;
                                    }, 
                                    0
                                    ),-3,',','.')
                                ?> VND
                            </span></li>
                        </ul>
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="checkout.php" class="primary-btn">ĐẶT HÀNG</a>
                        <?php else: ?>
                            <a href="login.php" class="primary-btn">VUI LÒNG ĐĂNG NHẬP</a>
                        <?php endif ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
<?php include './layouts/footer.php'; ?>
