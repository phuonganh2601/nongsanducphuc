<?php
    include 'layouts/header.php'; 
    include 'inc/search.php';
    $orderId = isset($_SESSION['order_id']) ? $_SESSION['order_id'] : '';
?>
    <div class="container text-center">
        <h3 class="mb-3">Vui lòng tiến hành thanh toán và bấm Xác nhận!</h3>
        <div class="row mx-auto mb-3">
            <div class="col-md-6 row d-flex justify-content-center mx-auto mb-3 me-3">
                <img src="assets/client/img/qr-code.png" class="col-lg-8 col-md-12">
            </div>
            <div class="col-md-6 row d-flex flex-grow-1 justify-content-center align-items-center">
                <div class="col-lg-12 mb-1 justify-content-center">
                    <label for="memo">Nội dung chuyển khoản</label>
                    <input type="text" id="memo" class="form-control text-center" style="color: red; font-weight: bold;" value="THANHTOAN <?= $orderId ?>" readonly/>
                    <a class="site-btn mt-3" href="thank.php" role="button">Xác nhận</a>
                </div>
            </div>
        </div>
    </div>
<?php include 'layouts/footer.php'; ?>
