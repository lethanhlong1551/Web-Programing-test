<?php
try{
    include '../include/DatabaseConnection.php';
    include '../include/DatabaseFunctions.php';

    $sql = 'SELECT joke.id, joketext, jokedate, Image, author.name, author.email, categoryName FROM joke 
            INNER JOIN author ON joke.authorid = author.id
            INNER JOIN category ON joke.categoryid = category.id
            ORDER BY joke.id DESC';
    $jokes = $pdo->query($sql);
    $title = 'Joke List';
    $totalJokes = totalJokes($pdo);

    ob_start();
    include 'templates_admin/jokes.html.php';
    $output = ob_get_clean();
}catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
    include '../templates_admin/admin_layout.html.php';