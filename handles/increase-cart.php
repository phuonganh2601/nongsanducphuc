<?php
    session_start();
    $id = $_GET['id'];
    foreach($_SESSION['shopping_cart'] as $key => $values){
        if($id == $key){
            $_SESSION['shopping_cart'][$key]['item_qty'] += 1;
        }
    }
    
    echo '<script>
        window.location.href = "../shopping-cart.php";
    </script>';