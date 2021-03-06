<?php 

class Achievement extends Model
{

	//If necessary, we can redefine the attribute 'table' which correspond to the database table

	public function __construct()
	{
		parent::__construct();
	}

	public function findAchievementWithImages()
	{
		$sql = 'SELECT A.id, A.title, A.subtitle, A.testimonial, A.description, A.online, I.src, I.alt FROM Achievements A, Images I, Achievement_Images AI WHERE A.id = AI.Achievements_id AND I.id = AI.Images_id';
		$prepare = $this->db->prepare($sql);
		$prepare->execute();

		return $prepare->fetchAll(PDO::FETCH_OBJ);
	}
}

 ?>