<?php
    session_start();
    $id = $_GET['id'];
    foreach($_SESSION['shopping_cart'] as $key => $values){
        if($id == $key){
            unset($_SESSION['shopping_cart'][$key]);
        }
    }

    echo '<script>
        window.location.href = "../shopping-cart.php";
    </script>';