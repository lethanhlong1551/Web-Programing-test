<?php
session_start();
$password = isset($_POST['password']) ? trim(strtolower($_POST['password'])) : '';
if ($password === 'admin' || $password === 'adm') {
    $_SESSION['role'] = 'admin';
    $_SESSION['user_id'] = 'admin';
    header("Location:../question.php");
    exit;
} else {
    header("Location:login.html?error=1");
    exit;
}
?>