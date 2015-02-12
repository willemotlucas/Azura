<?php 

class Model
{
	static $connections = array();
	//We can redefine the database inside a Model which extends this class.
	//Otherwise, the default database will be loaded
	public $conf = 'default';
	public $db;


	public $table = false;
	public $primaryKey = 'id';

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
		$sql = 'SELECT ';

		if(isset($req['fields']))
		{
			if(is_array($req['fields']))
			{
				$sql .= implode(', ' , $$req['fields']);
			}
			else
			{
				$sql .= $req['fields'];
			}
		}
		else
		{
			$sql .= ' * ';
		}

		$sql .=  ' FROM ' . $this->table . ' as ' . get_class($this) . ' ';

		//Construct the condition request
		if(isset($req['conditions']))
		{
			$sql .= 'WHERE ';

			if(!is_array($req['conditions']))
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
						$v = '"' . mysql_real_escape_string($v) . '"';
					}
					$cond[] = "$k=$v";
				}
				$sql .= implode(' AND ', $cond); 
			}
			
			$req['conditions'];
		}

		if(isset($req['limit']))
		{
			$sql .= ' LIMIT ' . $req['limit'];			
		}

		if(isset($req['order']))
		{
			$sql .= ' ORDER BY ' . $req['order'];
		
			if(isset($req['way']))
			{
				$sql .= ' ' . $req['way'];
			}
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
		$sql = 'SELECT * FROM ' . $this->table . ' as ' . get_class($this) . ' WHERE online=1 ORDER BY id DESC LIMIT 1';
		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		return $prepare->fetch(PDO::FETCH_OBJ);
	}

	public function findCount($conditions = null)
	{
		$res = $this->findFirst(array(
			'fields' => 'COUNT('.$this->primaryKey.') as count',
			'conditions' => $conditions
			)
		);

		return $res->count;
	}

	public function delete($id)
	{
		$sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . '=' . $id;
		$this->db->query($sql);
	}
}

?>