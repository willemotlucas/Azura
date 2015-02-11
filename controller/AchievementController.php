<?php

class AchievementController extends Controller
{
	function view()
	{
		$perPage = 3;

		$this->loadModel('Achievement');
		
		$params['achievements'] = $this->Achievement->find(
			array(
				'limit' => ($perPage * ($this->request->page-1)) . ',' . $perPage,
				'conditions' => 'online=1'
			)
		);
		$params['total'] = $this->Achievement->findCount(
			array(
				'online' => '1'
			)
		);

		if($this->request->page > $params['total'])
		{
			$this->e404();
		}
		else
		{
			$params['page'] = ceil($params['total']/$perPage);
			$this->set($params);

			$this->layout->addCssFile('css', array(
				'view' => '<link href="' .BASE_URL. '/webroot/css/achievement/view.css" rel="stylesheet">'
				));

			$this->render('view');
		}
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