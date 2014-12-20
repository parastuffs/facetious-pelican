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

	public function setTitle($title)
	{
		$this->_title = $title;
	}

	public function getTitle()
	{
		return $this->_title;
	}

	public function setAuthor($author)
	{
		$this->_author = $author;
	}

	public function getAuthor()
	{
		return $this->_author;
	}

	public function setCover($cover)
	{
		$this->_cover = $cover;
	}

	public function getCover()
	{
		return $this->_cover;
	}

	public function setPages($pages)
	{
		$this->_pages = $pages;
	}

	public function getPages()
	{
		return $this->_pages;
	}

	public function setYear($year)
	{
		$this->_year = $year;
	}

	public function getYear()
	{
		return $this->_year;
	}

	public function setPublisher($publisher)
	{
		$this->_publisher;
	}

	public function getPublisher()
	{
		return $this->_publisher;
	}

}
?>