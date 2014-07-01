<?php
echo '
<form method="post" action="registerManager.php">
	<p>
		<label for="name">Name</label>: 
		<input type="text" name="name" id="name" required /><br />
		
		<label for="email">Email</label>: 
		<input type="email" name="email" id="email" required /><br />
		
		<label for="password">Password</label>: 
		<input type="password" name="password" id="password" required /><br />
		
		<label for="passwordCheck">Password again</label>: 
		<input type="password" name="passwordCheck" id="passwordCheck" placeholder="Not implemented"/><br />
		
		<input type="submit" value="Register" />
	</p>
</form>
';
?>
