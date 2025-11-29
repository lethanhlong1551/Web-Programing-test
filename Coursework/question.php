<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: templates/login.html.php');
    exit;
}

try{
    include 'include/DatabaseConnection.php';
    include 'include/DatabaseFunctions.php';

    // Lấy từ khóa tìm kiếm nếu có
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';

    // Nếu có search, chỉ lọc theo moduleName và question.text
    if ($search !== '') {
        $sql = 'SELECT question.id, question.text, question.date, question.image, user.name, user.email, moduleName FROM question 
                INNER JOIN user ON question.userid = user.id 
                INNER JOIN module ON question.moduleid = module.id
                WHERE question.text LIKE :search OR moduleName LIKE :search
                ORDER BY question.id DESC';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['search' => '%' . $search . '%']);
        $questions = $stmt->fetchAll();
    } else {
        $sql = 'SELECT question.id, question.text, question.date, question.image, user.name, user.email, moduleName FROM question 
                INNER JOIN user ON question.userid = user.id
                INNER JOIN module ON question.moduleid = module.id
                ORDER BY question.id DESC';
        $questions = $pdo->query($sql);
    }

    $title = 'Question';
    $totalQuestions = totalQuestions($pdo);

    ob_start();
    include 'templates/question.html.php';
    $output = ob_get_clean();
}catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';