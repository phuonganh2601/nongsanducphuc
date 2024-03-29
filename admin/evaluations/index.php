<?php 
    include '../layouts/header.php';
    $sql = "SELECT r.*, p.name productName, avg(r.star) avgStar, count(*) countRating FROM ratings r
    JOIN products p ON r.product_id = p.id GROUP BY r.product_id";
    $result = mysqli_query($connect, $sql);
?>

<h1 class="h3 mb-2 text-gray-800">Đánh giá</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="evaluationsTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sản phẩm</th>
                        <th>Số sao trung bình</th>
                        <th>Số lượt đánh giá</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $row['productName'] ?></td>
                            <td><?= round($row['avgStar']) ?></td>
                            <td><?= $row['countRating'] ?></td>
                            <td>
                                <a href="show.php?product_id=<?= $row['product_id'] ?>" class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php $count++; endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php' ?>
