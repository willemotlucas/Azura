<?php

require_once(ROOT.DS.'model'.DS.'AchievementDAO.php');

class AchievementController extends Controller
{
	public $AchievementDAO; 
	function view()
	{
		$AchievementDAO = new AchievementDAO();
		
		$this->set('achievements', $AchievementDAO->getAllAchievements()->fetchAll());
		$this->layout->addCssFile('css', array(
			'view' => '<link href="/Azura/webroot/css/achievement/view.css" rel="stylesheet">'
			));
		$this->layout->addJsFile('js', null);

		$this->render('view');
	}

	function add()
	{
	}

	function edit($id)
	{
		$AchievementDAO = new AchievementDAO();
		$this->set('achievement', $AchievementDAO->getAchievementById($id)->fetch());

		$this->render('edit');
	}

	function delete($id)
	{
	}

}

?>