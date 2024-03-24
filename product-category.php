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
                                        <ul class="product__item__pic__hover">
                                            <?php if ($product['qty'] > 0): ?>
                                                <li><a href="javascript:void(0)" onclick="addToCart(<?= $product['id'] ?>);"><i class="fa fa-shopping-cart"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="product-detail.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></h6>
                                        <div class="col-md-12">
                                            <h5 class="text-danger"><?= number_format($product['price'],-3,',',',') ?> VND / <?= $product['unit'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            Không có sản phẩm nào
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<?php include 'layouts/footer.php'; ?>