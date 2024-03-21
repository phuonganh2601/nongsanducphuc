<?php
    include '../../inc/connect.php';
    $id = $_POST['id'];
    $status = $_POST['status'];
    $sql = "UPDATE orders SET status = {$status} WHERE id = '{$id}'";
    $status = mysqli_query($connect, $sql);
    if ($status) {
        echo '<script>
            alert("Cập nhật thành công");
            window.location.href = "index.php";
        </script>';
    }
