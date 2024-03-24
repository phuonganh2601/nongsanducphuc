<?php
    include 'layouts/header.php';
    include 'inc/search.php';
?>
    <h3 class="text-center mb-4">Danh mục sản phẩm</h3>
<?php
    include 'inc/category.php';
?>
<!-- Featured Section Begin -->
<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Các loại rau củ</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Tất cả</li>
                        <?php foreach (getCategories($connect) as $category): ?>
                            <li data-filter=".<?= str_replace(' ', '', $category['name']) ?>"><?= $category['name'] ?></li> 
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php foreach (getProducts($connect) as $product): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?= str_replace(' ', '', $product['category_name']) ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="assets/admin/img/products/<?= $product['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="javascript:void(0)" onclick="addToCart(<?= $product['id'] ?>);"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="product-detail.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></h6>
                            <h5 class="text-danger text-center"><?= number_format($product['price'],-3,',',',') ?> VND / <?= $product['unit'] ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->
<?php include 'layouts/footer.php'; ?>
