<?php 
    include 'layouts/header.php';
    include 'inc/search.php';
    if (isset($_POST['submit'])) {
        $curpass = $_POST['curpass'];
        $newpass = $_POST['newpass'];
        $repass = $_POST['repass'];
        $sql = "SELECT * FROM users";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($curpass, $row['password'])) {
                if ($newpass == $repass) {
                    $userId = $_SESSION['user']['id'];
                    $password = password_hash($newpass, PASSWORD_BCRYPT);
                    $sql = "UPDATE users SET password = '{$password}' WHERE id = {$userId}";
                    $status = mysqli_query($connect, $sql);
                    if ($status) {
                        unset($_SESSION['user']);
                        echo '<script>
                            alert("Đổi mật khẩu thành công. Hãy đăng nhập lại!");
                            window.location.href = "login.php";
                        </script>';
                    }
                } else {
                    echo '<script>
                        alert("Nhập lại mật khẩu không đúng, vui lòng thử lại");
                        window.location.href = "change-password.php";
                    </script>';
                }
            }
        }

        echo '<script>
            alert("Mật khẩu hiện tại không đúng, vui lòng thử lại");
            window.location.href = "change-password.php";
        </script>';
    }
?>
<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>ĐỔI MẬT KHẨU</h2>
                </div>
            </div>
        </div>
        <form action="" method="POST">

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="password" placeholder="Mật khẩu hiện tại" style="margin-bottom: 10px;" name="curpass" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="password" placeholder="Mật khẩu mới" style="margin-bottom: 10px;" name="newpass" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="password" placeholder="Nhập lại mật khẩu" style="margin-bottom: 10px;" name="repass" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" name="submit" class="site-btn">Đổi mật khẩu</button>
                </div>
            </div>
        </form>

    </div>
</div>
<!-- Contact Form End -->
<?php include 'layouts/footer.php'; ?>