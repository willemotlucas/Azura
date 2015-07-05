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
				'conditions' => 'online=1',
				//'group' => 'id',
				'order' => 'id',
				'way' => 'DESC'
			)
		);

		$this->loadModel('Achievement_Image');
		$images = array();

		foreach ($params['achievements'] as $achievement) 
		{
			$images = $this->Achievement_Image->find(
				array(
					'conditions' => 'Achievements_id = ' .  $achievement->id
				)
			);

			if(!empty($images))
			{
				$achievement->images = $images;
			}
		}

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
		$this->loadModel('Achievement');

		//We receive the formular to save a new achievement into the database
		if($this->request->data)
		{
			$data = $this->request->data;
			$data->title = htmlspecialchars($data->title);
			$data->subtitle = htmlspecialchars($data->subtitle);
			$data->description = htmlspecialchars($data->description);
			$data->testimonial = htmlspecialchars($data->testimonial);
			$data->online == 'yes' ? $this->request->data->online = 1 : $this->request->data->online = 0;
			
			if(verifyField($data, 'title', array('empty' => 'no', 'maxLength' => 45)) && 
				verifyField($data, 'subtitle', array('maxLength' => 45)))
			{
				if($this->Achievement->save($data))
				{
					$msg = 'Bravo ! Vous avez ajouté une nouvelle réalisation !';
					$this->layout->Session->setFlash($msg);
					$this->redirect('/Azura/safehouse/achievement/list');
				}
			}

			$msg = 'Ouups ! Une erreur est survenu lors de l\'enregistrement de la réalisation. Veuillez réessayer ou contacter l\'administrateur.';
			$this->layout->Session->setFlash($msg, 'error');

			$this->redirect('/Azura/safehouse/achievement/list');
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

	function admin_edit($id = null)
	{
		$this->loadModel('Achievement');
		$this->layout->setLayout('admin');
		
		//If data are sended by post action, the request object catch them
		if($this->request->data)
		{
			$data = $this->request->data;
			$data->title = htmlspecialchars($data->title);
			$data->subtitle = htmlspecialchars($data->subtitle);
			$data->description = htmlspecialchars($data->description);
			$data->testimonial = htmlspecialchars($data->testimonial);
			$data->online == 'yes' ? $this->request->data->online = 1 : $this->request->data->online = 0;
			if(verifyField($data, 'title', array('empty' => 'no', 'maxLength' => 45)) &&
			 verifyField($data, 'subtitle', array('maxLength' => 45)))
			{

				if($this->Achievement->save($data))
				{
					$msg = 'La réalisation a bien été mise à jour.';
					$this->layout->Session->setFlash($msg);

					$this->redirect('/Azura/safehouse/achievement/list');
				}
			}
			else
			{
				$msg = 'Une erreur est survenue, la réalisation n\'a pas été mise à jour. Veuilez réessayer ou contacter l\'administrateur.';
				$this->layout->Session->setFlash($msg, 'danger');

				$this->redirect('/Azura/safehouse/achievement/list');
			}
		}
		else
		{
			$achievement = $this->Achievement->findFirst(array(
				'conditions' => 'id=' . $id
				)
			);

			if(empty($achievement))
			{
				$this->admin_e404();
			}

			$this->set('achievement', $achievement);

			$this->layout->addJsFile('js', array(
				'validator' => '<script src="' . BASE_URL . '/webroot/js/vendor/validator.min.js"></script>'
				));
			$this->render('admin_edit');
		}
	}

	function admin_delete($id)
	{
		$this->loadModel('Achievement');
		$this->Achievement->delete($id);
		$msg = 'La réalisation a bien été supprimée.';
		$this->layout->Session->setFlash($msg);
		
		$this->redirect('/Azura/safehouse/achievement/list');
	}

}

?>