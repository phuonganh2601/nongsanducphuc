<?php 
    include '../layouts/header.php';
    $order = getOrderById($connect, $_GET['id']);
    $orderDetails = getOrderDetail($connect, $_GET['id']);
?>
<h1 class="h3 mb-2 text-gray-800">Đơn hàng <?= $_GET['id'] ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <?php if ($order['status'] != 2 && $order['status'] != 3): ?>
            <form method="POST" action="update-status.php" style="margin-bottom: 3rem;">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <select name="status" class="status" style="padding:0.4rem 0;outline:none;">
                    <?php if ($order['status'] == 0): ?>
                        <option value="0" selected>Chờ xác nhận</option>
                        <option value="1">Xác nhận</option>
                        <option value="3">Hủy đơn hàng</option>
                    <?php elseif ($order['status'] == 1): ?>
                        <option value="1" selected>Xác nhận</option>
                        <option value="2">Hoàn thành</option>
                    <?php else: ?>
                        <option value="3" selected>Hủy đơn hàng</option>
                    <?php endif; ?>
                </select>
                <button class="btn btn-primary" type="submit" name="submit">Cập nhật</button>
            </form>
        <?php endif; ?>
        <div class="table-responsive">
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
