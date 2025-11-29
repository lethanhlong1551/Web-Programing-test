<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
</head>
<body>

<h2>User Management</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td>
                <form method="post" action="user.php" style="display:inline;">
                    <input type="hidden" name="delete_user_id" value="<?= $user['id'] ?>">
                    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this user?');">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>