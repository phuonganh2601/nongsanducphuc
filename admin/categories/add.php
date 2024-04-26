<?php
    include '../layouts/header.php';
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $fileImg = $_FILES['image'];
        $img_name = date('Y_m_d_H_i_s') . '_' . $fileImg['name'];
        $tmp_name = $fileImg['tmp_name'];
        if (move_uploaded_file($tmp_name,  str_replace('\\', '/', $baseFolder) . '/assets/admin/img/categories/' . $img_name)) {
            $sql = "INSERT INTO categories(name, image) VALUES ('{$name}', '{$img_name}')";
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

<h1 class="h3 mb-2 text-gray-800">Thêm danh mục</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-lg-12">
        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="name">Tên danh mục: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nhập tên danh mục" id="name" name="name" required>
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
            <button type="submit" name="submit" class="btn btn-primary mb-3">Thêm</button>
          </form>
    </div>
</div>

<?php include '../layouts/footer.php' ?>