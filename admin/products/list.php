<?php 
    include '../layouts/header.php';
    $sql = "SELECT a.*, b.name category_name FROM products a, categories b 
        WHERE a.category_id = b.id";
    $result = mysqli_query($connect, $sql);
?>

<h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="productTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Danh mục</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $row['category_name'] ?></td>
                            <td><img src="../../assets/admin/img/products/<?= $row['image'] ?>" width=60px ></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= number_format($row['price'],-3,',','.') ?> VND / <?= $row['unit'] ?></td>
                            <td><?= $row['qty'] ?></td>
                            <td><?= $row['qty'] > 0 ? 'Còn hàng' : 'Hết hàng' ?></td>
                            <td>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn muốn xóa sản phẩm này ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
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