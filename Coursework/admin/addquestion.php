<?php
require '../include/DatabaseConnection.php';
require '../include/DatabaseFunctions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $questiontext = trim($_POST['questiontext'] ?? '');
    $moduleid = $_POST['moduleid'] ?? '';
    $userid = $_POST['userid'] ?? '';
    if ($questiontext === '' || $moduleid === '' || $userid === '') {
        die('Question text, user, and module are required.');
    }

    $imageName = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            die('File upload failed with code: ' . $_FILES['image']['error']);
        }

        if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
            die('Image too large. Max 2MB.');
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($_FILES['image']['tmp_name']);
        $allowed = [
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/gif'  => 'gif',
            'image/webp' => 'webp'
        ];
        if (!isset($allowed[$mime])) {
            die('Invalid image type.');
        }

        $ext = $allowed[$mime];
        $imageName = bin2hex(random_bytes(8)) . '.' . $ext;

        $uploadDir = __DIR__ . '../../image';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $destination = $uploadDir . '/' . $imageName;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            die('Failed to move uploaded image.');
        }
    }

    $sql = 'INSERT INTO question (text, date, image, userid, moduleid) VALUES (:questiontext, CURDATE(), :image, :userid, :moduleid)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':questiontext' => $questiontext,
        ':image' => $imageName,
        ':userid' => $userid,
        ':moduleid' => $moduleid
    ]);

    header('Location: question.php');
    exit;
} else {
    /*$modules = $pdo->query('SELECT id, moduleName FROM module')->fetchAll();
    $users = $pdo->query('SELECT id, name, email FROM user')->fetchAll();*/
    $modules = allModules($pdo);
    $users = allUsers($pdo);
    $title = 'Add a new Question';
    ob_start();
    include '../templates_admin/admin_addquestion.html.php';
    $output = ob_get_clean();
    include '../templates_admin/admin_layout.html.php';
}
?>
