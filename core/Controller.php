<?php 

class Controller {

	public $resquest;
	private $vars = array();
	private $css = array();
	private $js = array();
	public $layout;
	private $rendered = false;

	function __construct($request)
	{
		$this->layout = new Layout('default');
		$this->request = $request;
	}

	public function render($view)
	{
		//if the view is alreadey rendered
		if($this->rendered)
		{
			return false;
		}

		//otherwise display the view

		//if it's a 404 error, we load the path of a 404 error view
		if(strpos($view, '/') === 0)
		{
			$view = ROOT.DS.'view'.DS.'errors'.DS.'404.php';
		}

		//otherwise we build the path of the view
		else
		{
			$view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
		}

		//Load the layout including the view
		$this->layout->loadView($view, $this->vars, $this->css);
		
		//to indicate that the view is rendered once
		$this->rendered = true;
	}

	public function set($key, $value = null)
	{
		//to set parameters inside a view

		//if there are several parameters
		if(is_array($key))
		{
			$this->vars += $key;
		}
		//otherwise there is only one parameter
		else
		{
			$this->vars[$key] = $value;
		}
	}
}

?>