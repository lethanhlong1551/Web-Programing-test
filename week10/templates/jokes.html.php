<p><?= (int)$totalJokes ?> jokes have been submitted to the Internet Joke Database.</p>
<?php foreach($jokes as $joke): ?>
    <blockquote>
        <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?>
        <td width="150px">
            <img height="100px" src="images/<?=htmlspecialchars($joke['Image'], ENT_QUOTES, 'UTF-8'); ?>" />
            <br /><?=htmlspecialchars($joke['categoryName'], ENT_QUOTES, 'UTF-8')?>
        </td>
        (by <a href="mailto:<?=htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8')?>"><?=htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8')?></a>)
        
        </form>
    </blockquote>
<?php endforeach; ?>