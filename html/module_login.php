<?php
session_start();

function __autoload($class_name) {
	include $class_name . '.class.php';
}

if(isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
		echo '
		O HAI ',$user->getName(),'
		<br />
		<form method="post" action="loginManager.php">
			<input type="submit" value="Log out" />
			<input type="hidden" value="true" name="logout" />
		</form>
	';
}
else {
	echo '
	<form method="post" action="loginManager.php">
		<p>
			<label for="email">Email</label>: 
			<input type="email" name="email" id="email" required /><br />
			
			<label for="password">Password</label>: 
			<input type="password" name="password" id="password" required /><br />
			<input type="hidden" name="login" value="true" />
			<input type="submit" value="Log in" />
		</p>
		<p>
			<a href="register.php">Register</a>
		</p>
	</form>
	';
}
?>
