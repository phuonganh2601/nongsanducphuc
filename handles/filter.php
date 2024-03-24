<?php
    include '../inc/connect.php';
    include '../helpers/helper.php';

    if ($_GET['id'] == 0) {
        $products = getProducts($connect);
    } else {
        $products = getProductByCategoryId($connect, $_GET['id']);
    }

    echo json_encode([
        'status' => 200,
        'products' => $products
    ]);
