<?php
function totalQuestions($pdo){
    $query = $pdo->prepare('SELECT COUNT(*) AS total FROM question');
    $query->execute();
    $row = $query->fetch();
    return $row[0];
}