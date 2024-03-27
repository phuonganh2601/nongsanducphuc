<?php 
    include '../layouts/header.php';
    $order = getOrderById($connect, $_GET['id']);
    $orderDetails = getOrderDetail($connect, $_GET['id']);
?>
<h1 class="h3 mb-2 text-gray-800">Đơn hàng #<?= $_GET['id'] ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <?php if (!in_array($order['status'], [3, 4])): ?>
            <form method="POST" action="update-status.php">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <select name="status" class="status" style="padding:0.4rem 0;outline:none;">
                    <?php if ($order['status'] == 0): ?>
                        <option value="1">Xác nhận</option>
                        <option value="4">Hủy đơn hàng</option>
                    <?php elseif ($order['status'] == 1): ?>
                        <option value="2">Đang giao hàng</option>
                    <?php elseif ($order['status'] == 2): ?>
                        <option value="3">Hoàn thành</option>
                    <?php endif; ?>
                </select>
                <button class="btn btn-primary" type="submit" name="submit">Cập nhật</button>
            </form>
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
                            <li class="list-group-item"><strong>Tổng tiền: </strong><span class="float-right"><?= number_format($order['total'], -3, ',', ',') ?> VND</span></li>
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-2">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    <?php $count = 1; foreach ($orderDetails as $orderDetail): ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $orderDetail['product']['name'] ?></td>
                            <td><?= $orderDetail['qty'] ?></td>
                            <td><?= number_format($orderDetail['price'],-3,',',',') ?> VND</td>
                            <td><?= number_format($orderDetail['price'] * $orderDetail['qty'],-3,',',',') ?> VND</td>
                        </tr>
                    <?php $count++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php' ?>
