<?php
    include '../../inc/connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM ratings WHERE id = " . $id;
    $status = mysqli_query($connect, $sql);
    if ($status) {
        echo '<script>
            alert("Xóa thành công");
            window.history.back();
        </script>';
    }