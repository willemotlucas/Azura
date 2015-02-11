<?php 

class Brand extends Model
{

	//If necessary, we can redefine the attribute 'table' which correspond to the database table

	public function __construct()
	{
		parent::__construct();
	}

	public function findBrandWithLogo()
	{
		$sql = 'SELECT name, products_type, url, src FROM Brands, Images WHERE Brands.logo_id = Images.id';
		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		return $prepare->fetchAll(PDO::FETCH_OBJ);
	}
}

 ?>