<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'webbannongsan';

    // Handle connect php with mysql
    $connect = mysqli_connect($servername, $username, $password);
    mysqli_select_db($connect, $database);

    // Check connect successful or fail
    if (!$connect) {
        die('Connection failed: ' . mysqli_connect_error());
    }
