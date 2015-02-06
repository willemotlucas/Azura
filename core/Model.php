<?php 

class Model
{
	static $connections = array();
	//We can redefine the database inside a Model which extends this class.
	//Otherwise, the default database will be loaded
	public $conf = 'default';
	public $db;


	public $table = false;

	public function __construct() 
	{
		//We get the information connection from the conf.php file for the database $this->db
		$conf = Conf::$databases[$this->conf];

		//We check if database connection is already made
		//It's forbidden to make several connection. One time is enough !
		if(isset(Model::$connections[$this->conf]))
		{
			$this->db = Model::$connections[$this->conf]; 
			return true;
		}
		
		//If the database connection is not made
		//We create a new PDO object
		try
		{
			$pdo = new PDO('mysql:host=' . $conf['host'] . ';dbname=' . $conf['database'] . ';' , 
				$conf['login'] ,
				 $conf['password'], 
				 array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
			);
			
			Model::$connections[$this->conf] = $pdo;
			$this->db = $pdo;
		}
		catch(PDOEXception $e)
		{
			if($Conf::$debug >= 1)
			{
				die($e->getMessage());
			}
			else
			{
				die('Impossible de se connecter à la base de données.');
			}
		}

		//Initialisation
		if($this->table === false)
		{
			$this->table = strtolower(get_class($this)) . 's';
		}

	}

	public function find($req = null)
	{
		$sql = 'SELECT * FROM ' . $this->table . ' as ' . get_class($this) . ' ';


		//Construct the condition request
		if(isset($req['conditions']))
		{
			$sql .= 'WHERE ';
			
			if(is_array($req['conditions']))
			{
				$sql .= $req['conditions'];
			}
			else
			{
				$cond = array();
				foreach ($req['conditions'] as $k => $v)
				{
					if(!is_numeric($v))
					{
						$v = '"' . mysql_escape_string($v) . '"';
					}
					$cond[] = "$k=$v";
				}
				$sql .= implode(' AND ', $cond); 
			}
			
			$req['conditions'];
		}



		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		return $prepare->fetchAll(PDO::FETCH_OBJ);
	}

	public function findFirst($req)
	{
		return current($this->find($req));
	}

	public function findLast()
	{
		$sql = 'SELECT * FROM ' . $this->table . ' as ' . get_class($this) . ' ORDER BY id DESC LIMIT 1';
		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		return $prepare->fetch(PDO::FETCH_OBJ);
	}
}

?>