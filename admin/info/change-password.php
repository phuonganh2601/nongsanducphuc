<?php
    include '../layouts/header.php';
    if (isset($_POST['submit'])) {
        $curpass = $_POST['curpass'];
        $newpass = $_POST['newpass'];
        $repass = $_POST['repass'];
        $sql = "SELECT * FROM admins";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($curpass, $row['password'])) {
                if ($newpass == $repass) {
                    $adminId = $_SESSION['admin']['id'];
                    $password = password_hash($newpass, PASSWORD_BCRYPT);
                    $sql = "UPDATE admins SET password = '{$password}' WHERE id = {$adminId}";
                    $status = mysqli_query($connect, $sql);
                    if ($status) {
                        unset($_SESSION['admin']);
                        echo '<script>
                            alert("Đổi mật khẩu thành công. Hãy đăng nhập lại!");
                            window.location.href = "../login.php";
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

<h1 class="h3 mb-2 text-gray-800">Đổi mật khẩu</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-lg-12">
        <form action="" method="POST">

            <div class="form-group">
                <label for="curpass">Mật khẩu hiện tại: <span class="text-danger">*</span></label>
                <input type="password" class="form-control" placeholder="Nhập mật khẩu hiện tại" id="curpass" name="curpass" required>
            </div>
            <div class="form-group">
                <label for="newpass">Mật khẩu mới: <span class="text-danger">*</span></label>
                <input type="password" class="form-control" placeholder="Nhập mật khẩu mới" id="newpass" name="newpass" required>
            </div>
            <div class="form-group">
                <label for="repass">Xác nhận mật khẩu: <span class="text-danger">*</span></label>
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" id="repass" name="repass" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mb-3">Đổi mật khẩu</button>
          </form>
    </div>
</div>

<?php include '../layouts/footer.php' ?>