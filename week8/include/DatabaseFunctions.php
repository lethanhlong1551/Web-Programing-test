<?php
/*function totalJokes($pdo){
    $query = $pdo->prepare('SELECT COUNT(*) AS total FROM joke');
    $query->execute();
    $row = $query->fetch();
    return $row[0];
} */

function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function totalJokes ($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM joke');
    $row = $query->fetch();
    return $row[0];
}

function getJoke($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM joke WHERE id = :id', $parameters);
    return $query->fetch();
}

function updateJoke($pdo, $jokeId, $joketext, $authorid, $categoryid, $imageName) {
    // Nếu không upload ảnh mới, giữ lại ảnh cũ
    if ($imageName === null || $imageName === '') {
        $oldJoke = getJoke($pdo, $jokeId);
        $imageName = $oldJoke['Image'];
    }
    $query = 'UPDATE joke SET joketext = :joketext, authorid = :authorid, categoryid = :categoryid, Image = :image WHERE id = :id';
    $parameters = [':joketext' => $joketext, ':id' => $jokeId, ':authorid' => $authorid, ':categoryid' => $categoryid, ':image' => $imageName];
    query($pdo, $query, $parameters);
}

function deleteJoke($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM joke WHERE id = :id', $parameters);
}

function insertJoke($pdo, $joketext, $authorid, $categoryid, $imageName){
    $query = 'INSERT INTO joke (joketext, jokedate, authorid, categoryid, Image) 
    VALUES (:joketext, CURDATE(), :authorid, :categoryid, :images)';
    $parameters = [':joketext' => $joketext, ':authorid' => $authorid, ':categoryid' => $categoryid, ':images' => $imageName];
    query($pdo, $query, $parameters);
}

function allAuthors($pdo) {
    $authors = query($pdo, 'SELECT * FROM author');
    return $authors->fetchAll();
}

function allCategories($pdo) {
    $categories = query($pdo, 'SELECT * FROM category');
    return $categories->fetchAll();
}
