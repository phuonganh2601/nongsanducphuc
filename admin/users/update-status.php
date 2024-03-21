<?php
    include '../../inc/connect.php';
    $id = $_GET['id'];
    $status = $_GET['status'];
    $sql = "UPDATE users SET status = {$status} WHERE id = {$id}";
    $status = mysqli_query($connect, $sql);
    if ($status) {
        echo '<script>
            alert("Cập nhật thành công");
            window.location.href = "index.php";
        </script>';
    }
