<div class="jokes-table-container">
  <table class="jokes-table">
    <thead>
      <tr>
        <th>Joke Text</th>
        <th>Image</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($jokes as $joke): ?>
        <tr>
          <td class="joke-text">
            <?= htmlspecialchars($joke['joketext'] ?? '', ENT_QUOTES, 'UTF-8') ?>
            <?php if (!empty($joke['email'])): ?>
              <br>
              <small>
                by
                <a href="mailto:<?= htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8') ?>">
                  <?= htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8') ?>
                </a>
              </small>
            <?php endif; ?>
          </td>
          <td class="joke-image-cell">
            <?php if (!empty($joke['image'])): ?>
              <img
                src="uploads/<?= htmlspecialchars(basename($joke['image']), ENT_QUOTES, 'UTF-8') ?>"
                alt="Joke image"
                class="joke-thumbnail">
            <?php else: ?>
              <span class="no-image">No image</span>
            <?php endif; ?>
          </td>
          <td class="joke-date-cell">
            <?= htmlspecialchars($joke['jokedate'] ?? '', ENT_QUOTES, 'UTF-8') ?>
          </td>
          <td class="joke-actions">
            <!-- Edit Button -->
            <a href="editjoke.php?id=<?= (int)($joke['id'] ?? 0) ?>" class="edit-btn">Edit</a>
            
            <!-- Delete Form -->
            <form action="deletejoke.php" method="post"
                  onsubmit="return confirm('Are you sure you want to delete this joke?');">
              <input type="hidden" name="id" value="<?= (int)($joke['id'] ?? 0) ?>">
              <?php if (!empty($joke['image'])): ?>
                <input type="hidden" name="image"
                       value="<?= htmlspecialchars(basename($joke['image']), ENT_QUOTES, 'UTF-8') ?>">
              <?php endif; ?>
              <button type="submit" class="delete-btn">Delete</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>