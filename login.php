<?php 
    include 'layouts/header.php';
    include 'inc/search.php';
    if (isset($_SESSION['user']) && $file == 'login') {
        echo '<script>
            window.location.href = "index.php";
        </script>';
    }
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['email'] === $email && password_verify($password, $row['password'])) {
                if ($row['status'] == 1) {
                    $_SESSION['user'] = $row;
                    echo '<script>
                        alert("Đăng nhập thành công");
                        window.location.href = "index.php";
                    </script>';
                } else {
                    echo '<script>
                        alert("Tài khoản của bạn đã bị khóa, xin vui lòng liên hệ quản trị viên");
                        window.location.href = "login.php";
                    </script>';
                }
            }
        }

        echo '<script>
            alert("Email / Mật khẩu không đúng, vui lòng đăng nhập lại");
            window.location.href = "login.php";
        </script>';
    }
?>
<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>TRANG ĐĂNG NHẬP</h2>
                </div>
            </div>
        </div>
        <form action="" method="POST">

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="email" placeholder="Email" style="margin-bottom: 10px;" name="email" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="password" placeholder="Mật khẩu" name="password" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" name="submit" class="site-btn">Đăng nhập</button>
                </div>
            </div>
        </form>
        
    </div>
</div>
<!-- Contact Form End -->
<?php include 'layouts/footer.php'; ?>