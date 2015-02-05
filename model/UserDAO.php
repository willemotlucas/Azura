<?php 

class UserDAO
{
	private $con;

	public function __construct()
	{
		$db = Database::getInstance();
		$this->con = $db->getDbh();
	}

	public function getAllUsers()
	{
		return $this->con->query("SELECT * FROM users");
	}

	public function getUserById($id)
	{
		return $this->con->query("SELECT * FROM users WHERE id = " . $id);
	}

	public function getUserByLogin($login)
	{
		return $this->con->query("SELECT * FROM users WHERE login='" . $login . "'");
	}
}

?>