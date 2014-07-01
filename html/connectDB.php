<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/settings.php");

try {
	$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_passwd);
} catch (Exception $e) {
	die('Error connecting to the database: '.$e->getMessage());
}
