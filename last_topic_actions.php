<?php
require_once('init.php');
require('helpers.php');

check_auth();
$user = $_SESSION['user'];

$lesson_id = $_GET['id'];

$sql = 'SELECT topics.id, topics.name as topic, topics.update_date, topics.user_id, topics.lesson_id, ' .
    'users.username, lessons.name as lesson, lessons.date as lesson_date, disciplines.id as discipline_id, disciplines.name as discipline ' .
    'FROM topics ' .
    'LEFT JOIN users ON user_id = users.id ' .
    'INNER JOIN lessons ON lesson_id = lessons.id ' .
    'INNER JOIN disciplines ON lessons.discipline_id = disciplines.id ' .
    'WHERE topics.update_date IS NOT NULL ' .
    'ORDER BY topics.update_date DESC LIMIT 10';
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$topics = mysqli_fetch_all($res, MYSQLI_ASSOC);

$content = include_template("last_topic_actions.php", [
  "topics" => $topics,
]);

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
