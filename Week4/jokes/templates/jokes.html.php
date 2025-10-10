<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of jokes</title>
</head>
<body>
    <?php if(isset($error)): ?>
        <p> <?=$error ?> </p>
    <?php else:?>
    foreach($jokes as $joke): ?>
    <blockquote>
    <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?>
    <?php $display_date = date("D d M Y", strtotime($joke['jokedate'])); ?>
    <?=htmlspecialchars($display_date, ENT_QUOTES, 'UTF-8')?>
    <img height="100px" src="images/<?=htmlspecialchars($joke['image'], ENT_QUOTES, 'UTF-8')?>" />
    </blockquote>
    <?php endforeach;
    endif; ?>
</body>
</html>