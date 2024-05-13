<?php 
    include 'layouts/header.php'; 
    include 'inc/search.php';
?>
<h3 class="text-center mt-3 text-uppercase" style="font-weight: bold;">DANH MỤC <?= getCategoryById($connect, $_GET['id'])['name'] ?></h3>
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <?php if (count(getProductByCategoryId($connect, $_GET['id'])) > 0) : ?>
                        <?php $count = 1;
                        foreach (getProductByCategoryId($connect, $_GET['id']) as $product) : ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="assets/admin/img/products/<?= $product['image'] ?>">
                                        <a href="product-details.php?id=<?= $product['id'] ?>" style="display: block; width: 100%; height: 100%;"></a>
                                        <ul class="product__item__pic__hover">
                                            <li>
                                                <?php if ($product['qty'] > 0): ?>
                                                    <a href="javascript:void(0)" onclick="addToCart(<?= $product['id'] ?>);"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0)" id="sold-out">Đã hết hàng</a>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="product-details.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></h6>
                                        <h5 class="text-danger text-center"><?= number_format($product['price'],-3,',','.') ?> VND / <?= $product['unit'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            Hiện chưa có sản phẩm nào
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<?php include 'layouts/footer.php'; ?>