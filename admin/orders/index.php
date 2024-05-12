<?php 
    include '../layouts/header.php';
    $sql = "SELECT * FROM orders ORDER BY created_at DESC";
    $result = mysqli_query($connect, $sql);
?>
<h1 class="h3 mb-2 text-gray-800">Đơn hàng</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="orderTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php while($order = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>#<?= $order['id'] ?></td>
                            <td><?= $order['name'] ?></td>
                            <td><?= $order['tel'] ?></td>
                            <td><?= number_format($order['total'], -3, ',', '.') ?> VND</td>
                            <td><?= date('d/m/Y H:i:s', strtotime($order['created_at'])) ?></td>
                            <td><?= statusType($order['status']) ?></td>
                            <td>
                                <a href="show.php?id=<?= $order['id'] ?>" class="btn btn-primary btn-sm">
                                    Chi tiết
                                </a>
                                <a href="/print-invoice.php?id=<?= $order['id'] ?>" target="_blank" class="btn btn-primary btn-sm">
                                    <i class="fa fa-print"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<?php include '../layouts/footer.php' ?>
