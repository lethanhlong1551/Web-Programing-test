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
            <li><a href="module.php">Module List</a></li>
            <li><a href="user.php">User List</a></li>
            <li><a href="email.php">Contact</a></li>
            <li><a href="login/logout.php">Public Site/Logout</a></li>
        </ul>
    </nav>
    <?php
    // Xác định trang hiện tại để đổi action và placeholder
    $searchAction = '';
    $searchPlaceholder = '';
    if (strpos($_SERVER['PHP_SELF'], 'question.php') !== false) {
        $searchAction = 'question.php';
        $searchPlaceholder = 'Search questions...';
    } elseif (strpos($_SERVER['PHP_SELF'], 'module.php') !== false) {
        $searchAction = 'module.php';
        $searchPlaceholder = 'Search modules...';
    } elseif (strpos($_SERVER['PHP_SELF'], 'user.php') !== false) {
        $searchAction = 'user.php';
        $searchPlaceholder = 'Search users...';
    } elseif (strpos($_SERVER['PHP_SELF'], 'email.php') !== false) {
        $searchAction = 'email.php';
        $searchPlaceholder = 'Search emails...';
    }
    ?>
    <?php if ($title !== 'Add a new Question' && $title !== 'Edit Question'): ?>
    <form method="get" action="<?=$searchAction?>" style="width:1000px; margin:16px auto; display:flex; align-items:center; justify-content:center; gap:4px;">
        <input type="text" name="search" placeholder="<?=$searchPlaceholder?>" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" style="width:300px; padding:6px;">
        <input type="submit" value="Search" style="padding:6px 16px;">
    </form>
    <?php endif; ?>
    <main>
        <?=$output?>
    </main>