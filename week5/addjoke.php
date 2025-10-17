<?php
require 'include/DatabaseConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $joketext = trim($_POST['joketext'] ?? '');
    if ($joketext === '') {
        die('Joke text cannot be empty.');
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

        $uploadDir = __DIR__ . '/images';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $destination = $uploadDir . '/' . $imageName;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            die('Failed to move uploaded image.');
        }
    }

    $sql = 'INSERT INTO joke (joketext, jokedate, Image) VALUES (:joketext, CURDATE(), :image)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':joketext' => $joketext,
        ':image' => $imageName
    ]);

    header('Location: jokes.php');
    exit;
} else {
    $title = 'Add a new Joke';
    ob_start();
    include 'templates/addjoke.html.php';
    $output = ob_get_clean();
    include 'templates/layout.html.php';
}
?>
