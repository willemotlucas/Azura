<?php 

class Request {

	public $url; //URL called by the user
	public $page = 1;
	public $prefix = false;

	function __construct()
	{
		$this->url = str_replace(BASE_URL."/", "", $_SERVER['REQUEST_URI']);
		if(isset($_GET['page']))
		{
			if(is_numeric($_GET['page']))
			{
				if($_GET['page'] > 0)
				$this->page = round($_GET['page']);
			}
		}
	}
}

?>