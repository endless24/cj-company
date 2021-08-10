<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'cjcompany';

    $conn = new MySQLi($hostname,$username,$password,$database);
    if ($conn->connect_error) {
        echo $conn->connect_error;
    }
?>

