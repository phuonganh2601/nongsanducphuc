<?php 
    include '../layouts/header.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($connect, $sql);
?>

<h1 class="h3 mb-2 text-gray-800">Danh mục</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Giới tính</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['gender'] == 0 ? 'Nam' : 'Nữ' ?></td>
                            <td><?= $row['status'] == 0 ? 'Khóa' : 'Hoạt động' ?></td>
                            <td>
                                <?php if ($row['status'] == 1): ?>
                                    <a href="update-status.php?id=<?= $row['id'] ?>&status=0" class="btn btn-danger btn-sm" onclick="return confirm('Bạn muốn khóa tài khoản này ?')">
                                        Khóa
                                    </a>
                                <?php else: ?>
                                    <a href="update-status.php?id=<?= $row['id'] ?>&status=1" class="btn btn-success btn-sm" onclick="return confirm('Bạn muốn mở khóa tài khoản này ?')">
                                        Mở khóa
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php $count++; endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php' ?>