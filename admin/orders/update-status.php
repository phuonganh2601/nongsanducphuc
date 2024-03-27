<?php
    include '../../inc/connect.php';
    $id = $_POST['id'];
    $shipping_code = isset($_POST['shipping_code']) ? $_POST['shipping_code'] : '';
    $status = $_POST['status'];
    $sql = "UPDATE orders SET shipping_code = '{$shipping_code}', status = {$status} WHERE id = '{$id}'";
    $status = mysqli_query($connect, $sql);
    if ($status) {
        echo '<script>
            alert("Cập nhật thành công");
            window.location.href = "show.php?id=' . $_POST['id'] . '"
        </script>';
    }
