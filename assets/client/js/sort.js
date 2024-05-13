$(document).ready(function () {
    $("#sort_price").change(function () {
        var sort = $(this).val();
        $.ajax({
            url: 'handles/sort.php',
            type: 'GET',
            data: {
                'sort': sort
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
                                        <a href="product-details.php?id=${product.id}" style="display: block; width: 100%; height: 100%;"></a>
                                        <ul class="product__item__pic__hover">
                                        ${product.qty > 0 ?
                                            `<li><a href="javascript:void(0)" onclick="addToCart(${product.id});"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a></li>` :
                                            `<li><a href="javascript:void(0)" id="sold-out">Đã hết hàng</a></li>`
                                        }
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="product-details.php?id=${product.id}">${product.name}</a></h6>
                                        <h5 class="text-danger">${price} / ${product.unit}</h5>
                                    </div>
                                </div>
                            </div>`;
                        }
                    } else {
                        html += '<p>Hiện chưa có sản phẩm nào</p>';
                    }
                    $("#product_grid").fadeOut(300, function() {
                        $(this).html(html);
                        $('.set-bg').each(function () {
                            var bg = $(this).data('setbg');
                            $(this).css('background-image', 'url(' + bg + ')');
                            $(this).css('background-color', '#f3f6fa');
                        });
                        paginationProduct();
                    });
                }
            }
        });
    });
});