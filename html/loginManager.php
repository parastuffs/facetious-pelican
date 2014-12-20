<?php
session_start();

include_once($_SERVER["DOCUMENT_ROOT"]."/connectDB.php");
function loadClass($className) {
	require $_SERVER["DOCUMENT_ROOT"]."/".$className.'.class.php';
}

spl_autoload_register('loadClass');

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
		'email' => $email,
		'password' => $hashed
		));
	$data = $query->fetch();

	if(isset($data['id'])) {
		//Login successful
		$user_id = $data['id'];
		$_SESSION['user'] = new User($email, $data['name'], $user_id);
		echo '<meta http-equiv="refresh" content="2;url=',$_SERVER['HTTP_REFERER'],'" />';

		// ----------
		// Load user's books
		// ----------
		$query = $db->prepare('SELECT b.id, b.title, b.author, b.year, b.pages, b.publisher, b.isbn13, b.isbn10, b.cover
								 FROM books b, users u, book_user bu 
								 WHERE u.id=:user_id and bu.user_id=u.id and bu.book_id=b.id
								 ORDER BY b.author ASC');
		$query->execute(array(
			'user_id' => $user_id
			));

		// Create objects
		while($data = $query->fetch()) {
			$book = new Book($data['id'], $data['title'], $data['author'], $data['isbn10'], $data['isbn13']);
			$book->setYear($data['year']);
			$book->setPublisher($data['publisher']);
			$book->setCover($data['cover']);
			$book->setPages($data['pages']);

			$_SESSION['user']->addBook($book);
		}
	}
	else {
		echo 'fail';
	}

	$query->closeCursor();
}

else {
	echo 'Not log out nor log in';
}
