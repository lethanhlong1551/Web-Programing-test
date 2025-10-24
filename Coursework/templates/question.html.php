<?php foreach($questions as $question): ?>
    <blockquote>
        <?=htmlspecialchars($question['text'], ENT_QUOTES, 'UTF-8')?>
        <td width="150px">
            <img height="100px" src="image/<?=htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8'); ?>" />
        </td>
        (by <a href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8')?>"><?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8')?></a>)
        <a href="editquestion.php?id=<?=$question['id']?>">Edit</a>

        <form action="deletequestion.php" method="post">
            <input type="hidden" name="id" value="<?=$question['id']?>">
            <input type="submit" value="Delete">
        </form>
    </blockquote>
<?php endforeach; ?>