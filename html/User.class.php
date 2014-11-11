<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/connectDB.php");

class User
{
	private $_id;
	private $_name;
	private $_email;
	
	public function __construct($email, $name, $id)
	{
		$this->_id = $id;
		$this->_name = $name;
		$this->_email = $email;
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

}
?>
