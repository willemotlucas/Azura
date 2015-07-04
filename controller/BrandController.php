<?php 

class BrandController extends Controller
{
	function view($id)
	{
		$this->loadModel('Brand');
		$req = array(
				'conditions' => 'id=' . $id
				);
		$brand = $this->Brand->find($req);

		if(empty($brand))
		{
			$this->e404();
		}

		$this->loadModel('Product');
/*		$req = array(
				'conditions' => 'Brands_id=' . $id,
				'order' => 'num_order'
				);*/
		$products = $this->Product->findProductsWithImages();
		$nbProducts = $this->Product->findCount();
		$nbLines = ceil($nbProducts/4);
		$nbProductsLastLine = $nbProducts%4;

		debug($products);

		$this->set('brand', $brand[0]);
		$this->set('products', $products);
		$this->set('nbProductsLastLine', $nbProductsLastLine);
		$this->set('nbLines', $nbLines);

		// set the css and js files for the specific view
		$this->layout->addCssFile('css', array(
			'view' => '<link href="' .BASE_URL. '/webroot/css/brand/view.css" rel="stylesheet">'
		));

		//load the view and display it for the user
		$this->render('view');
	}

	function admin_list()
	{
		$this->layout->setLayout('admin');
		$this->loadModel('Brand');
		$brands = $this->Brand->find();

		$this->set('brands', $brands);


		//load the view and display it for the user
		$this->render('admin_list');
	}

	function admin_delete($id)
	{
		$this->loadModel('Brand');
		// $this->Brand->delete($id);
		
		$msg = 'La marque a bien été supprimée.';
		$this->layout->Session->setFlash($msg);

		$this->redirect('/Azura/safehouse/brand/list');
	}

	function admin_add()
	{
		$this->loadModel('Brand');
		$this->layout->setLayout('admin');

		if($this->request->data)
		{
			$data = $this->request->data;
			$data->name = htmlspecialchars($data->name);
			$data->description = htmlspecialchars($data->description);
			$data->url = htmlspecialchars($data->url);
			$data->products_type = htmlspecialchars($data->products_type);
			$data->Logo_id = htmlspecialchars($data->Logo_id);
			$data->online == 'yes' ? $this->request->data->online = 1 : $this->request->data->online = 0;

			//Add fields verifying + adding in database and throwing errors
			if(verifyField($data, 'name', array('empty' => 'no', 'maxLength' => 45))
			&& verifyField($data, 'description', array('empty' => 'no')))
			{
				if($this->Achievement->save($data))
				{
					$msg = 'Bravo ! Vous avez ajouté une nouvelle marque !';
					$this->layout->Session->setFlash($msg);
					$this->redirect('/Azura/safehouse/brand/list');
				}
			}

			$msg = 'Ouups ! Une erreur est survenu lors de l\'enregistrement de la marque. Veuillez réessayer ou contacter l\'administrateur.';
			$this->layout->Session->setFlash($msg, 'error');

			$this->redirect('/Azura/safehouse/brand/list');			
		}
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
		$this->loadModel('Brand');
		$this->layout->setLayout('admin');

		if($this->request->data)
		{
			$data = $this->request->data;
			$data->name = htmlspecialchars($data->name);
			$data->description = htmlspecialchars($data->description);
			$data->url = htmlspecialchars($data->url);
			$data->products_type = htmlspecialchars($data->products_type);
			$data->Logo_id = htmlspecialchars($data->Logo_id);
			$data->online == 'yes' ? $this->request->data->online = 1 : $this->request->data->online = 0;

			//Add fields verifying + adding in database and throwing errors
			if(verifyField($data, 'name', array('empty' => 'no', 'maxLength' => 45))
			&& verifyField($data, 'description', array('empty' => 'no')))
			{
				if($this->Achievement->save($data))
				{
					$msg = 'Bravo ! Vous avez ajouté une nouvelle marque !';
					$this->layout->Session->setFlash($msg);
					$this->redirect('/Azura/safehouse/brand/list');
				}
			}

			$msg = 'Ouups ! Une erreur est survenu lors de l\'enregistrement de la marque. Veuillez réessayer ou contacter l\'administrateur.';
			$this->layout->Session->setFlash($msg, 'error');

			$this->redirect('/Azura/safehouse/brand/list');			
		}
		else
		{
			$brand = $this->Brand->findFirst(array(
				'conditions' => 'id=' . $id)
			);

			if(empty($brand))
				$this->admin_e404();

			$this->set('brand', $brand);

			$this->layout->addJsFile('js', array(
				'validator' => '<script src="' . BASE_URL . '/webroot/js/vendor/validator.min.js"></script>'
			));
			$this->render('admin_edit');
		}
	}
}
?>