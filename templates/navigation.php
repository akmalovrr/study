<nav class="main-navigation">
  <ul class="main-navigation__list">
    <li class="main-navigation__list-item">
      <a class="main-navigation__list-item-link" href="/disciplines.php">Дисциплины</a>
    </li>
    <li class="main-navigation__list-item">
      <a class="main-navigation__list-item-link" href="/my_topics.php">Мои темы</a>
    </li>
    <li class="main-navigation__list-item">
      <a class="main-navigation__list-item-link" href="/last_topic_actions.php">Последние действия</a>
    </li>
    <?php if ($user['is_admin']) : ?>
    <li class="main-navigation__list-item">
      <a class="main-navigation__list-item-link" href="/users.php">Пользователи</a>
    </li>
    <?php endif; ?>
  </ul>
</nav>
