<?php 
    include 'layouts/header.php'; 
    include 'inc/search.php';
    $orders = getMyOrder($connect, $_SESSION['user']['id']);
?>
<h3 class="text-center mt-3" style="font-weight: bold;">ĐƠN HÀNG CỦA TÔI</h3>
<section class="mt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 table-responsive">
                <table class="table table-bordered" id="orderTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Ngày thanh toán</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($orders) > 0): ?>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td>#<?= $order['id'] ?></td>
                                    <td><?= $order['name'] ?></td>
                                    <td><?= $order['tel'] ?></td>
                                    <td><?= number_format($order['total'],-3,',','.') ?> VND</td>
                                    <td><?= date('d/m/Y H:i:s', strtotime($order['created_at'])) ?></td>
                                    <td>
                                        <?php
                                            switch ($order['status']) {
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
                                    </td>
                                    <td>
                                    <a href="show-my-order.php?id=<?= $order['id'] ?>" class="site-btn" style="text-align:center; padding: 5px 10px;">
                                            Chi tiết
                                        </a>
                                        <a href="print-invoice.php?id=<?= $order['id'] ?>" target="_blank" class="site-btn" style="text-align:center; padding: 5px 10px;">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include 'layouts/footer.php'; ?>
