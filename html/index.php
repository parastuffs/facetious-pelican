<?php
require 'User.class.php';
require 'Book.class.php';
session_start();
echo '
<html>
<head>
	<link rel="stylesheet" href="css/main.css" />
	<meta charset="utf-8" />
	<title>One Facetious Pelican</title>
</head>
<body>
	<div id="wrapper">
		<div id="header"></div>
';

include($_SERVER["DOCUMENT_ROOT"]."/mainMenu.php");

echo '
		<div id="body">
';

include($_SERVER["DOCUMENT_ROOT"]."/module_login.php");

echo '
			<div id="book_list">
';

include($_SERVER["DOCUMENT_ROOT"]."/module_book_list.php");


echo '
		</div>
		<div id="footer">
';

include($_SERVER["DOCUMENT_ROOT"]."/footer.php");

echo '
		</div>
	</div>
</body>
</html>
';


?>
