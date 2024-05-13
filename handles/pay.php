<?php
    include '../inc/connect.php';
    include '../helpers/helper.php';
    session_start();
    $productIds = array_column($_SESSION['shopping_cart'], 'item_id');
    if (!empty(checkProductInStock($connect, $productIds))) {
        $productNames = implode(', ', array_column(checkProductInStock($connect, $productIds), 'name'));
        $msg = "Sản phẩm $productNames đã hết hàng";
        foreach (array_column(checkProductInStock($connect, $productIds), 'id') as $productId){
            unset($_SESSION['shopping_cart'][$productId]);
        }
        echo '<script>
            alert("' . $msg . '");
            window.location.href = "../shopping-cart.php";
        </script>';
        die;
    }
    do {
        $orderId = str_pad(random_int(1, 999999), 6, '0', STR_PAD_LEFT);
    } while (checkExistOrderId($connect, $orderId));
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $type = $_POST['type'];
    $userId = $_SESSION['user']['id'];
    $total = array_reduce($_SESSION['shopping_cart'], 
        function($total, $item) {
            $total += $item['item_price'] * $item['item_qty'];

            return $total;
        }, 
        0
    );
    $address = $_POST['address'];
    $order_status = $type == 2 ? '1' : '0';
    $sql = "INSERT INTO orders (id, user_id, total, address, name, tel, type, status) VALUES ('{$orderId}', {$userId}, {$total}, '{$address}', '{$name}', '{$tel}', '{$type}', '{$order_status}')";
    $status = mysqli_query($connect, $sql);
    if ($status) {
        foreach ($_SESSION['shopping_cart'] as $row) {
            $productId = $row['item_id'];
            $qty = $row['item_qty'];
            $price = $row['item_price'];

            $updateSql = "UPDATE products SET qty = GREATEST(qty - {$qty}, 0) WHERE id = {$productId}";
            mysqli_query($connect, $updateSql);

            $sql = "INSERT INTO order_details (order_id, product_id, qty, price) VALUES ('{$orderId}', {$productId}, {$qty}, {$price})";
            mysqli_query($connect, $sql);
        }
        unset($_SESSION['shopping_cart']);
        if ($type == 0) {
            header('Location: ../thank.php');
            exit();
        }
        if ($type == 1) {
            $_SESSION['order_id'] = $orderId;
            header('Location: ../qr-code.php');
            exit();
        }
        if ($type == 2) {
            header('Location: ../vnpay/payment.php?order=' . $orderId);
            exit();
        }
    }
