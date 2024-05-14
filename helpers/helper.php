<?php
    function getCategories($connect)
    {
        $categories = [];
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }

        return $categories;
    }

    function getProducts($connect)
    {
        $products = [];
        $sql = "SELECT a.*, b.name category_name FROM products a, categories b WHERE a.category_id = b.id";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        return $products;
    }

    function getFeatureProducts($connect)
    {
        $products = [];
        $sql = "SELECT a.*, b.name category_name FROM products a, categories b WHERE a.category_id = b.id ORDER BY RAND() LIMIT 12";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        $category_id = array_column($products, "category_id");
        array_multisort($category_id, SORT_ASC, $products);

        return $products;
    }

    function getProductByCategoryId($connect, $categoryId)
    {
        $products = [];
        $sql = "SELECT a.*, b.name category_name FROM products a, categories b WHERE a.category_id = b.id AND a.category_id = {$categoryId}";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        return $products;
    }

    function getCategoryById($connect, $id)
    {
        $sql = "SELECT * FROM categories WHERE id = {$id}";
        $result = mysqli_query($connect, $sql);
        $category = mysqli_fetch_assoc($result);

        return $category;
    }

    function getProductById($connect, $id)
    {
        $sql = "SELECT a.*, b.name category_name FROM products a, categories b 
        WHERE a.category_id = b.id AND a.id = {$id}";
        $result = mysqli_query($connect, $sql);
        $product = mysqli_fetch_assoc($result);

        return $product;
    }

    function getCurrentFolderUrl()
    {
        $currentPath = $_SERVER['PHP_SELF'];
        $pathInfo = pathinfo($currentPath);
        $hostName = $_SERVER['HTTP_HOST'];
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';

        return $protocol . $hostName . $pathInfo['dirname'] . "/";
    }

    function getBaseUrl()
    {
        return sprintf(
            "%s://%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME']
        );
    }

    function getCurrentUrl()
    {
        return (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    function sortProduct($connect, $sort)
    {
        $products = [];
        if ($sort == 1) {
            $sql = "SELECT a.*, b.name category_name FROM products a, categories b WHERE a.category_id = b.id ORDER BY a.price DESC";
        } else {
            $sql = "SELECT a.*, b.name category_name FROM products a, categories b WHERE a.category_id = b.id ORDER BY a.price ASC";
        }

        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        return $products;
    }

    function getMyOrder($connect, $userId)
    {
        $orders = [];
        $sql = "SELECT * FROM orders WHERE user_id = {$userId} ORDER BY created_at DESC";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }

        return $orders;
    }

    function getOrderDetail($connect, $id)
    {
        $products = [];
        $sql = "SELECT * FROM order_details WHERE order_id = '{$id}'";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $productId = $row['product_id'];
            $sql = "SELECT * FROM products WHERE id = {$productId}";
            $row['product'] = mysqli_fetch_assoc(mysqli_query($connect, $sql));
            $products[] = $row;
        }

        return $products;
    }

    function checkExistOrderId($connect, $id)
    {
        $sql = "SELECT 1 FROM orders WHERE id = '{$id}' LIMIT 1";
        $result = mysqli_query($connect, $sql);
        $exists = mysqli_num_rows($result) > 0;
        mysqli_free_result($result);
        return $exists;
    }


    function getCountUser($connect)
    {
        $sql = "SELECT COUNT(*) count_user FROM users";
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getOrderPending($connect)
    {
        $sql = "SELECT COUNT(*) count_order FROM orders WHERE status = 0";
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getOrderUnpaid($connect)
    {
        $sql = "SELECT COUNT(*) count_order FROM orders WHERE status = 1";
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getOrderPaid($connect)
    {
        $sql = "SELECT COUNT(*) count_order FROM orders WHERE status = 2";
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getOrderConfirm($connect)
    {
        $sql = "SELECT COUNT(*) count_order FROM orders WHERE status = 3";
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getOrderShip($connect)
    {
        $sql = "SELECT COUNT(*) count_order FROM orders WHERE status = 4";
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getOrderDone($connect)
    {
        $sql = "SELECT COUNT(*) count_order FROM orders WHERE status = 5";
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getOrderCancel($connect)
    {
        $sql = "SELECT COUNT(*) count_order FROM orders WHERE status = 6";
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getTotalOrder($connect)
    {
        $sql = "SELECT COUNT(*) count_order FROM orders";
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getRevenueToday($connect)
    {
        $sql = "SELECT SUM(total) total FROM orders WHERE status >= 2 AND status <= 5
        AND DATE_FORMAT(created_at, '%Y-%m-%d') = CURDATE()
        GROUP BY DATE_FORMAT(created_at,'%d/%m/%Y')";
        
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getRevenueCurrentWeek($connect)
    {
        $sql = "SELECT SUM(total) total FROM orders WHERE status >= 2 AND status <= 5
        AND YEARWEEK(created_at, 1) = YEARWEEK(CURDATE(), 1)
        GROUP BY MONTH(created_at), YEAR(created_at)";
        
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getRevenueCurrentMonth($connect)
    {
        $sql = "SELECT SUM(total) total FROM orders WHERE status >= 2 AND status <= 5
        AND MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())
        GROUP BY MONTH(created_at), YEAR(created_at)";
        
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getRevenueCurrentYear($connect)
    {
        $sql = "SELECT SUM(total) total FROM orders WHERE status >= 2 AND status <= 5
        AND YEAR(created_at) = YEAR(CURRENT_DATE())
        GROUP BY YEAR(created_at)";
        
        return mysqli_fetch_assoc(mysqli_query($connect, $sql));
    }

    function getRevenueEachDay($connect)
    {
        $data = [];
        $sql = "SELECT * FROM orders a, order_details b WHERE a.id = b.order_id AND a.status >= 2 AND a.status <= 5";
        $result = mysqli_query($connect, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            $product = getProductById($connect, $row['product_id']);
            if (date('Y-m-d', strtotime($row['created_at'])) == date('Y-m-d')) {
                if (!isset($data[$product['id']])) {
                    $data[$product['id']] = [
                        'name' => $product['name'],
                        'total' => $row['price'] * $row['qty'],
                        'count' => $row['qty'],
                    ];
                } else {
                    $data[$product['id']]['total'] += $row['price'] * $row['qty'];
                    $data[$product['id']]['count'] += $row['qty'];
                }
            }
        }

        return json_encode($data);
    }

    function getRevenueByDate($connect, $date)
    {
        $data = [];
        $sql = "SELECT * FROM orders a, order_details b WHERE a.id = b.order_id AND a.status >= 2 AND a.status <= 5";
        $result = mysqli_query($connect, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            $product = getProductById($connect, $row['product_id']);
            if (date('Y-m-d', strtotime($row['created_at'])) == $date) {
                if (!isset($data[$product['id']])) {
                    $data[$product['id']] = [
                        'name' => $product['name'],
                        'total' => $row['price'] * $row['qty'],
                        'count' => $row['qty'],
                    ];
                } else {
                    $data[$product['id']]['total'] += $row['price'] * $row['qty'];
                    $data[$product['id']]['count'] += $row['qty'];
                }
            }
        }

        return json_encode($data);
    }

    function getRevenueEachMonth($connect)
    {
        $data = [];
        $sql = "SELECT * FROM orders a, order_details b WHERE a.id = b.order_id AND a.status >= 2 AND a.status <= 5";
        $result = mysqli_query($connect, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            $product = getProductById($connect, $row['product_id']);
            if (date('m', strtotime($row['created_at'])) == date('m') && date('Y', strtotime($row['created_at'])) == date('Y')) {
                if (!isset($data[$product['id']])) {
                    $data[$product['id']] = [
                        'name' => $product['name'],
                        'total' => $row['price'] * $row['qty'],
                        'count' => $row['qty'],
                    ];
                } else {
                    $data[$product['id']]['total'] += $row['price'] * $row['qty'];
                    $data[$product['id']]['count'] += $row['qty'];
                }
            }
        }

        return json_encode($data);
    }

    function getRevenueByMonthYear($connect, $month, $year)
    {
        $data = [];
        $sql = "SELECT * FROM orders a, order_details b WHERE a.id = b.order_id AND a.status >= 2 AND a.status <= 5";
        $result = mysqli_query($connect, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            $product = getProductById($connect, $row['product_id']);
            if (date('m', strtotime($row['created_at'])) == $month && date('Y', strtotime($row['created_at'])) == $year) {
                if (!isset($data[$product['id']])) {
                    $data[$product['id']] = [
                        'name' => $product['name'],
                        'total' => $row['price'] * $row['qty'],
                        'count' => $row['qty'],
                    ];
                } else {
                    $data[$product['id']]['total'] += $row['price'] * $row['qty'];
                    $data[$product['id']]['count'] += $row['qty'];
                }
            }
        }

        return json_encode($data);
    }

    function getOrderById($connect, $orderId)
    {
        $sql = "SELECT * FROM orders WHERE id = '{$orderId}'";
        $result = mysqli_query($connect, $sql);

        return mysqli_fetch_assoc($result);
    }

    function checkExistEmail($connect, $email)
    {
        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $result = mysqli_query($connect, $sql);

        return mysqli_fetch_assoc($result);
    }

    function checkProductInStock($connect, $productIds)
    {
        $products = [];
        foreach ($productIds as $productId) {
            $product = getProductById($connect, $productId);
            if ((int) $product['qty'] < 1) {
                $products[] = $product;
            }
        }

        return $products;
    }

    function orderType($num)
    {
        $orderType = array(
            '0' => 'Thanh toán khi nhận hàng',
            '1' => 'Chuyển khoản qua ngân hàng',
            '2' => 'Thanh toán qua VNPAY'
        );

        return $orderType[$num];
    }

    function statusType($num)
    {
        $orderType = array(
            '0' => 'Chờ xác nhận',
            '1' => 'Chưa thanh toán',
            '2' => 'Đã thanh toán',
            '3' => 'Đã xác nhận',
            '4' => 'Đang giao hàng',
            '5' => 'Hoàn thành',
            '6' => 'Đã hủy',
        );

        return $orderType[$num];
    }

    function getOrdersDonut($connect)
    {
        $data = [];
        $sql = "SELECT status, COUNT(*) AS count FROM orders GROUP BY status";
        $result = mysqli_query($connect, $sql);
        $data = array_fill(0, 7, 0);

        while ($row = mysqli_fetch_assoc($result)) {
            $data[$row['status']] = $row['count'];
        }

        return json_encode($data);
    }