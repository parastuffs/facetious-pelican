<?php

if(isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	$user_books = $user->getBooks();
	// TODO Make a table for this shit
	foreach($user_books as $book) {
		echo $book->getTitle().', from '.$book->getAuthor().'<br />';
	}
}
else {
	echo '
		<p>Log in to see your books</p>
	';
}
?>
