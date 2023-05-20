<h2 class="content__main-heading"><?= $discipline['name'] ?></h2>

<table class="tasks">
  <?php foreach ($lessons as $lesson): ?>
  <tr class="tasks__item task">
    <td class="task__select">
      <a href="/lesson.php?id=<?= $lesson['id'] ?>"><?= htmlspecialchars($lesson['name']) ?></a>
    </td>
    <td>
      <?= $lesson['date'] ?>
    </td>
    <?php if ($user['is_admin']) : ?>
    <td>
      <a href="/lesson_delete.php?discipline_id=<?= $discipline['id'] ?>&id=<?= $lesson['id'] ?>">Удалить</a>
    </td>
    <?php endif; ?>
  </tr>
  <?php endforeach; ?>
</table>

<?php if ($user['is_admin']) : ?>
<div>
  <a class="button" href="lesson-new.php?discipline_id=<?= $discipline['id'] ?>">Добавить</a>
</div>
<?php endif; ?>
