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

	public function saveImage($img)
	{
		$sql = 'INSERT INTO Product_image(src) VALUES("' . $img . '")';
		$prepare = $this->db->prepare($sql);
		$prepare->execute();
		$sql = 'SELECT id FROM Product_image WHERE src="' . $img . '"';
		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		$id = $prepare->fetchAll(PDO::FETCH_OBJ);
		return $id[0]->id;
	}

/*	public function updateLogo($id, $src)
	{
		$sql = 'UPDATE Brand_Logo SET src="' . $src .'" WHERE id = ' . $id;
		$prepare = $this->db->prepare($sql);
		$prepare->execute();
	}*/

	public function findImageIdWithProductId($id_product)
	{
		$sql = 'SELECT Product_image_id FROM Products WHERE id = ' . $id_product;
		$prepare = $this->db->prepare($sql);
		$prepare->execute();
		$res = $prepare->fetchAll(PDO::FETCH_OBJ);
		$id = $res[0]->Product_image_id;
		return $this->findImage($id);
	}

	public function findImage($id)
	{
		$sql = 'SELECT id, src, alt FROM Product_image WHERE id = ' . $id;
		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		$img = $prepare->fetchAll(PDO::FETCH_OBJ);
		return $img[0];
	}

	public function deleteImage($id)
	{
		$sql = 'DELETE FROM Product_image WHERE id = ' . $id;
		$prepare = $this->db->prepare($sql);
		$prepare->execute();
	}

	public function findWithKeyWords($keywords)
	{
		$sql = "SELECT * FROM Products WHERE name LIKE '%" . $keywords . "%'";
		$prepare = $this->db->prepare($sql);
		$prepare->execute();
		return $prepare->fetchAll(PDO::FETCH_OBJ);
	}
}

 ?>