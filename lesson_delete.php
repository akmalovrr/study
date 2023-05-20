<?php
require_once('init.php');
require('helpers.php');

check_admin();
$user = $_SESSION['user'];

$discipline_id = $_GET['discipline_id'];
$lesson_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = 'DELETE FROM lessons WHERE id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $lesson_id);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        header("Location: discipline.php?id=" . $discipline_id);
        exit();
    } else {
        $content = include_template('error.php', ['error' => mysqli_error($link)]);
    }
} else {
    $sql = "SELECT * FROM lessons WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $lesson_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $lesson = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $content = include_template("lesson_delete.php", [
        'discipline_id' => $discipline_id,
        'lesson' => $lesson
    ]);
}

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
