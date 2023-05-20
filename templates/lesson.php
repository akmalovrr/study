<h2 class="content__main-heading"><?= $lesson['name'] ?></h2>

<table class="tasks">
  <?php foreach ($topics as $topic): ?>
  <tr class="tasks__item task">
    <td class="task__select">
      <a href="/topic.php?id=<?= $topic['id'] ?>"><?= htmlspecialchars($topic['name']) ?></a>
    </td>
    <td>
      <?php if ($topic['username'] == $user['username']): ?>
      <form class="form" action="" method="post">
        <input type="hidden" name="topic_id" value="<?= $topic['id'] ?>"/>
        <input type="hidden" name="free" value="true"/>
        <?= htmlspecialchars($topic['username']) ?>
        <input type="submit" class="btn btn-primary" value="Освободить">
      </form>
      <?php elseif ($topic['username'] != null): ?>
      <?= htmlspecialchars($topic['username']) ?>
      <?php else: ?>
      <form class="form" action="" method="post">
        <input type="hidden" name="topic_id" value="<?= $topic['id'] ?>"/>
        <input type="submit" class="btn btn-primary" value="Занять">
      </form>
      <?php endif; ?>
    </td>
    <td>
      <?= $topic['update_date'] ?>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
