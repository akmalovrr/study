<h2 class="content__main-heading">Мои темы</h2>

<table class="tasks">
  <?php foreach ($topics as $topic): ?>
  <tr class="tasks__item task">
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
      <?= $topic['update_date'] ?>
    </td>
    <td>
      <form class="form" action="" method="post">
        <input type="hidden" name="topic_id" value="<?= $topic['id'] ?>"/>
        <input type="submit" class="btn btn-primary" value="Освободить">
      </form>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
