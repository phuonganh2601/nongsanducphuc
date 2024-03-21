<?php 
    include '../layouts/header.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM replies r WHERE comment_id = {$id}";
    $result = mysqli_query($connect, $sql);
?>

<h1 class="h3 mb-2 text-gray-800">Phản hồi</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Người phản hồi</th>
                        <th>Nội dung</th>
                        <th>Ngày phản hồi</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['content'] ?></td>
                            <td><?= date('d/m/Y H:i:s', strtotime($row['created_at'])) ?></td>
                            <td>
                                <a href="delete-reply.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn xóa phản hồi này ?')">
                                    <i class="fas fa-trash"></i>
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
