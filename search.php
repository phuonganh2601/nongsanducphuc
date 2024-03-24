<?php
    include 'layouts/header.php';
    include 'inc/search.php';
    if (isset($_GET['submit'])) {
        $q = $_GET['q'];
        $sql = "SELECT * FROM products WHERE name LIKE '%" . $q . "%'";
        $result = mysqli_query($connect, $sql);
    }
?>
<h3 class="text-center mt-3" style="font-weight: bold;">TÌM KIẾM VỚI TỪ KHÓA "<?= $q ?>"</h3>
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <?php while($product = mysqli_fetch_assoc($result)): ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="assets/admin/img/products/<?= $product['image'] ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="javascript:void(0)" onclick="addToCart(<?= $product['id'] ?>);"><i class="fa fa-shopping-cart"></i></a></li>
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
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<?php include 'layouts/footer.php'; ?>
