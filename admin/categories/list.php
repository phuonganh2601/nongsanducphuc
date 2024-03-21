<?php 
    include '../layouts/header.php';
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($connect, $sql);
?>

<h1 class="h3 mb-2 text-gray-800">Danh mục</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ảnh</th>
                        <th>Tên danh mục</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><img src="../../assets/admin/img/categories/<?= $row['image'] ?>" width=60px ></td>
                            <td><?= $row['name'] ?></td>
                            <td>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn xóa danh mục này ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
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