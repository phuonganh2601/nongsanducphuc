<?php
    include '../layouts/header.php';
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $unit = $_POST['unit'];
        $categoryId = $_POST['category_id'];
        $description = htmlentities($_POST['description']);
        $fileImg = $_FILES['image'];
        $img_name = date('Y_m_d_H_i_s') . '_' . $fileImg['name'];
        $tmp_name = $fileImg['tmp_name'];
        if (move_uploaded_file($tmp_name,  str_replace('\\', '/', $baseFolder) . '/assets/admin/img/products/' . $img_name)) {
            $sql = "INSERT INTO products(name, qty, price, category_id, description, image, unit) 
            VALUES ('{$name}', {$qty}, {$price}, {$categoryId}, '{$description}', '{$img_name}', '{$unit}')";
            $status = mysqli_query($connect, $sql);
            if ($status) {
                echo '<script>
                    alert("Thêm thành công");
                    window.location.href = "list.php";
                </script>';
            }
        }
    }
?>

<h1 class="h3 mb-2 text-gray-800">Thêm sản phẩm</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-lg-12">
        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="name">Tên sản phẩm: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Giá tiền: <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="Nhập giá tiền" id="price" name="price" min=1 required>
            </div>
            <div class="form-group">
                <label for="unit">Đơn vị: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập đơn vị" id="unit" name="unit" required>
            </div>
            <div class="form-group">
                <label for="qty">Số lượng: <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="qty" name="qty" value="0">
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục sản phẩm: <span class="text-danger">*</span></label>
                <select class="form-control" name="category_id" id="category_id">
                    <?php foreach (getCategories($connect) as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Chọn hình ảnh: <span class="text-danger">*</span></label>
                <div class="custom-file">
                    <input type="file" id="image" name="image" accept=".png,.gif,.jpg,.jpeg"  required/>
                </div>
            </div>
            <div class="image-preview mb-4" id="imagePreview">
                <img src="" alt="Image Preview" class="image-preview__image" />
                <span class="image-preview__default-text">Hình ảnh</span>
            </div>
            <br />
            <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
          </form>
    </div>
</div>

<?php include '../layouts/footer.php' ?>