<?php
function totalJokes($pdo){
    $query = $pdo->prepare('SELECT COUNT(*) AS total FROM joke');
    $query->execute();
    $row = $query->fetch();
    return $row[0];
}