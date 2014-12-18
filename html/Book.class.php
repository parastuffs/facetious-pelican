<?php

class Book
{
	private $_title;
	private $_id;
	private $_author;
	private $_year;
	private $_pages;
	private $_publisher;
	private $_isbn13;
	private $_isbn10;
	private $_cover;
	
	public function __construct($id, $title, $author, $isbn10, $isbn13)
	{
		$this->_id 		= $id;
		$this->_title 	= $title;
		$this->_author 	= $author;
		$this->_isbn10 	= $isbn10;
		$this->_isbn13 	= $isbn13;
	}

	public function getTitle()
	{
		return $this->_title;
	}

	public function getAuthor()
	{
		return $this->_author;
	}
	
}
?>