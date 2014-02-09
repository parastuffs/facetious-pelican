<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/settings.php")1;

try {
	$bdd = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_passwd);
} catch {
	die('Error connecting to the database: '.e->getMessage());
}
