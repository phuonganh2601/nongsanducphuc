<?php 
    include 'layouts/header.php';
    include 'inc/search.php';
    $product = getProductById($connect, $_GET['id']);
    $sql = "SELECT avg(star) avgStar, count(*) countRating FROM ratings WHERE product_id = " . $product['id'];
    $rating = mysqli_fetch_assoc(mysqli_query($connect, $sql));
    $sqlRating = "SELECT r.*, u.name FROM ratings r, users u WHERE r.user_id = u.id AND r.product_id = " . $product['id'];
    $result = mysqli_query($connect, $sqlRating);
    if (isset($_POST['submit'])) {
        $userId = $_POST['user_id'];
        $productId = $_POST['product_id'];
        $star = $_POST['star'];
        $comment = $_POST['comment'];
        $sql = "INSERT INTO ratings(user_id, product_id, star, comment) 
        VALUES ({$userId}, {$productId}, {$star}, '{$comment}')";
        $status = mysqli_query($connect, $sql);
        if ($status) {
            echo '<script>
                window.location.href = "product-details.php?id=' . $product['id'] . '"
            </script>';
        }
    }
?>
<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item text-center">
                        <img class="product__details__pic__item--large"
                            src="assets/admin/img/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $product['name'] ?></h3>
                    <div class="product__details__rating">
                        <?php for ($count = 1;$count <= 5;$count++): ?>
                            <?php
                                if ($count <= round($rating['avgStar'])) {
                                    $color = 'color:#edbb0e;';
                                } else {
                                    $color = 'color:#ccc;';
                                }
                            ?>
                            <i class="fa fa-star" style="<?= $color ?>"></i>
                        <?php endfor; ?>
                        <span>(<?= $rating['countRating'] ?> đánh giá)</span>
                    </div>
                    <div class="product__details__price text-danger"><?= number_format($product['price'],-3,',','.') ?> VND / <?= $product['unit'] ?></div>
                    <?php if ($product['qty'] > 0): ?>
                        <a href="javascript:void(0)" onclick="addToCart(<?= $product['id'] ?>);" class="site-btn">THÊM VÀO GIỎ HÀNG</a>
                    <?php else: ?>
                        <a href="javascript:void(0)" class="site-btn-disabled">THÊM VÀO GIỎ HÀNG</a>
                    <?php endif; ?>
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
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active">Đánh giá</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <?php if ($rating['countRating'] <= 0): ?>
                                <p>Chưa có đánh giá về sản phẩm này</p>
                            <?php else: ?>
                                <p>Đã có <?= $rating['countRating'] ?> đánh giá về sản phẩm này</p>
                            <?php endif; ?>
                            <div class="comment-sec-area">
                                <div class="container">
                                    <div class="row flex-column">
                                        <div class="comment">
                                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                                                <div class="comment-list comment-container">
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb">
                                                                <img src="assets/client/img/people.png" width="50">
                                                            </div>
                                                            <div class="desc mb-4">
                                                                <h5><a href="javascript:void(0)"><?= $row['name'] ?></a></h5>
                                                                <div class="date"><?= date('d/m/Y H:i:s', strtotime($row['created_at'])) ?></div>
                                                                <?php for ($count = 1;$count <= 5;$count++): ?>
                                                                    <?php
                                                                        if ($count <= $row['star']) {
                                                                            $color = 'color:#edbb0e;';
                                                                        } else {
                                                                            $color = 'color:#ccc;';
                                                                        }
                                                                    ?>
                                                                    <i class="fa fa-star" style="<?= $color ?>"></i>
                                                                <?php endfor; ?>
                                                                <p class="comment"><?= $row['comment'] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab" style="padding-top: 0;">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active">Đánh giá của bạn</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <?php if (isset($_SESSION['user']['id'])): ?>
                                <p>Chất lượng sản phẩm: 
                                    <?php for ($count = 1;$count <= 5;$count++): ?>
                                        <i class="fa fa-star rating" id="<?= $product['id'] ?>-<?= $count ?>" data-index="<?= $count ?>" data-product_id="<?= $product['id'] ?>" style="color: #edbb0e; cursor: pointer;"></i>
                                    <?php endfor; ?>
                                </p>
                                <form class="mt-3" action="" method="POST">
                                    <input type="hidden" name="star" id="star" value="5">
                                    <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>" />
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
                                    <textarea class="form-control mb-10" name="comment" cols="5" rows="4"
                                    placeholder="Nhập đánh giá của bạn về sản phẩm này" required></textarea>
                                    <button type="submit" name="submit" class="primary-btn mt-3" style="border: none;">Đánh giá</button>
                                </form>
                            <?php else: ?>
                                <a href="login.php" class="primary-btn mt-3">Để đánh giá vui lòng đăng nhập</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->
<?php include 'layouts/footer.php'; ?>