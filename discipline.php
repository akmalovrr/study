<?php
require_once('init.php');
require('helpers.php');

check_auth();
$user = $_SESSION['user'];

$discipline_id = $_GET['id'];

$sql = "SELECT * FROM disciplines WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $discipline_id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$discipline = mysqli_fetch_array($res, MYSQLI_ASSOC);

$sql = "SELECT * FROM lessons WHERE discipline_id = ? ORDER BY date";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $discipline_id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$lessons = mysqli_fetch_all($res, MYSQLI_ASSOC);

$content = include_template("discipline.php", [
  "user" => $user,
  "discipline" => $discipline,
  "lessons" => $lessons,
]);

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
