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
            <?php foreach($jokes as $joke): ?>
            <tr>
                <td class="joke-text">
                    <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?>
                </td>
                
                <td class="joke-image-cell">
                    <?php if (!empty($joke['image'])): ?>
                        <img src="uploads/<?=htmlspecialchars($joke['image'], ENT_QUOTES, 'UTF-8')?>" 
                             alt="Joke image"
                             class="joke-thumbnail">
                    <?php else: ?>
                        <span class="no-image">No image</span>
                    <?php endif; ?>
                </td>
                
                <td class="joke-date-cell">
                    <?=htmlspecialchars($joke['jokedate'], ENT_QUOTES, 'UTF-8')?>
                </td>
                
                <td class="joke-actions">
                    <form action="deletejoke.php" method="post" 
                          onsubmit="return confirm('Are you sure you want to delete this joke?');">
                        <input type="hidden" name="id" value="<?=$joke['id']?>">
                        <?php if (!empty($joke['image'])): ?>
                            <input type="hidden" name="image" value="<?=htmlspecialchars($joke['image'], ENT_QUOTES, 'UTF-8')?>">
                        <?php endif; ?>
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>