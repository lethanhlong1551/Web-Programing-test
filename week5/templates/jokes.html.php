<?php foreach($jokes as $joke): ?>
    <blockquote>
        <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?>
        <td width="150px">
            <img height="100px" src="images/<?=htmlspecialchars($joke['Image'], ENT_QUOTES, 'UTF-8'); ?>" />
        </td>
        
        <form action="deletejoke.php" method="post">
            <input type="hidden" name="id" value="<?=$joke['id']?>">
            <input type="submit" value="Delete">
        </form>
    </blockquote>
<?php endforeach; ?>