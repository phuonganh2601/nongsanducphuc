<?php 
    include 'layouts/header.php';
    include 'inc/search.php';
    if (isset($_SESSION['user']) && $file == 'register') {
        echo '<script>
            window.location.href = "index.php";
        </script>';
    }
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        if (checkExistEmail($connect, $email)) {
            echo '<script>
                alert("Email đã tồn tại");
                window.history.back();
            </script>';
        } else {
            $name = $_POST['name'];
            $sex = $_POST['sex'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            if ($password == $repassword) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $sql = "INSERT INTO users(name, email, password, gender, phone, address) 
                VALUES ('{$name}', '{$email}', '{$password}', {$sex}, '{$phone}', '{$address}')";
                $status = mysqli_query($connect, $sql);
                if ($status) {
                    echo '<script>
                        alert("Đăng ký thành công");
                        window.location.href = "login.php";
                    </script>';
                }
            } else {
                echo '<script>
                    alert("Mật khẩu không trùng khớp");
                    window.location.href = "register.php";
                </script>';
            }
        }
    }
?>
<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>TRANG ĐĂNG KÝ</h2>
                </div>
            </div>
        </div>
        <form action="" method="POST">

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Họ tên" style="margin-bottom: 10px;" name="name" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Email" style="margin-bottom: 10px;" name="email" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="password" placeholder="Mật khẩu" style="margin-bottom: 10px;" name="password" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="password" placeholder="Xác nhận mật khẩu" style="margin-bottom: 10px;" name="repassword" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6" style="margin-bottom: 10px;">
                    <select name="sex" class="form-control" style="height: 50px;" required>
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="date" style="margin-bottom: 10px;" name="birthday" max="<?= date('Y-m-d') ?>" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="tel" placeholder="Số điện thoại" style="margin-bottom: 10px;" name="phone" pattern="[0-9]{10}" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Địa chỉ" style="margin-bottom: 10px;" name="address" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" name="submit" class="site-btn">Đăng ký</button>
                </div>
                
            </div>
        </form>        
    </div>
</div>
<!-- Contact Form End -->
<?php include 'layouts/footer.php'; ?>