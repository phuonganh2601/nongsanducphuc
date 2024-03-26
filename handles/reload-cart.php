<?php
    session_start();
    echo json_encode($_SESSION['shopping_cart']);
