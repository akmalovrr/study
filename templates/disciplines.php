<h2 class="content__main-heading">Дисциплины</h2>

<table class="tasks">
  <?php foreach ($disciplines as $discipline): ?>
  <tr class="tasks__item task">
    <td class="task__select">
      <a href="/discipline.php?id=<?= $discipline['id'] ?>"><?= htmlspecialchars($discipline['name']) ?></a>
    </td>
    <?php if ($user['is_admin']) : ?>
    <td>
      <a href="/discipline_delete.php?id=<?= $discipline['id'] ?>">Удалить</a>
    </td>
    <?php endif; ?>
  </tr>
  <?php endforeach; ?>
</table>

<?php if ($user['is_admin']) : ?>
<div>
  <a class="button" href="discipline_new.php">Добавить</a>
</div>
<?php endif; ?>
