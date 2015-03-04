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
		$sql = 'SELECT Brands.id, name, products_type, url, Images.src, Images.alt FROM Brands, Images, Logos WHERE Brands.id = Logos.Brands_id AND Images.id = Logos.Images_id AND Brands.online=1';
		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		return $prepare->fetchAll(PDO::FETCH_OBJ);
	}
}

 ?>