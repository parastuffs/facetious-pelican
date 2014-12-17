<?php
echo '
<form method="post" action="addBook_Manager.php">
	<p>
		<label for="title">Title</label>: 
		<input type="text" name="title" id="title" required /><br />
		
		<label for="author">Author</label>: 
		<input type="text" name="author" id="author" required /><br />
		
		<input type="submit" value="Register" />
	</p>
</form>
';
?>
