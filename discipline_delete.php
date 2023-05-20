<?php
require_once('init.php');
require('helpers.php');

check_admin();
$user = $_SESSION['user'];

$discipline_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = 'DELETE FROM disciplines WHERE id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $discipline_id);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        header("Location: disciplines.php");
        exit();
    } else {
        $content = include_template('error.php', ['error' => mysqli_error($link)]);
    }
} else {
    $sql = "SELECT * FROM disciplines WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $discipline_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $discipline = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $content = include_template("discipline_delete.php", ["discipline" => $discipline]);
}

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
