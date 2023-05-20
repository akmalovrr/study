<h2 class="content__main-heading">Удаление занятия</h2>

<form class="form" action="" method="post">
  <p>Удалить "<?= $lesson['name'] ?>"?</p><br>
  <p>
      <input type="submit" value="Удалить" class="btn btn-danger">
      <a href="discipline.php?id=<?= $discipline_id ?>" class="btn btn-default">Отмена</a>
  </p>
</form>
