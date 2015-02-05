<?php 

public class User 
{
	private $id;
	private $login;
	private $password;

	function __construct($id, $login, $password)
	{
		$this->id = $id;
		$this->login = $login;
		$this->password = $password;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getLogin()
	{
		return $this->login;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setLogin($login)
	{
		$this->title = $title;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}
}

 ?>