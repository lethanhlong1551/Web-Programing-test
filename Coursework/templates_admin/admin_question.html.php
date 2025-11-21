<p><?= (int)$totalQuestions ?> Questions have been submitted to the Internet Question Database.</p>

<table style="width:100%; border-collapse:collapse;">
    <thead>
        <tr style="background:#f3f3f3;">
            <th style="text-align:left; padding:10px;">Question</th>
            <th style="text-align:left; padding:10px;">Image</th>
            <th style="text-align:left; padding:10px;">Date</th>
            <th style="text-align:left; padding:10px;">Module</th>
            <th style="text-align:left; padding:10px;">User (Email)</th>
            <th style="text-align:right; padding:10px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($questions as $question): ?>
        <tr style="border-bottom:1px solid #ddd;">
            <td style="padding:10px;"><?=htmlspecialchars($question['text'], ENT_QUOTES, 'UTF-8')?></td>
            <td style="padding:10px;">
                <?php if (!empty($question['image'])): ?>
                    <img src="../image/<?=htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8')?>" alt="Question Image" width="120">
                <?php endif; ?>
            </td>
            <td style="padding:10px;"><?=htmlspecialchars($question['date'], ENT_QUOTES, 'UTF-8')?></td>
            <td style="padding:10px;"><?=htmlspecialchars($question['moduleName'], ENT_QUOTES, 'UTF-8')?></td>
            <td style="padding:10px;">
                <a href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8')?>"><?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8')?></a>
            </td>
            <td style="padding:10px; text-align:right;">
                <form action="editquestion.php" method="get" style="display:inline;">
                    <input type="hidden" name="id" value="<?=$question['id']?>">
                    <input type="submit" value="Edit">
                </form>
                <form action="deletequestion.php" method="post" style="display:inline; margin-left:8px;">
                    <input type="hidden" name="id" value="<?=$question['id']?>">
                    <input type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>