<form action="" method="post" enctype="multipart/form-data">
    <label for="questiontext">Type your question here:</label>
    <textarea name="questiontext" id="questiontext" rows="3" cols="40"></textarea>

    <label for="userid">User:</label>
    <select name="userid" id="userid" required>
        <option value="">Select a user</option>
        <?php foreach ($users as $user): ?>
            <option value="<?= htmlspecialchars($user['id']) ?>">
                <?= htmlspecialchars($user['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="moduleid">Module:</label>
    <select name="moduleid" id="moduleid" required>
        <option value="">Select a module</option>
        <?php foreach ($modules as $module): ?>
            <option value="<?= htmlspecialchars($module['id']) ?>">
                <?= htmlspecialchars($module['moduleName']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="image">Image (optional):</label>
    <input type="file" name="image" id="image" accept="image/*">

    <input type="submit" name="submit" value="Add">
</form>
