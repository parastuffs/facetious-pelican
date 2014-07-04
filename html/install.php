<?php

//include_once($_SERVER["DOCUMENT_ROOT"]."/settings.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/connectDB.php");

$createStr = 'CREATE TABLE users
	(id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	password CHAR(64) NOT NULL,
	email VARCHAR(255) NOT NULL,
	PRIMARY KEY(id)
) ';

$answer = $db->query($createStr);

$createStr = 'CREATE TABLE books
	(id INT NOT NULL AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL,
	author VARCHAR(255) NOT NULL,
	year YEAR,
	pages INT,
	publisher VARCHAR(255),
	isbn13 CHAR(13) NOT NULL UNIQUE,
	isbn10 CHAR(10) NOT NULL UNIQUE,
	cover VARCHAR(255),
	PRIMARY KEY(id)
) ';

$answer = $db->query($createStr);

$createStr = 'CREATE TABLE book_user
	(user_id INT NOT NULL,
	book_id INT NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE ON UPDATE CASCADE
) ';

$answer = $db->query($createStr);
