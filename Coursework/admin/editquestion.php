<?php
include '../include/DatabaseConnection.php';
include '../include/DatabaseFunctions.php';
try {
    if (isset($_POST['questiontext'])) {
        /*$sql = 'UPDATE question SET questiontext = :questiontext, userid = :userid, moduleid = :moduleid WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':questiontext', $_POST['questiontext']);
        $stmt->bindValue(':userid', $_POST['userid']);
        $stmt->bindValue(':moduleid', $_POST['moduleid']);
        $stmt->bindValue(':id', $_POST['questionid']);
        $stmt->execute();*/
        $date = date('Y-m-d');
        $imageName = null; // Khởi tạo mặc định

        // Xử lý upload ảnh mới
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                die('Upload failed.');
            }
            if ($_FILES['image']['size'] > 20 * 1024 * 1024) {
                die('File too large.');
            }
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($_FILES['image']['tmp_name']);
            $allowed = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/gif' => 'gif',
                'image/webp' => 'webp'
            ];
            if (!isset($allowed[$mime])) {
                die('Invalid file type.');
            }
            $ext = $allowed[$mime];
            $imageName = bin2hex(random_bytes(8)) . '.' . $ext; // Tên file ngẫu nhiên

            $uploadDir = __DIR__ . '../../image'; // Thư mục lưu ảnh
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $destination = $uploadDir . '/' . $imageName;
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                die('Failed to save image.');
            }
        } else {
            // Nếu không upload mới, lấy tên ảnh cũ
            $imageName = $_POST['current_image'] ?? null;
        }

        updateQuestion($pdo, $_POST['questionid'], $_POST['questiontext'], $date, $_POST['moduleid'], $_POST['userid'], $imageName);
        header('Location: question.php');
        exit;
    } else {
        /*$sql = 'SELECT * FROM question WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $question = $stmt->fetch();*/
        $question = getQuestion($pdo, $_GET['id']);

        // Lấy danh sách users và modules
        $users = $pdo->query('SELECT id, name FROM user')->fetchAll();
        $modules = $pdo->query('SELECT id, moduleName FROM module')->fetchAll();

        $title = 'Edit Question';
        ob_start();
        include '../templates_admin/admin_editquestion.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Error editing question: ' . $e->getMessage();
}
include '../templates_admin/admin_layout.html.php';