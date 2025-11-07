<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="questionid" value="<?= $question['id'] ?>">

    <label for="questiontext">Edit your question here</label>
    <textarea name="questiontext" id="questiontext" rows="3" cols="40"><?= htmlspecialchars($question['text']) ?></textarea>

    <label for="userid">User:</label>
    <select name="userid" id="userid" required>
        <option value="">Select a user</option>
        <?php foreach ($users as $user): ?>
            <option value="<?= htmlspecialchars($user['id']) ?>" <?= $user['id'] == $question['userid'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($user['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="moduleid">Module:</label>
    <select name="moduleid" id="moduleid" required>
        <option value="">Select a module</option>
        <?php foreach ($modules as $module): ?>
            <option value="<?= htmlspecialchars($module['id']) ?>" <?= $module['id'] == $question['moduleid'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($module['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Current Image:</label>
    <?php if (!empty($question['image'])): ?>
        <div>
            <img src="image/<?= htmlspecialchars($question['image']) ?>" alt="Question Image" style="max-width:150px;">
        </div>
    <?php else: ?>
        <div>No image</div>
    <?php endif; ?>

    <label for="image">Change Image (optional):</label>
    <input type="file" name="image" id="image" accept="image/*">

    <input type="submit" name="submit" value="Save">
</form>