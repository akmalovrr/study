<?php
require_once('init.php');
require('helpers.php');

check_auth();
$user = $_SESSION['user'];

$lesson_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $topic_id = $_POST['topic_id'];
    $make_free = boolval($_POST['free']);

    if ($make_free) {
        $sql = 'UPDATE topics SET user_id = NULL, update_date = NOW() WHERE id = ? AND user_id = ?';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ii', $topic_id, $user['id']);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            if (mysqli_affected_rows($conn) > 0) {
                header("Location: lesson.php?id=" . $lesson_id);
                exit();
            } else {
                $content = include_template('error.php', ['error' => 'Нельзя освободить не свою тему']);
            }
        } else {
            $content = include_template('error.php', ['error' => mysqli_error($link)]);
        }
    } else {
        $sql = 'UPDATE topics SET user_id = ?, update_date = NOW() WHERE id = ? AND user_id IS NULL';
        $stmt = mysqli_prepare($conn, $sql);
        var_dump($user['id']);
        var_dump($topic_id);
        mysqli_stmt_bind_param($stmt, 'ii', $user['id'], $topic_id);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            if (mysqli_affected_rows($conn) > 0) {
                header("Location: lesson.php?id=" . $lesson_id);
                exit();
            } else {
                $content = include_template('error.php', ['error' => 'Тема занята']);
            }
        } else {
            $content = include_template('error.php', ['error' => mysqli_error($link)]);
        }
    }
} else {
    $sql = "SELECT * FROM lessons WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $lesson_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $lesson = mysqli_fetch_array($res, MYSQLI_ASSOC);

    $sql = "SELECT topics.id, topics.name, topics.update_date, topics.user_id, users.username " .
        "FROM topics LEFT JOIN users ON user_id = users.id WHERE lesson_id = ? " .
        "ORDER BY topics.name";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $lesson_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $topics = mysqli_fetch_all($res, MYSQLI_ASSOC);

    $content = include_template("lesson.php", [
      "user" => $user,
      "lesson" => $lesson,
      "topics" => $topics,
    ]);
}

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
