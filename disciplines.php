<?php
require_once('init.php');
require('helpers.php');

check_auth();
$user = $_SESSION['user'];

$sql = "SELECT * FROM disciplines ORDER BY name";
$res = mysqli_query($conn, $sql);
$disciplines = mysqli_fetch_all($res, MYSQLI_ASSOC);

$content = include_template("disciplines.php", [
  "user" => $user,
  "disciplines" => $disciplines
]);

print include_template('layout.php', [
	'user' => $user,
	'content' => $content
]);
