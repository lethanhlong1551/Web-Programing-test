<?php
include 'include/DatabaseConnection.php';

try {
    if (isset($_POST['joketext'])) {
        // Xử lý upload hình mới nếu có
        $imageName = $_POST['current_image'] ?? null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
                if ($_FILES['image']['size'] <= 2 * 1024 * 1024) {
                    $finfo = new finfo(FILEINFO_MIME_TYPE);
                    $mime = $finfo->file($_FILES['image']['tmp_name']);
                    $allowed = [
                        'image/jpeg' => 'jpg',
                        'image/png'  => 'png',
                        'image/gif'  => 'gif',
                        'image/webp' => 'webp'
                    ];
                    if (isset($allowed[$mime])) {
                        $ext = $allowed[$mime];
                        $imageName = bin2hex(random_bytes(8)) . '.' . $ext;
                        $uploadDir = __DIR__ . '/images';
                        if (!is_dir($uploadDir)) {
                            mkdir($uploadDir, 0777, true);
                        }
                        $destination = $uploadDir . '/' . $imageName;
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                    }
                }
            }
        }

        $sql = 'UPDATE joke SET joketext = :joketext, authorid = :authorid, categoryid = :categoryid, Image = :image WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->bindValue(':authorid', $_POST['authorid']);
        $stmt->bindValue(':categoryid', $_POST['categoryid']);
        $stmt->bindValue(':image', $imageName);
        $stmt->bindValue(':id', $_POST['jokeid']);
        $stmt->execute();
        header('Location: jokes.php');
        exit;
    } else {
        $sql = 'SELECT * FROM joke WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $joke = $stmt->fetch();

        // Lấy danh sách authors và categories
        $authors = $pdo->query('SELECT id, name FROM author')->fetchAll();
        $categories = $pdo->query('SELECT id, categoryName FROM category')->fetchAll();

        $title = 'Edit Joke';
        ob_start();
        include 'templates/editjoke.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Error editing joke: ' . $e->getMessage();
}
include 'templates/layout.html.php';