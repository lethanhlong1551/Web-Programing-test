<?php
try{
    include 'include/DatabaseConnection.php';

    $sql = 'SELECT question.id, question.text, question.date, question.image, author.name, author.email FROM question 
            INNER JOIN author ON question.authorid = author.id 
            ORDER BY question.id DESC';
    $questions = $pdo->query($sql);
    $title = 'Question';

    ob_start();
    include 'templates/question.html.php';
    $output = ob_get_clean();
}catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
    include 'templates/layout.html.php';