<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/connectDB.php");

class User
{
	private $_id;
	private $_name;
	private $_email;
	
	public __construct($email)
	{
		//Fetch user with $mail in db.
	}
	
	public __construct($email, $name, $id)
	{
		this->$_id = $id;
		this->$_name = $name;
		this->$_email = $email;
	}
	
	public addBook(Book $book)
	{
		//Add relation in db.
	}
	
	public getEmail()
	{
		return this->$_email;
	}
	
	public setEmail($email)
	{
		this->$_email = $email;
	}
	
	public getName()
	{
		return this->name;
	}
	
	public setName($name)
	{
		this->$_name = $name;
	}

}
?>
