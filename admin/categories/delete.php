<?php
    include '../../inc/connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM categories WHERE id = " . $id;
    $status = mysqli_query($connect, $sql);
    if ($status) {
        echo '<script>
            alert("Xóa thành công");
            window.location.href = "list.php";
        </script>';
    }
