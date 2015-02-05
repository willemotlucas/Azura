<?php 

class Request {

	public $url; //URL called by the user

	function __construct()
	{
		$this->url = str_replace(BASE_URL."/", "", $_SERVER['REQUEST_URI']);
	}
}

?>