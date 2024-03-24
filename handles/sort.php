<?php
    include '../inc/connect.php';
    include '../helpers/helper.php';

    if ($_GET['sort'] == 0) {
        $products = getProducts($connect);
    } else {
        $products = sortProduct($connect, $_GET['sort']);
    }

    echo json_encode([
        'status' => 200,
        'products' => $products
    ]);