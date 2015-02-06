<?php 

class PageController extends Controller
{
	function index()
	{
		// set the css and js files for the specific view
		$this->layout->addCssFile('css', array(
			'index' => '<link href="' .BASE_URL. '/webroot/css/page/index.css" rel="stylesheet">'
		));
		$this->layout->addJsFile('js', array(
			'index' => '<script src="' .BASE_URL. '/webroot/js/page/page.js"></script>'
		));

		$this->loadModel('Achievement');
		$achievement = $this->Achievement->findLast();

		 $this->set('achievement', $achievement);

		//load the view and display it for the user
		$this->render('index');
	}

	function contact()
	{
		$this->layout->addCssFile('css', array(
			'contact' => '<link href="' .BASE_URL. '/webroot/css/page/contact.css" rel="stylesheet">'
		));

		$this->render('contact');
	}

	function admin()
	{
		$this->layout->addCssFile('css', array(
			'login' => '<link href="' .BASE_URL. '/webroot/css/page/login.css" rel="stylesheet">'));
		
		$this->render('login');
	}
}
?>