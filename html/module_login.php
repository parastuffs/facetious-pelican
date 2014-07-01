<?php
echo '
<form method="post" action="loginManager.php">
	<p>
		<label for="email">Email</label>: 
		<input type="email" name="email" id="email" required /><br />
		
		<label for="password">Password</label>: 
		<input type="password" name="password" id="password" required /><br />
		
		<input type="submit" value="Log in" />
	</p>
	<p>
		<a href="register.php">Register</a>
	</p>
</form>
';
?>
