<form action="addjoke.php" method="post" enctype="multipart/form-data">
  <label for="joketext">Type your joke here:</label>
  <textarea name="joketext" rows="3" cols="40" required></textarea>

  <label for="image">Select image:</label>
  <input type="file" name="image" accept=".jpg,.jpeg,.png,.gif,.webp">

  <input type="submit" name="submit" value="Add">
</form>
