<?php 

class Product extends Model
{

	//If necessary, we can redefine the attribute 'table' which correspond to the database table
	public $table = 'products';

	public function __construct()
	{
		parent::__construct();
	}

	public function findProductsWithImage()
	{
		$sql = "SELECT P.id, P.name, P.reference, P.description, P.num_order, P.online, I.src, I.alt FROM Products P, Product_Image PI WHERE P.Product_image_id = PI.id AND";

		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		return $prepare->fetchAll(PDO::FETCH_OBJ);
	}
}

 ?>