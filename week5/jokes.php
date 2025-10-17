<?php
try{
    include 'include/DatabaseConnection.php';

    $sql = 'SELECT id, joketext, jokedate, Image FROM joke ORDER BY id DESC';
    $jokes = $pdo->query($sql);
    $title = 'Joke List';

    ob_start();
    include 'templates/jokes.html.php';
    $output = ob_get_clean();
}catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
    include 'templates/layout.html.php';