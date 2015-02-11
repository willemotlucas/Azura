<?php 

class Conf
{
	static 	$debug = 1;
	static 	$databases = array(

		'default' => array(
			'host' => 'localhost',
			'login' => 'root',
			'database' => 'azura',
			'password' => ''
		)
	);

}

Router::prefix('safehouse', 'admin');

?>