<?php
echo '
<form method="post" action="addBook_Manager.php">
	<p>
		<label for="title">Title</label>: 
		<input type="text" name="title" id="title" required /><br />
		
		<label for="author">Author</label>: 
		<input type="text" name="author" id="author" required /><br />
		
		<label for="isbn10">ISBN 10</label>: 
		<input type="text" name="isbn10" id="isbn10" required /><br />
		
		<label for="isbn13">ISBN 13</label>: 
		<input type="text" name="isbn13" id="isbn13" required /><br />
		
		<input type="submit" value="Register" />
	</p>
</form>
';
?>
