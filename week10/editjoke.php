<?php
include 'include/DatabaseConnection.php';
include 'include/DatabaseFunctions.php';

try {
    if (isset($_POST['joketext'])) {
        // Xử lý upload hình mới nếu có
        $imageName = $_POST['current_image'] ?? null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            // kiểm tra mime type, cho phép gif/webp
            $allowed = [
                'image/jpeg' => 'jpg',
                'image/png'  => 'png',
                'image/gif'  => 'gif',
                'image/webp' => 'webp'
            ];
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($_FILES['image']['tmp_name']);
            if (isset($allowed[$mime])) {
                $ext = $allowed[$mime];
                $imageName = bin2hex(random_bytes(8)) . '.' . $ext;
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../images/' . $imageName);
            }
        } else {
            $imageName = $_POST['current_image']; // giữ tên ảnh cũ nếu không upload mới
        }

        /*$sql = 'UPDATE joke SET joketext = :joketext, authorid = :authorid, categoryid = :categoryid, Image = :image WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->bindValue(':authorid', $_POST['authorid']);
        $stmt->bindValue(':categoryid', $_POST['categoryid']);
        $stmt->bindValue(':image', $imageName);
        $stmt->bindValue(':id', $_POST['jokeid']);
        $stmt->execute(); */
        updateJoke($pdo, $_POST['jokeid'], $_POST['joketext'], $_POST['authorid'], $_POST['categoryid'], $imageName);
        header('Location: jokes.php');
        exit;
    } else {
        /*$sql = 'SELECT * FROM joke WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $joke = $stmt->fetch();*/

        $joke = getJoke($pdo, $_GET['id']);
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