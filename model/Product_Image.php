<?php 

class Product_Image extends Model
{

	//If necessary, we can redefine the attribute 'table' which correspond to the database table

	public function __construct()
	{
		parent::__construct();
	}

	public function findProductImage($image_id)
	{
		$sql = 'SELECT Images.src, Images.alt FROM Images, Product_Images WHERE Images.id = ' . $image_id;
		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		return $prepare->fetchAll(PDO::FETCH_OBJ);
	}
}

 ?>