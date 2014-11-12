<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/connectDB.php");

$query = $db->prepare('INSERT INTO users(name, password, email) VALUES(:name, :password, :email)');
$query->execute(array(
	'name' => "test_user",
	'password' => hash("sha256", "test_password"),
	'email' => "test@mail.com"
	));

echo 'User inserted. I guess.';
