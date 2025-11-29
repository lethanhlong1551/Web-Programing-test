<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="jokeid" value="<?=$joke['id']?>">

    <label for="joketext">Edit your joke here</label>
    <textarea name="joketext" id="joketext" rows="3" cols="40"><?= htmlspecialchars($joke['joketext']) ?></textarea>

    <label for="authorid">Author:</label>
    <select name="authorid" id="authorid" required>
        <option value="">Select an author</option>
        <?php foreach ($authors as $author): ?>
            <option value="<?= htmlspecialchars($author['id']) ?>" <?= $author['id'] == $joke['authorid'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($author['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="categoryid">Category:</label>
    <select name="categoryid" id="categoryid" required>
        <option value="">Select a category</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= htmlspecialchars($cat['id']) ?>" <?= $cat['id'] == $joke['categoryid'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['categoryName']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Current Image:</label>
    <?php if (!empty($joke['Image'])): ?>
        <div>
            <img src="../images/<?= htmlspecialchars($joke['Image']) ?>" alt="Joke Image" style="max-width:150px;">
        </div>
    <?php else: ?>
        <div>No image</div>
    <?php endif; ?>

    <label for="image">Change Image (optional):</label>
    <input type="file" name="image" id="image" accept="image/*">

    <input type="submit" name="submit" value="Save">
</form>