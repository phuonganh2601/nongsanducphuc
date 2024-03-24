<?php
    include '../inc/connect.php';
    include '../helpers/helper.php';
    session_start();

    $product = getProductById($connect, $_POST['id']);
    if (isset($_SESSION['shopping_cart'])) {
        $productIds = array_column($_SESSION['shopping_cart'], 'item_id');
        if (!in_array($_POST['id'], $productIds)) {
            $item_array = [
                'item_id' => $_POST['id'],
                'item_name' => $product['name'],
                'item_price' => $product['price'],
                'item_image' => $product['image'],
                'item_qty' => 1,
            ];
            $_SESSION['shopping_cart'][$_POST['id']] = $item_array;
        } else {
            $_SESSION['shopping_cart'][$_POST['id']]['item_qty'] += 1;
        }
    } else {
        $item_array = [
            'item_id' => $_POST['id'],
            'item_name' => $product['name'],
            'item_price' => $product['price'],
            'item_image' => $product['image'],
            'item_qty' => 1,
        ];
        $_SESSION['shopping_cart'][$_POST['id']] = $item_array;
    }

    $totalQty = array_sum(array_column($_SESSION['shopping_cart'], 'item_qty'));
    $totalPrice = array_reduce($_SESSION['shopping_cart'], 
        function($total, $item) {
            $total += $item['item_price'] * $item['item_qty'];

            return $total;
        }, 
        0
    );

    echo json_encode([
        'status' => 200,
        'qty' => $totalQty,
        'price' => $totalPrice,
    ]);
