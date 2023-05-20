<?php
require_once('init.php');
require('helpers.php');

check_auth();
$user = $_SESSION['user'];

$lesson_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $topic_id = $_POST['topic_id'];

    $sql = 'UPDATE topics SET user_id = NULL, update_date = NOW() WHERE id = ? AND user_id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ii', $topic_id, $user['id']);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        if (mysqli_affected_rows($conn) > 0) {
            header('Location: my_topics.php');
            exit();
        } else {
            $content = include_template('error.php', ['error' => 'Нельзя освободить не свою тему']);
        }
    } else {
        $content = include_template('error.php', ['error' => mysqli_error($link)]);
    }
} else {
    $sql = 'SELECT topics.id, topics.name as topic, topics.update_date, topics.user_id, topics.lesson_id, ' .
        'lessons.name as lesson, lessons.date as lesson_date, disciplines.id as discipline_id, disciplines.name as discipline ' .
        'FROM topics ' .
        'INNER JOIN users ON user_id = users.id ' .
        'INNER JOIN lessons ON lesson_id = lessons.id ' .
        'INNER JOIN disciplines ON lessons.discipline_id = disciplines.id ' .
        'WHERE user_id = ? ' .
        'ORDER BY lessons.date, topic';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user['id']);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $topics = mysqli_fetch_all($res, MYSQLI_ASSOC);

    $content = include_template("my_topics.php", [
      "user" => $user,
      "topics" => $topics,
    ]);
}

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
