<?php 

class Dispatcher {

	var $request;

	function __construct(){
		$this->request = new Request();
		Router::parse($this->request->url, $this->request);
		$controller = $this->loadController();
		$action = $this->request->action;
		if($this->request->prefix)
		{
			$action = $this->request->prefix . '_' . $action;
		}
		
		//404 Error if unknown controller
		if(!in_array($action, array_diff(get_class_methods($controller), get_class_methods('Controller'))))
		{
			$this->error('Le controller ne dispose pas de cette action');
		}

		//call the controller with specified action in the URL and optional parameters
		call_user_func_array(array($controller, $action), $this->request->params);
		
		//load the view of controller action
		$controller->render($action);
	}

	function error($message)
	{
		$controller = new Controller($this->request);
		$controller->e404($message);
	}

	function loadController()
	{
		$name = ucfirst($this->request->controller).'Controller'; //Take the controller name
		$file = ROOT.DS.'controller'.DS.$name.'.php'; //Take the path of file controller
		if(realpath($file))
		{
			require $file; //include the controller
			$controller = new $name($this->request); //create an instance of this controller
			return $controller;
		}
		else
		{
			$this->error("Page introuvable");
		}
	}
}

?>