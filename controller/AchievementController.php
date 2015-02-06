<?php

class AchievementController extends Controller
{
	public $AchievementDAO; 
	function view()
	{
		$this->loadModel('Achievement');
		$achievements = $this->Achievement->find();
		$this->set('achievements', $achievements);

		$this->layout->addCssFile('css', array(
			'view' => '<link href="/Azura/webroot/css/achievement/view.css" rel="stylesheet">'
			));

		$this->render('view');
	}

	function add()
	{
	}

	function edit($id)
	{
		$this->render('edit');
	}

	function delete($id)
	{
	}

}

?>