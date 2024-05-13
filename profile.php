<?php 
    include 'layouts/header.php';
    include 'inc/search.php';
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $userId = $_SESSION['user']['id'];
        $sql = "UPDATE users SET name = '{$name}', email = '{$email}', gender = '{$gender}', birthday = '{$birthday}', phone = '{$phone}', address = '{$address}' WHERE id = {$userId}";
        $status = mysqli_query($connect, $sql);
        if ($status) {
            $sql = "SELECT * FROM users WHERE id = {$userId} LIMIT 1";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['user'] = $row;
            }
            echo '<script>
                alert("Cập nhật thành công.");
                window.location.href = "profile.php";
            </script>';
        } else {
            echo '<script>
                alert("Cập nhật thất bại, vui lòng thử lại");
                window.location.href = "profile.php";
            </script>';
        }
    }
?>
<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>THÔNG TIN CÁ NHÂN</h2>
                </div>
            </div>
        </div>
        <form action="" method="POST">

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <p>Họ và tên <span class="text-danger">*</span></p>
                    <input type="text" placeholder="Họ và tên" style="margin-bottom: 10px;" name="name" value="<?= $_SESSION['user']['name'] ?>" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <p>Email <span class="text-danger">*</span></p>
                    <input type="text" placeholder="Email" style="margin-bottom: 10px;" name="email" value="<?= $_SESSION['user']['email'] ?>" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 10px;">
                    <p>Giới tính <span class="text-danger">*</span></p>
                    <select name="gender" class="form-control" style="height: 50px;border: 1px solid #ebebeb;" required>
                        <option value="0" <?= $_SESSION['user']['gender'] == 0 ? 'selected' : '' ?>>Nam</option>
                        <option value="1" <?= $_SESSION['user']['gender'] == 1 ? 'selected' : '' ?>>Nữ</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <p>Ngày sinh <span class="text-danger">*</span></p>
                    <input type="date" style="margin-bottom: 10px;" name="birthday" max="<?= date('Y-m-d') ?>" value="<?= $_SESSION['user']['birthday'] ?>" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <p>Số điện thoại <span class="text-danger">*</span></p>
                    <input type="tel" placeholder="Số điện thoại" style="margin-bottom: 10px;" name="phone" value="<?= $_SESSION['user']['phone'] ?>" pattern="[0-9]{10}" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <p>Địa chỉ <span class="text-danger">*</span></p>
                    <input type="text" placeholder="Địa chỉ" style="margin-bottom: 10px;" name="address" value="<?= $_SESSION['user']['address'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" name="submit" class="site-btn">Cập nhật thông tin</button>
                </div>
                
            </div>
        </form>        
    </div>
</div>
<!-- Contact Form End -->
<?php include 'layouts/footer.php'; ?>