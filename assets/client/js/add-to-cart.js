const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});

function addToCart(id) {
    $.ajax({
        url: "handles/add-to-cart.php",
        type: "POST",
        data: {
            id: id,
        },
        success: function (response) {
            var response = JSON.parse(response);
            if (response.status == 200) {
                $("#qty_cart").html(response.qty);
                $("#price_cart").html(numberFormat(response.price));
                Toast.fire({ title: "Thêm vào giỏ hàng thành công", type: "success" });
            } else {
                Toast.fire({ title: response.msg, type: "error" });
            }
        },
    });
}

function numberFormat(number) {
    return Number(number).toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
}

$("span.inc.qtybtn").click(function () {
    var productId = $(this).data("id");
    $.ajax({
        url: "handles/increase-cart.php",
        type: "GET",
        data: {
            id: productId,
        },
        success: function (response) {
            reloadCart();
        },
    });
});

$("span.dec.qtybtn").click(function () {
    var productId = $(this).data("id");
    $.ajax({
        url: "handles/decrease-cart.php",
        type: "GET",
        data: {
            id: productId,
        },
        success: function (response) {
            reloadCart();
        },
    });
});

$("span.del-item").click(function () {
    Swal.fire({
        title: 'Xóa sản phẩm khỏi giỏ hàng?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Xóa!',
        cancelButtonText: 'Hủy bỏ'
    }).then((result) => {
        if (result.value) {
            var productId = $(this).data("id");
            $.ajax({
                url: "handles/delete-cart.php",
                type: "GET",
                data: {
                    id: productId,
                },
                success: function (response) {
                    reloadCart();
                },
            });
        }
    });
});

function reloadCart() {
    $.ajax({
        url: "handles/reload-cart.php",
        type: "GET",
        success: function (response) {
            var response = JSON.parse(response);
            var shoppingCart = $("span.inc.qtybtn");
            $.each(shoppingCart, function (index, item) {
                var currentId = $(item).data("id");
                if (response[currentId]) {
                    $(item).siblings("input").val(response[currentId].item_qty);
                    $(item)
                        .closest(".shoping__cart__quantity")
                        .siblings(".shoping__cart__price")
                        .html(numberFormat(response[currentId].item_price));
                    $(item)
                        .closest(".shoping__cart__quantity")
                        .siblings(".shoping__cart__total")
                        .html(numberFormat(response[currentId].item_price * response[currentId].item_qty));
                } else {
                    $(item)
                        .closest("tr")
                        .hide("slow", function () {
                            $(this).remove();
                        });
                }
            });
            var totalPrice = 0;
            var totalProduct = 0;
            $.each(response, function (index, item) {
                totalProduct += item.item_qty;
                totalPrice += item.item_price * item.item_qty;
            });
            $("#qty_cart").html(totalProduct);
            $("#price_cart").html(numberFormat(totalPrice));
            $("#total_price").html(numberFormat(totalPrice));
        },
    });
}