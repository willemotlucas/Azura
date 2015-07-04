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
		$sql = 'SELECT Brands.id, name, products_type, description, url, Brand_logo.src, Brand_logo.alt FROM Brands, Brand_logo WHERE Brands.Logo_id = Brand_logo.id AND Brands.online=1';
		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		return $prepare->fetchAll(PDO::FETCH_OBJ);
	}

	public function saveLogo($logo)
	{
		$sql = 'INSERT INTO Brand_logo(src) VALUES("' . $logo . '")';
		$prepare = $this->db->prepare($sql);
		$prepare->execute();
		$sql = 'SELECT id FROM Brand_logo WHERE src="' . $logo . '"';
		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		$id = $prepare->fetchAll(PDO::FETCH_OBJ);
		return $id[0]->id;
	}

	public function deleteLogo($id)
	{
		$sql = 'DELETE FROM Brand_Logo WHERE id = ' . $id;
		$prepare = $this->db->prepare($sql);
		$prepare->execute();
	}
}

 ?>