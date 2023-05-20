<?php
require_once('init.php');
require('helpers.php');

check_admin();
$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $discipline_id = $_GET['discipline_id'];
    $lesson = $_POST;
    if ($lesson['date'] == '') {
        $lesson['date'] = null;
    }
    $topics_count = intval($lesson['topics_count']);

    $sql = 'INSERT INTO lessons (name, date, discipline_id) VALUES (?, ?, ?)';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssi', $lesson['name'], $lesson['date'], $discipline_id);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        $lesson_id = mysqli_insert_id($conn);
        for ($i = 1; $i <= $topics_count; $i++) {
            $sql = 'INSERT INTO topics (name, lesson_id) VALUES (?, ?)';
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'si', strval($i), $lesson_id);
            $res = mysqli_stmt_execute($stmt);
        }
        header("Location: discipline.php?id=" . $discipline_id);
        exit();
    } else {
        $content = include_template('error.php', ['error' => mysqli_error($link)]);
    }
} else {
    $content = include_template("lesson-new.php");
}

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
