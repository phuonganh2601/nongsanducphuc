<?php 
    include '../layouts/header.php';
    $sql = "SELECT c.*, p.name productName, u.name userName FROM comments c
    JOIN products p ON c.product_id = p.id
    JOIN users u ON c.user_id = u.id";
    $result = mysqli_query($connect, $sql);
?>

<h1 class="h3 mb-2 text-gray-800">Bình luận</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sản phẩm</th>
                        <th>Người bình luận</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $row['productName'] ?></td>
                            <td><?= $row['userName'] ?></td>
                            <td><?= $row['content'] ?></td>
                            <td><?= date('d/m/Y H:i:s', strtotime($row['created_at'])) ?></td>
                            <td>
                                <a href="delete-comment.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn xóa bình luận này ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="show.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-circle btn-sm">
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
