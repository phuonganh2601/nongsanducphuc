<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php foreach (getCategories($connect) as $category): ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/admin/img/categories/<?= $category['image'] ?>">
                            <h5><a href="product-category.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></h5>
                        </div>
                    </div>  
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->