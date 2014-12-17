<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/connectDB.php");

$query = $db->prepare('INSERT INTO books(title, author) VALUES(:title, :author)');
$query->execute(array(
	'title' => htmlspecialchars($_POST['title']),
	'author' => htmlspecialchars($_POST['author'])
	));

echo 'book added, so it seems';
// TODO Put this book in a, object
// TODO fetch the book back and update the object's id
// TODO INSERT into book_user
echo '<meta http-equiv="refresh" content="2;url=',$_SERVER['HTTP_REFERER'],'" />';
