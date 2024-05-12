<?php
include '../layouts/header.php';
$order        = getOrderById($connect, $_GET['id']);
$orderDetails = getOrderDetail($connect, $_GET['id']);
?>
<h1 class="h3 mb-2 text-gray-800">Đơn hàng #<?= $_GET['id'] ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <?php if (!in_array($order['status'], [5, 6])): ?>
            <form method="POST" action="update-status.php" class="row">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <?php if ($order['status'] == 3): ?>
                    <span class="col-lg-3 mb-1 me-1">
                        <input type="text" class="form-control" name="shipping_code" placeholder="Mã vận đơn">
                    </span>
                <?php endif; ?>
                <span class="col-lg-3 mb-1 me-1">
                    <select name="status" class="form-control">
                        <?php if ($order['status'] == 0 || $order['status'] == 2): ?>
                            <option value="3">Xác nhận</option>
                            <option value="6">Hủy đơn hàng</option>
                        <?php elseif ($order['status'] == 1): ?>
                            <option value="2">Đã thanh toán</option>
                            <option value="6">Hủy đơn hàng</option>
                        <?php elseif ($order['status'] == 3): ?>
                            <option value="4">Đang giao hàng</option>
                        <?php elseif ($order['status'] == 4): ?>
                            <option value="5">Hoàn thành</option>
                        <?php endif; ?>
                    </select>
                </span>
                <span class="col-lg-2 col-6 mb-1 me-1">
                    <button class="btn btn-primary" type="submit" name="submit">Cập nhật</button>
                </span>
                <span class="col-lg col-6 mb-1 me-1 text-right">
                    <a href="/print-invoice.php?id=<?= $order['id'] ?>" target="_blank" class="btn btn-primary">
                        <i class="fa fa-print"></i> <span class="d-none d-sm-inline">In hóa đơn</span>
                    </a>
                </span>
            </form>
        <?php else: ?>
            <div class="row">
                <span class="col-lg col-6 mb-1 me-1 text-right">
                    <a href="/print-invoice.php?id=<?= $order['id'] ?>" target="_blank" class="btn btn-primary">
                        <i class="fa fa-print"></i> <span class="d-none d-sm-inline">In hóa đơn</span>
                    </a>
                </span>
            </div>
        <?php endif; ?>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="card" style="height: 100%;">
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
            <div class="col-md-6">
                <div class="card" style="height: 100%;">
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
        <div class="table-responsive mt-2">
            <table class="table table-bordered" id="orderDetailTable" width="100%" cellspacing="0">
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
<?php include '../layouts/footer.php' ?>
