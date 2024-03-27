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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt hàng</th>
                        <th>Địa chỉ nhận hàng</th>
                        <th>Trạng thái</th>
                        <th>Hình thức thanh toán</th>
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
                        <th>Địa chỉ nhận hàng</th>
                        <th>Trạng thái</th>
                        <th>Hình thức thanh toán</th>
                        <th>Chức năng</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['tel'] ?></td>
                            <td><?= number_format($row['total'], -3, ',', ',') ?> VND</td>
                            <td><?= date('d/m/Y H:i:s', strtotime($row['created_at'])) ?></td>
                            <td><?= $row['address'] ?></td>
                            <td>
                                <?php
                                    switch ($row['status']) {
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
                            <td><?= $row['type'] == 0 ? 'Thanh toán Cod' : 'Chuyển khoản' ?></td>
                            <td>
                                <a href="show.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">
                                    Chi tiết
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
