<?php
    $dsn = 'mysql:host=localhost;dbname=recipes'; 
    $username = 'itp258'; 
    $password = 'itp258';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>