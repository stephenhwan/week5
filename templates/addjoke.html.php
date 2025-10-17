<form action='' method="post" enctype="multipart/form-data">
  <label for="joketext">Type your joke here:</label>
  <textarea id="joketext" name="joketext" rows="4" cols="40" required></textarea>

  <label for="image">Image (optional):</label>
  <input id="image" type="file" name="image" accept="image/*">

  <div class="actions">
    <button type="submit" name="submit" value="Add">Add</button>
  </div>
</form>