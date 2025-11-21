<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="question.css">
    <title><?=$title?></title>
</head>
<body>
    <header><h1>Student Forum</h1></header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="question.php">Question List</a></li>
            <li><a href="addquestion.php">Add a new Question</a></li>
            <!-- <li><a href="admin/question.php">Admin</a></li> -->
            <li><a href="admin/login/login.html">Admin Login</a></li>
        </ul>
    </nav>
    <main>
        <?=$output?>
    </main>
    <footer>&copy; Made by Student</footer>

    </body>
</html>