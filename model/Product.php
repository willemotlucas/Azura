<?php 

class Product extends Model
{

	//If necessary, we can redefine the attribute 'table' which correspond to the database table
	public $table = 'products';

	public function __construct()
	{
		parent::__construct();
	}

	public function findProductsWithImages()
	{
		$sql = "SELECT P.id, P.name, P.reference, P.description, P.num_order, P.online, I.src, I.alt FROM Products P, Images I, Product_Images PI WHERE P.id = PI.Products_id AND I.id = PI.Images_id";

		debug($sql);

		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		return $prepare->fetchAll(PDO::FETCH_OBJ);
	}
}

 ?>