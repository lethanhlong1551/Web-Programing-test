<?php
include 'include/DatabaseConnection.php';
try{
    if(isset($_POST['questiontext'])){
        $sql = 'UPDATE question SET questiontext = :questiontext WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':questiontext', $_POST['questiontext']);
        $stmt->bindValue(':id', $_POST['questionid']);
        $stmt->execute();
        header('Location: questions.php');
    }else{
        $sql = 'SELECT * FROM question WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $question = $stmt->fetch();
        $title = 'Edit Question';

        ob_start();
        include 'templates/editquestion.html.php';
        $output = ob_get_clean();
    }
}catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Error editing question: ' . $e->getMessage();
}
include 'templates/layout.html.php';