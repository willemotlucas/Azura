<?php 

class Layout {

	private $layout;
	private $css = array();
	private $js = array();

	function __construct($layout)
	{
		$this->layout = $layout;
		$this->Session = new Session();
	}

	public function setLayout($layout)
	{
		$this->layout = $layout;
	} 

	public function loadView($view, $vars)
	{
		//extract all parameters for using it in the view
		extract($vars);
		if($this->css != null)
			extract($this->css);
		if($this->js != null)
			extract($this->js);

		//include the view with her content
		ob_start();
		require $view;
		$content_for_layout = ob_get_clean();
		require(ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php');
	}


	public function addCssFile($key, $value = null)
	{
		if(is_array($key))
		{
			var_dump($key);
			$this->css += $key;
		}
		//otherwise there is only one parameter
		else
		{
			$this->css[$key] = $value;
		}
	}

	public function addJsFile($key, $value = null)
	{
		if(is_array($key))
		{
			$this->js += $key;
		}
		//otherwise there is only one parameter
		else
		{
			$this->js[$key] = $value;
		}	
	}
}

?>