function addToCart(id) {
    $.ajax({
        url: 'handles/add-to-cart.php',
        type: 'POST',
        data: {
            'id': id,
        },
        success: function(response) {
            var response = JSON.parse(response);
            if(response.status == 200) {
                $("#qty_cart").html(response.qty);
                $("#price_cart").html(response.price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                swal({ title: 'Thêm giỏ hàng thành công', type: 'success' });
            } else {
                swal({ title: response.msg, type: 'error' });
            }
        }
    });
}