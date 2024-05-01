function remove_background(product_id) {
    for (let count = 1; count <= 5; count++) {
        $('#' + product_id + '-' + count).css('color', '#ccc');
    }
}

$(document).on('click', '.rating', function () {
    var index = $(this).data('index');
    var product_id = $(this).data('product_id');
    remove_background(product_id);
    for (let count = 1; count <= index; count++) {
        $('#' + product_id + '-' + count).css('color', '#edbb0e');
    }
    $('#star').val(index);
});
