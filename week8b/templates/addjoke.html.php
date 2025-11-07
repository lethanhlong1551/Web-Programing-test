<form action="" method="post" enctype="multipart/form-data">
    <label for="joketext">Type your joke here:</label>
    <textarea name="joketext" id="joketext" rows="3" cols="40"></textarea>

    <label for="authorid">Author:</label>
    <select name="authorid" id="authorid" required>
        <option value="">Select an author</option>
        <?php foreach ($authors as $author): ?>
            <option value="<?= htmlspecialchars($author['id']) ?>">
                <?= htmlspecialchars($author['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="categoryid">Category:</label>
    <select name="categoryid" id="categoryid" required>
        <option value="">Select a category</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= htmlspecialchars($cat['id']) ?>">
                <?= htmlspecialchars($cat['categoryName']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="image">Image (optional):</label>
    <input type="file" name="image" id="image" accept="image/*">

    <input type="submit" name="submit" value="Add">
</form>
