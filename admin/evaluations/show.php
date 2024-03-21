<?php 
    include '../layouts/header.php';
    $productId = $_GET['product_id'];
    $sql = "SELECT r.*, u.name userName FROM ratings r
    JOIN users u ON r.user_id = u.id WHERE r.product_id = {$productId}";
    $result = mysqli_query($connect, $sql);
?>

<h1 class="h3 mb-2 text-gray-800">Chi tiết đánh giá</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Người dùng</th>
                        <th>Số sao</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $row['userName'] ?></td>
                            <td><?= $row['star'] ?></td>
                        </tr>
                    <?php $count++; endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php' ?>
