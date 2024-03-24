<?php 
    include 'layouts/header.php';
    include 'inc/search.php';
?>
<h3 class="text-center mt-3 text-uppercase" style="font-weight: bold;">DANH SÁCH SẢN PHẨM</h3>

<!-- Product Section Begin -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Lọc theo danh mục</h4>
                        <ul>
                            <li style="cursor: pointer" onMouseOver="this.style.color='#5cb3ff'"
                                onMouseOut="this.style.color='black'" onclick="filterProductByCategory(0);" class="mb-3 brand_item">Mặc định</li>
                            <?php foreach (getCategories($connect) as $category): ?>
                                <li style="cursor: pointer" onMouseOver="this.style.color='#5cb3ff'"
                                onMouseOut="this.style.color='black'" onclick="filterProductByCategory(<?= $category['id'] ?>);" class="mb-3 brand_item"><?= $category['name'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sắp xếp theo giá</span>
                                <select id="sort_price">
                                    <option value="0">Mặc định</option>
                                    <option value="1">Cao đến thấp</option>
                                    <option value="2">Thấp đến cao</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="product_grid">
                    <?php foreach (getProducts($connect) as $product): ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="assets/admin/img/products/<?= $product['image'] ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="javascript:void(0)" onclick="addToCart(<?= $product['id'] ?>);"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="product-detail.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></h6>
                                    <h5 class="text-danger text-center"><?= number_format($product['price'],-3,',',',') ?> VND / <?= $product['unit'] ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<?php include 'layouts/footer.php'; ?>
