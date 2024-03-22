<?php
    $file = basename(getCurrentUrl(), '.php');
?>
<!-- Hero Section Begin -->
<section class="hero <?= ($file !== 'index' && $file !== 'webbannongsan') ? 'hero-normal' : '' ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục</span>
                    </div>
                    <ul>
                        <?php foreach (getCategories($connect) as $category): ?>
                            <li><a href="product-category.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="search.php" method="GET">
                            <input type="text" placeholder="Tìm kiếm sản phẩm ..." name="q">
                            <button type="submit" name="submit" class="site-btn">TÌM KIẾM</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>0123 456 789</h5>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
                <?php if ($file === 'index' || $file === 'webbannongsan'): ?>
                    <div class="hero__item set-bg" data-setbg="assets/client/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>TRÁI CÂY TƯƠI</span>
                            <h2>Rau củ xuất xứ<br />từ tự nhiên</h2>
                            <a href="product-grid.php" class="primary-btn">Xem sản phẩm</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->