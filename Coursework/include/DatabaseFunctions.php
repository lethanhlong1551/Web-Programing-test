<?php
/*function totalQuestions($pdo){
    $query = $pdo->prepare('SELECT COUNT(*) AS total FROM question');
    $query->execute();
    $row = $query->fetch();
    return $row[0];
} */

function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function totalQuestions ($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM question');
    $row = $query->fetch();
    return $row[0];
}

function getQuestion($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM question WHERE id = :id', $parameters);
    return $query->fetch();
}

function updateQuestion($pdo, $id, $text, $date, $moduleid, $userid, $image) {
    if ($image === null || $image === '') {
        $oldQuestion = getQuestion($pdo, $id);
        $image = ($oldQuestion && isset($oldQuestion['image'])) ? $oldQuestion['image'] : null;
    }
    $query = 'UPDATE question SET text = :text, date = :date, userid = :userid, moduleid = :moduleid, image = :image WHERE id = :id';
    $parameters = [
        ':text' => $text,
        ':date' => $date,
        ':id' => $id,
        ':userid' => $userid,
        ':moduleid' => $moduleid,
        ':image' => $image
    ];
    query($pdo, $query, $parameters);
}

function deleteQuestion($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM question WHERE id = :id', $parameters);
}

function insertQuestion($pdo, $text, $userid, $moduleid, $image){
    $query = 'INSERT INTO question (text, date, userid, moduleid, image) 
    VALUES (:text, CURDATE(), :userid, :moduleid, :image)';
    $parameters = [
        ':text' => $text,
        ':userid' => $userid,
        ':moduleid' => $moduleid,
        ':image' => $image
    ];
    query($pdo, $query, $parameters);
}

function allUsers($pdo) {
    $users = query($pdo, 'SELECT * FROM user');
    return $users->fetchAll();
}

function allModules($pdo) {
    $modules = query($pdo, 'SELECT * FROM module');
    return $modules->fetchAll();
}


