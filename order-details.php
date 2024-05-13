<?php
include 'layouts/header.php';
include 'inc/search.php';
$order        = getOrderById($connect, $_GET['id']);
$orderDetails = getOrderDetail($connect, $_GET['id']);
?>
<h3 class="text-center mt-3" style="font-weight: bold;">CHI TIẾT ĐƠN HÀNG</h3>
<section class="mt-4 mb-4">
    <div class="container">
        <div class="row mb-2">
            <div class="col-lg-5 mb-2 mb-lg-0 text-lg-left text-center">
                <a href="orders.php" class="left-button primary-btn">
                    <i class="fa fa-arrow-left"></i> Danh sách đơn hàng
                </a>
            </div>
            <div class="col-lg-7 text-lg-right text-center">
                <?php if ($order['status'] == 1): ?>
                <a href="vnpay/payment.php?order=<?= $order['id'] ?>" target="_blank" class="right-button primary-btn">
                    <i class="fa fa-credit-card"></i> Thanh toán
                </a>
                <?php endif; ?>
                <a href="print-invoice.php?id=<?= $order['id'] ?>" target="_blank" class="right-button primary-btn">
                    <i class="fa fa-print"></i> In hóa đơn
                </a>
            </div>
        </div>
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
                            <li class="list-group-item"><strong>Phương thức thanh toán: </strong><span class="float-right"><?= orderType($order['type']) ?></span></li>
                            <li class="list-group-item"><strong>Trạng thái: </strong><span class="float-right"><?= statusType($order['status']) ?></span>
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
            <div class="col-lg-12 col-md-12 table-responsive">
                <table class="table table-bordered" id="orderDetailTable">
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
                                <td><a href="product-details.php?id=<?= $orderDetail['product_id'] ?>" style="color: #1c1c1c;"><?= $orderDetail['product']['name'] ?></a></td>
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
<?php include 'layouts/footer.php'; ?>
