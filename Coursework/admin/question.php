<?php
try{
    include '../include/DatabaseConnection.php';
    include '../include/DatabaseFunctions.php';

    require "login/check.php";
    $sql = 'SELECT question.id, question.text, question.date, question.image, user.name, user.email, moduleName FROM question 
            INNER JOIN user ON question.userid = user.id
            INNER JOIN module ON question.moduleid = module.id
            ORDER BY question.id DESC';
    $questions = $pdo->query($sql);
    $title = 'Question';
    $totalQuestions = totalQuestions($pdo);

    ob_start();
    include '../templates_admin/admin_question.html.php';
    $output = ob_get_clean();
}catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
    include '../templates_admin/admin_layout.html.php';