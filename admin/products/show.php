<?php 
    include '../layouts/header.php';
    $id = $_GET['id'];
    $sql = "SELECT a.*, b.name category_name FROM products a, categories b 
        WHERE a.category_id = b.id AND a.id = {$id}";
    $product = mysqli_fetch_assoc(mysqli_query($connect, $sql));
?>
<h1 class="h3 mb-2 text-gray-800"><?= $product['name'] ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                    <th width="200">Danh mục sản phẩm</th>
                    <td><?= $product['category_name'] ?></td>
                </tr>
                <tr>
                    <th>Ảnh</th>
                    <td><img src="../../assets/admin/img/products/<?= $product['image'] ?>" width="100"></td>
                </tr>
                <tr>
                    <th>Tên sản phẩm</th>
                    <td><?= $product['name'] ?></td>
                </tr>
                <tr>
                    <th>Giá tiền</th>
                    <td><?= number_format($product['price'],-3,',','.') ?> VND / <?= $product['unit'] ?></td>
                </tr>
                <tr>
                    <th>Số lượng</th>
                    <td><?= $product['qty']; ?></td>
                </tr>
                <tr>
                    <th>Mô tả sản phẩm</th>
                    <td><?= html_entity_decode($product['description']) ?></td>
                </tr>
                <tr>
                    <th>Trạng thái</th>
                    <td><?= $product['qty'] > 0 ? 'Còn hàng' : 'Hết hàng' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php' ?>