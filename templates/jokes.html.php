<div class="questions-table-container">
  <table class="questions-table">
    <thead>
      <tr>
        <th>Question Text</th>
        <th>User</th>
        <th>Module</th>
        <th>Image</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($questions)): ?>
        <tr>
          <td colspan="5" style="text-align: center;">No questions found.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($questions as $question): ?>
          <tr>
            <!-- Question Text -->
            <td class="question-text">
              <?= htmlspecialchars($question['text'] ?? '', ENT_QUOTES, 'UTF-8') ?>
            </td>
            
            <!-- User Email -->
            <td class="question-user-cell">
              <?php if (!empty($question['email'])): ?>
                <a href="mailto:<?= htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8') ?>">
                  <?= htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8') ?>
                </a>
              <?php else: ?>
                <span class="no-user">Unknown</span>
              <?php endif; ?>
            </td>
            
            <!-- Module -->
            <td class="question-module-cell">
              <?= htmlspecialchars($question['module'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>
            </td>
            
            <!-- Image -->
            <td class="question-image-cell">
              <?php if (!empty($question['image'])): ?>
                <img
                  src="uploads/<?= htmlspecialchars(basename($question['image']), ENT_QUOTES, 'UTF-8') ?>"
                  alt="Question image"
                  class="question-thumbnail">
              <?php else: ?>
                <span class="no-image">No image</span>
              <?php endif; ?>
            </td>
            
            <!-- Date -->
            <td class="question-date-cell">
              <?= htmlspecialchars($question['date'] ?? '', ENT_QUOTES, 'UTF-8') ?>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>