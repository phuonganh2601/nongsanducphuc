<?php 
    include 'layouts/header.php';
    include 'inc/search.php';
    $product = getProductById($connect, $_GET['id']);
?>
<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="assets/admin/img/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $product['name'] ?></h3>
                    <div class="product__details__price text-danger"><?= number_format($product['price'],-3,',',',') ?> VND / <?= $product['unit'] ?></div>
                    <a href="javascript:void(0)" onclick="addToCart(<?= $product['id'] ?>);" class="primary-btn">THÊM GIỎ HÀNG</a>
                    <ul>
                        <li><b>Danh mục</b> <span><?= $product['category_name'] ?></span></li>
                        <li><b>Trạng thái</b> <span><?= $product['qty'] > 0 ? 'Còn hàng' : 'Hết hàng' ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active">Mô tả sản phẩm</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div>
                                <p><?= !empty($product['description']) ? html_entity_decode($product['description']) : 'Hiện tại chưa có mô tả sản phẩm' ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->
<?php include 'layouts/footer.php'; ?>