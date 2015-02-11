<?php 

class PageController extends Controller
{
	function index()
	{
		$this->loadModel('Achievement');
		$achievement = $this->Achievement->findLast();

		$this->loadModel('Brand');
		$brands = $this->Brand->findBrandWithLogo();
		$nbBrands = count($brands);
		$nbLines = ceil($nbBrands/4);
		$nbBrandsLastLine = $nbBrands%4;
		$nbBrandsLastLine == 0 ? $nbBrandsLastLine = 4 : $nbBrandsLastLine = $nbBrandsLastLine;
		
		$this->set('brands', $brands);
		$this->set('nbLines', $nbLines);
		$this->set('nbBrandsLastLine', $nbBrandsLastLine);
		$this->set('achievement', $achievement);
		// set the css and js files for the specific view
		
		$this->layout->addCssFile('css', array(
			'index' => '<link href="' .BASE_URL. '/webroot/css/page/index.css" rel="stylesheet">'
		));
		$this->layout->addJsFile('js', array(
			'index' => '<script src="' .BASE_URL. '/webroot/js/page/page.js"></script>'
		));

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

	function service()
	{
		$this->layout->addCssFile('css', array(
			'service' => '<link href="' .BASE_URL. '/webroot/css/page/service.css" rel="stylesheet">'
		));
		$this->render('service');
	}

	function admin()
	{
		$this->layout->addCssFile('css', array(
			'login' => '<link href="' .BASE_URL. '/webroot/css/page/login.css" rel="stylesheet">'));
		
		$this->render('login');
	}
}
?>