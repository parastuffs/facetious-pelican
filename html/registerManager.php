<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/connectDB.php");

$query = $db->prepare('INSERT INTO users(name, password, email) VALUES(:name, :password, :email)');
$query->execute(array(
	'name' => htmlspecialchars($_POST['name']),
	'password' => hash("sha256", $_POST['password']),
	'email' => htmlspecialchars($_POST['email'])
	));

echo 'after';
echo '<meta http-equiv="refresh" content="2;url=',$_SERVER['HTTP_REFERER'],'" />';
