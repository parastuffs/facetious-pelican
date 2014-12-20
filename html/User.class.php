<?php

class User
{
	private $_id;
	private $_name;
	private $_email;
	private $_level;
	private $_books; //Array
	
	public function __construct($email, $name, $id)
	{
		$this->_id = $id;
		$this->_name = $name;
		$this->_email = $email;

		$this->_books = array();
	}

	//public function addBook(Book $book)
	//{
		////Add relation in db.
	//}
	
	public function getEmail()
	{
		return $this->_email;
	}
	
	public function setEmail($email)
	{
		$this->_email = $email;
	}
	
	public function getName()
	{
		return $this->_name;
	}
	
	public function setName($name)
	{
		$this->_name = $name;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function addBook($book)
	{
		// echo '<br />books init size: '.count($this->_books).'<br />';
		// echo 'Book title to add in user: \''.$book->getTitle().'\'<br />';
		if(0 == count($this->_books)) {
			$this->_books[] = $book;
		}
		else {
			array_push($this->_books, $book);
		}
		// echo '<br />books new isze: '.count($this->_books).'<br />';
		// print_r($this->_books);
	}

	public function getBooks()
	{
		return $this->_books;
	}

}
?>
