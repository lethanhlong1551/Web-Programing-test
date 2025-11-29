<?php
require '../include/DatabaseConnection.php';
require '../include/DatabaseFunctions.php';

if (isset($_POST['delete_module_id'])) {
    $id = $_POST['delete_module_id'];
    $stmt = $pdo->prepare('DELETE FROM module WHERE id = :id');
    $stmt->execute([':id' => $id]);
    header('Location: module.php');
    exit;
}

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Lấy tất cả modules trước
$modules = $pdo->query('SELECT id, moduleName FROM module')->fetchAll();

if ($search !== '') {
    $modules = array_filter($modules, function($module) use ($search) {
        return stripos($module['moduleName'], $search) !== false;
    });
}

$title = 'Module Management';
ob_start();
include '../templates_admin/admin_module.html.php';
$output = ob_get_clean();
include '../templates_admin/admin_layout.html.php';
?>