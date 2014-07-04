<?php
session_start();

function __autoload($class_name) {
	include $class_name . '.class.php';
}

if(isset($_POST['logout'])) {
	session_destroy();
	echo '<meta http-equiv="refresh" content="0;url=',$_SERVER['HTTP_REFERER'],'" />';
}

else if(isset($_POST['login'])) {
	include_once($_SERVER["DOCUMENT_ROOT"]."/connectDB.php");

	$hashed = hash("sha256", $_POST['password']);
	$email = htmlspecialchars($_POST['email']);

	$query = $db->prepare('SELECT name, id FROM users WHERE email=:email AND password=:password');
	$query->execute(array(
		email => $email,
		password => $hashed
		));
	$data = $query->fetch();

	if(isset($data['id'])) {
		//Login successful
		$_SESSION['user'] = new User($email, $data['name'], $data['id']);
		echo '<meta http-equiv="refresh" content="2;url=',$_SERVER['HTTP_REFERER'],'" />';
	}
	else {
		echo 'fail';
	}

	$query->closeCursor();
}

else {
	echo 'Not log out nor log in';
}
