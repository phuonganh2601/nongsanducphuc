function filterProductByCategory(id) {
    $.ajax({
        url: 'handles/filter.php',
        type: 'GET',
        data: {
            'id': id
        },
        success: function (response) {
            var response = JSON.parse(response);
            if (response.status == 200) {
                var html = '';
                if (response.products.length > 0) {
                    for (let product of response.products) {
                        var price = Number(product.price).toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                        html += `<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="../assets/admin/img/products/${product.image}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="javascript:void(0)" onclick="addToCart(${product.id});"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="product-detail.php?id=${product.id}">${product.name}</a></h6>
                                    <h5 class="text-danger">${price.replace('.', ',')}</h5>
                                </div>
                            </div>
                        </div>`;
                    }
                } else {
                    html += '<p>Hiện chưa có sản phẩm nào</p>';
                }
                $("#product_grid").html(html);
                $('.set-bg').each(function () {
                    var bg = $(this).data('setbg');
                    $(this).css('background-image', 'url(' + bg + ')');
                });
            }
        }
    });
}
