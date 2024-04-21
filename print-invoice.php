<?php
include 'inc/connect.php';
include 'helpers/helper.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$order                    = getOrderById($connect, $_GET['id']);
$orderDetails             = getOrderDetail($connect, $_GET['id']);
$currentDate              = date("Y-m-d");
list($year, $month, $day) = explode("-", $currentDate);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Đức Phúc - In hóa đơn #<?= $order['id'] ?>">
    <meta name="keywords" content="Duc Phuc, nong san, nong san sach, nong san Duc Phuc">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đức Phúc - In hóa đơn #<?= $order['id'] ?></title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

    <!-- Font Awaesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/client/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/client/css/font-awesome.min.css" type="text/css">
    <style>
        html,
        body {
            font-family: "Plus Jakarta Sans", sans-serif;
            -webkit-font-smoothing: antialiased;
            font-smoothing: antialiased;
        }

        @media screen and (min-width: 768px) {
            div.info-card {
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <header class="container mt-5">
        <div class="row">
            <div class="col-6">
                <img src="assets/client/img/logo.png" alt="Logo" class="img-fluid logo mb-3" style="max-width: 256px;">
                <p class="mb-0" style="margin-left: 14px;">Địa chỉ: Đông Anh - Hà Nội</p>
                <p class="mb-0" style="margin-left: 14px;">Số điện thoại: 0363 960 410</p>
            </div>
            <div class="col-6 text-center">
                <h2 class="mb-0" style="font-weight: bold;">HÓA ĐƠN BÁN HÀNG</h2>
                <p class="mt-0">Số hóa đơn #<?= $order['id'] ?></p>
            </div>
        </div>
    </header>
    <h3 class="text-center mt-3" style="font-weight: bold;">CHI TIẾT ĐƠN HÀNG</h3>
    <section class="mt-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card info-card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Thông tin khách hàng</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Mã đơn hàng: </strong><span class="float-right">#<?= $order['id'] ?></span></li>
                                <li class="list-group-item"><strong>Họ và tên: </strong><span class="float-right"><?= $order['name'] ?></span></li>
                                <li class="list-group-item"><strong>Số điện thoại: </strong><span class="float-right"><?= $order['tel'] ?></span></li>
                                <li class="list-group-item"><strong>Địa chỉ nhận hàng: </strong><span class="float-right"><?= $order['address'] ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card info-card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Thông tin thanh toán</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Ngày thanh toán: </strong><span class="float-right"><?= date('d/m/Y H:i:s', strtotime($order['created_at'])) ?></span></li>
                                <li class="list-group-item"><strong>Tổng tiền: </strong><span class="float-right"><?= number_format($order['total'], -3, ',', '.') ?> VND</span></li>
                                <li class="list-group-item"><strong>Phương thức thanh toán: </strong><span class="float-right"><?= $order['type'] == 0 ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản qua ngân hàng' ?></span></li>
                                <li class="list-group-item"><strong>Trạng thái: </strong><span class="float-right">
                                        <?php
                                        switch ($order['status'])
                                        {
                                            case 0:
                                                echo 'Chờ xác nhận';
                                                break;
                                            case 1:
                                                echo 'Xác nhận';
                                                break;
                                            case 2:
                                                echo 'Đang giao hàng';
                                                break;
                                            case 3:
                                                echo 'Hoàn thành';
                                                break;
                                            default:
                                                echo 'Hủy';
                                                break;
                                        }
                                        ?>
                                    </span>
                                </li>
                                <?php if ($order['status'] >= 2): ?>
                                    <li class="list-group-item"><strong>Mã vận đơn: </strong><span class="float-right"><?= $order['shipping_code'] ?></span></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1;
                            foreach ($orderDetails as $orderDetail): ?>
                                <tr>
                                    <td><?= $count ?></td>
                                    <td><?= $orderDetail['product']['name'] ?></td>
                                    <td><?= $orderDetail['qty'] ?></td>
                                    <td><?= number_format($orderDetail['price'], -3, ',', '.') ?> VND</td>
                                    <td><?= number_format($orderDetail['price'] * $orderDetail['qty'], -3, ',', '.') ?> VND</td>
                                </tr>
                                <?php $count++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer spad mb-5">
        <div class="container">
            <div class="row">
                <div class="col-6 text-center">
                    <p style="font-weight: bold;">KHÁCH HÀNG</p>
                </div>
                <div class="col-6 text-center">
                    <p class="mb-2" style="font-weight: bold;">Ngày <?= $day ?> tháng <?= $month ?> năm <?= $year ?></p>
                    <p style="font-weight: bold;">NGƯỜI BÁN HÀNG</p>
                </div>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.print();
            window.addEventListener("afterprint", function () {
                window.close();
            });
        });
    </script>
</body>

</html>