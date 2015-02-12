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

	function admin_list($msg = null)
	{
		$this->layout->setLayout('admin');
		$this->loadModel('Achievement');
		$achievements = $this->Achievement->find(array(
			'order' => 'id',
			'way' => 'DESC'
			)
		);

		$this->set('msg', $msg);
		$this->set('achievements', $achievements);

		//load the view and display it for the user
		$this->render('admin_list');
	}

	function admin_add()
	{
		$this->layout->setLayout('admin');

		//We receive the formular to save a new achievement into the database
		if(isset($_POST['submit']))
		{
			if(verifyField($_POST, 'title', array('empty' => 'no', 'maxLength' => 45)) && 
				verifyField($_POST, 'subtitle', array('maxLength' => 45)))
			{
			
/*				$achievement->title = htmlspecialchars($_POST['title']);
				$achievement->subtitle = htmlspecialchars($_POST['subtitle']);
				$achievement->description = htmlspecialchars($_POST['description']);
				$achievement->testimonial = htmlspecialchars($_POST['testimonial']);
				$achievement->online = $_POST['online'] == 'yes' ? 1 : 0;*/

				$msg = array('success' => 'Bravo ! Vous avez ajouté une nouvelle réalisation !');

				$this->admin_list($msg);
			}
			else
			{
				die('Erreur lors de la vérification');
			}
		}
		//We have to display formular to add a new achievement
		else
		{
			$this->layout->addJsFile('js', array(
				'validator' => '<script src="' . BASE_URL . '/webroot/js/vendor/validator.min.js"></script>'
			));

			$this->render('admin_add');
		}
	}

	function admin_edit($id)
	{
		$this->layout->setLayout('admin');
		$this->loadModel('Achievement');
		$achievement = $this->Achievement->find(array(
			'conditions' => 'id=' . $id
			)
		);

		$this->set('achievement', $achievement[0]);



		$this->layout->addJsFile('js', array(
			'validator' => '<script src="' . BASE_URL . '/webroot/js/vendor/validator.min.js"></script>'
			));
		$this->render('admin_edit');
	}

	function admin_delete($id)
	{
	}

}

?>