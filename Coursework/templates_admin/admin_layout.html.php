<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../question.css">
    <title><?=$title?></title>
</head>
<body>
    <header id="admin">
    <h1>Internet Question Database Admin Area<br />
    Manage questions, Users and modules</h1>
</header>
    <nav>
        <ul>
            <li><a href="question.php">Question List</a></li>
            <li><a href="addquestion.php">Add a new question</a></li>
            <!--<li><a href="../index.php">Public Site</a></li> -->
            <li><a href="login/logout.php">Public Site/Logout</a></li>
        </ul>
    </nav>
    <main>
        <?=$output?>
    </main>