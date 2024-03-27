<?php 
    include 'layouts/header.php';
    include 'inc/search.php';
    $orderDetails = getOrderDetail($connect, $_GET['id']);
?>
<h3 class="text-center mt-3" style="font-weight: bold;">CHI TIẾT ĐƠN HÀNG</h3>
<section class="mt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
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
</section>
<?php include 'layouts/footer.php'; ?>
