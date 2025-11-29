<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Kiểm tra username và password
if ($password === $username) {
    // Xác định role dựa vào username
    if (stripos($username, 'admin') === 0) {
        $_SESSION['role'] = 'admin';
        $_SESSION['user_id'] = $username;
        header('Location: ../question.php'); // Chuyển đến trang admin
        exit;
    } elseif (
        stripos($username, 'student') === 0 ||
        stripos($username, 'std') === 0
    ) {
        $_SESSION['role'] = 'user';
        $_SESSION['user_id'] = $username;
        header('Location: ../../index.php'); // Chuyển đến student forum
        exit;
    } else {
        // Nếu không đúng định dạng username
        header('Location: noauthorised.php');
        exit;
    }
} else {
    $_SESSION['login_error'] = 'Wrong username and password!';
    header('Location: ../../templates/login.html.php');
    exit;
}
?>