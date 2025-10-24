<?php
try{
    include 'include/DatabaseConnection.php';

    $sql = 'DELETE FROM question WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();
    header('Location: question.php');
}catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete question: ' . $e->getMessage();
}
    include 'templates/layout.html.php';
