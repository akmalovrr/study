<?php
require_once('init.php');
require('helpers.php');

check_admin();
$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $discipline = $_POST;

    $sql = 'INSERT INTO disciplines (name) VALUES (?)';
    $stmt = db_get_prepare_stmt($conn, $sql, $discipline);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        $discipline_id = mysqli_insert_id($conn);
        header("Location: disciplines.php");
        exit();
    } else {
        $content = include_template('error.php', ['error' => mysqli_error($conn)]);
    }
} else {
    $content = include_template("discipline_new.php");
}

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
