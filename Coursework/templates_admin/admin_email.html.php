<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Management</title>
</head>
<body>

<h2>Email Management</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>
                <form method="post" action="email.php" style="display:inline;">
                    <input type="hidden" name="delete_email_id" value="<?= $user['id'] ?>">
                    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this email?');">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>