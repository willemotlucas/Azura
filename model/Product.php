<?php 

class Product extends Model
{

	//If necessary, we can redefine the attribute 'table' which correspond to the database table
	public $table = 'products';

	public function __construct()
	{
		parent::__construct();
	}
}

 ?>