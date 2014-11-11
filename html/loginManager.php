<?php
session_start();

include_once($_SERVER["DOCUMENT_ROOT"]."/connectDB.php");
function loadClass($className) {
	echo 'Loading class \''.$className.'\'.';
	require $_SERVER["DOCUMENT_ROOT"]."/".$className.'.class.php';
	echo 'Class loaded.';
}

spl_autoload_register('loadClass');

function backToPrevious($time) {
	echo '<meta http-equiv="refresh" content="',$time,';url=',$_SERVER['HTTP_REFERER'],'" />';
}

$query = $db->prepare('SELECT * FROM users WHERE email=?');
if($query->execute(array($_POST['email']))) {
	while($row = $query->fetch()) {
		if(hash("sha256", $_POST['password']) == $row['password']) {
			echo 'Login successful<br />';
			//echo "name: ".$row['name']."<br />";
			//echo "email: ".$row['email']."<br />";
			//echo "id: ".$row['id']."<br />";
			$user = new User($row['email'], $row['name'], $row['id']);
			echo 'User created.<br />';
			echo 'user name: '.$user->getName().'<br />';
			echo 'user email: '.$user->getEmail().'<br />';
			$_SESSION['user'] = $user;
			echo 'From session: user name: '.$_SESSION['user']->getName().'<br />';
			$_SESSION['loggedin'] = true;
		}
		else {
			echo 'Wrong password';
		}
	}
}
else {
	echo 'Wrong email';
}

backToPrevious(2);


