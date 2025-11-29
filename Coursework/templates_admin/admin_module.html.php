<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Module Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h2>Module Management</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Module Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($modules as $module): ?>
            <tr>
                <td><?= htmlspecialchars($module['id']) ?></td>
                <td><?= htmlspecialchars($module['moduleName']) ?></td>
                <td>
                    <form method="post" action="module.php" style="display:inline;">
                        <input type="hidden" name="delete_module_id" value="<?= $module['id'] ?>">
                        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this module?');">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>