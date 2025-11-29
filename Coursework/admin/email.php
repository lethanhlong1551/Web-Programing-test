<?php
require '../include/DatabaseConnection.php';
require '../include/DatabaseFunctions.php';

if (isset($_POST['delete_user_id'])) {
    $id = $_POST['delete_user_id'];
    $stmt = $pdo->prepare('DELETE FROM user WHERE id = :id');
    $stmt->execute([':id' => $id]);
    header('Location: email.php');
    exit;
}

$users = $pdo->query('SELECT id, email FROM user')->fetchAll();

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
if ($search !== '') {
    $users = array_filter($users, function($user) use ($search) {
        return stripos($user['email'], $search) !== false;
    });
}

$title = 'Email Management';
ob_start();
include '../templates_admin/admin_email.html.php';
$output = ob_get_clean();
include '../templates_admin/admin_layout.html.php';
?>