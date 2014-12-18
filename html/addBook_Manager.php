<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/connectDB.php");
function loadClass($className) {
	echo 'Loading class \''.$className.'\'.';
	require $_SERVER["DOCUMENT_ROOT"]."/".$className.'.class.php';
	echo 'Class loaded.';
}

spl_autoload_register('loadClass');

session_start();//The session start needs to be _after_ the autoload function. If not, the User object will be badly reconstructed from the $_SESSION variable.

// TODO check if ISBN10 is 10 digits long.
$isbn10 	= htmlspecialchars($_POST['isbn10']);
$isbn13		= htmlspecialchars($_POST['isbn13']);
$title		= htmlspecialchars($_POST['title']);
$author		= htmlspecialchars($_POST['author']); 

// ------------------------------------------------------------------
// Checking if the book is already in the database using the isbn-10
// ------------------------------------------------------------------
$query = $db->prepare('SELECT id FROM books WHERE isbn10=:isbn10');
$query->execute(array(
	'isbn10' => $isbn10
	));
$data = $query->fetch();

if(isset($data['id'])) {
	echo 'This book already exists.<br />';
}
else {
// -------------------------------------
// Inserting the book in the database
// -------------------------------------
	$query = $db->prepare('INSERT INTO books(title, author, isbn10, isbn13) VALUES(:title, :author, :isbn10, :isbn13)');
	$query->execute(array(
		'title' => $title,
		'author' => $author,
		'isbn10' => $isbn10,
		'isbn13' => $isbn13
		));

	echo 'book added, so it seems';

	$query = $db->prepare('SELECT id FROM books WHERE isbn10=:isbn10');
	$query->execute(array(
		'isbn10' => $isbn10
		));
	$data = $query->fetch();
	$bookId = $data['id'];

	$book = new Book($bookId, $title, $author, $isbn10, $isbn13);
	$_SESSION['user']->addBook($book);
	$user_books = $_SESSION['user']->getBooks();
	echo $user_books[0]->getTitle();

// -----------------------------------------------
// Inserting user - book relation in the database
// -----------------------------------------------
	$query = $db->prepare('INSERT INTO book_user(user_id, book_id) VALUES(:user_id, :book_id)');
	$query->execute(array(
		'user_id' => $_SESSION['user']->getId(),
		'book_id' => $bookId
		));

}
// TODO Put this book in a, object
// TODO fetch the book back and update the object's id
// TODO INSERT into book_user
echo '<meta http-equiv="refresh" content="2;url=',$_SERVER['HTTP_REFERER'],'" />';
