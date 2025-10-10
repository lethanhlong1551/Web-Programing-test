<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test2;charset=utf8mb4', 'root', '');
    $output = "Database Connection Established";
} catch (PDOException $e) {
    $output = "Unable to connect to the database server." . $e;
}
include 'templates/output.html.php';
?>