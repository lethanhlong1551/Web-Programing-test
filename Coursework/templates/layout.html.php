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
            <!-- <li><a href="admin/login/login.html">Admin Login</a></li> -->
            <li><a href="admin/login/logout.php">Logout</a></li>
        </ul>
    </nav>
    <?php if ($title !== 'Add a new Question' && $title !== 'Student Forum' && $title !== 'Edit Question'): ?>
    <form method="get" action="question.php" style="width:1000px; margin:16px auto; display:flex; align-items:center; justify-content:center; gap:4px;">
        <input type="text" name="search" placeholder="Search questions..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" style="width:300px; padding:6px;">
        <input type="submit" value="Search" style="padding:6px 16px;">
    </form>
    <?php endif; ?>
    <main>
        <?=$output?>
    </main>
    <footer>&copy; Made by Student</footer>

    </body>
</html>