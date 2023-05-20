<h2 class="content__main-heading">Последние действия</h2>

<table class="tasks">
  <?php foreach ($topics as $topic): ?>
  <tr class="tasks__item task">
    <td>
      <?= $topic['update_date'] ?>
    </td>
    <td>
      <a href="/discipline.php?id=<?= $topic['discipline_id'] ?>"><?= htmlspecialchars($topic['discipline']) ?></a>
    </td>
    <td>
      <a href="/lesson.php?id=<?= $topic['lesson_id'] ?>"><?= htmlspecialchars($topic['lesson']) ?></a>
    </td>
    <td>
      <?= $topic['lesson_date'] ?>
    </td>
    <td>
      <?= htmlspecialchars($topic['topic']) ?>
    </td>
    <td>
      <?php if ($topic['username']): ?>
      <?= htmlspecialchars($topic['username']) ?>
      <?php else: ?>
      <i>освобожден</i>
      <?php endif; ?>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
