<?php 

require_once(ROOT.DS.'model'.DS.'AchievementDAO.php');

class PageController extends Controller
{
	function index()
	{
		//$AchievementDAO = new AchievementDAO();
		//$AchievementDAO->getLastAchievement()->fetch();
		
		// set the parameters from the database inside the view
		//$this->set('achievement', $AchievementDAO->getLastAchievement()->fetch());
		
		// set the css and js files for the specific view
		$this->layout->addCssFile('css', array(
			'index' => '<link href="/Azura/webroot/css/page/index.css" rel="stylesheet">'
		));
		$this->layout->addJsFile('js', array(
			'index' => '<script src="/Azura/webroot/js/page/page.js"></script>'
		));

		$this->loadModel('Achievement');
		$achievement = $this->Achievement->findFirst(array(
			'conditions' => 'id=1')
		);

		 //$this->set('achievement', $achievement);

		//load the view and display it for the user
		$this->render('index');
	}

	function contact()
	{
		$this->layout->addCssFile('css', array(
			'contact' => '<link href="/Azura/webroot/css/page/contact.css" rel="stylesheet">'
		));
		$this->layout->addJsFile('js', null);

		$this->render('contact');
	}

	function admin()
	{
		$this->layout->addCssFile('css', array(
			'login' => '<link href="/Azura/webroot/css/page/login.css" rel="stylesheet">'));
		$this->layout->addJsFile('js', null);
		$this->render('login');
	}
}
?>