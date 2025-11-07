<?php
include 'include/DatabaseConnection.php';
try {
    if (isset($_POST['questiontext'])) {
        $sql = 'UPDATE question SET questiontext = :questiontext, userid = :userid, moduleid = :moduleid WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':questiontext', $_POST['questiontext']);
        $stmt->bindValue(':userid', $_POST['userid']);
        $stmt->bindValue(':moduleid', $_POST['moduleid']);
        $stmt->bindValue(':id', $_POST['questionid']);
        $stmt->execute();
        header('Location: questions.php');
        exit;
    } else {
        $sql = 'SELECT * FROM question WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $question = $stmt->fetch();

        // Lấy danh sách users và modules
        $users = $pdo->query('SELECT id, name FROM user')->fetchAll();
        $modules = $pdo->query('SELECT id, moduleName FROM module')->fetchAll();

        $title = 'Edit Question';
        ob_start();
        include 'templates/editquestion.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Error editing question: ' . $e->getMessage();
}
include 'templates/layout.html.php';