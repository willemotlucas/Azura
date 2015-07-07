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
		$products = $this->Product->findProductsWithImage($id);
		$nbProducts = $this->Product->findCount();
		$nbLines = ceil($nbProducts/4);
		$nbProductsLastLine = $nbProducts%4;

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
		$target_dir = ROOT . DS . 'webroot' . DS . 'img' . DS . 'brands'. DS;
		$this->loadModel('Brand');
		$logo = $this->Brand->findLogoIdWithBrandId($id);
		unlink($target_dir . basename($logo->src));
		$this->Brand->deleteLogo($logo->id);
		$this->Brand->delete($id);
		
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
			//Authorized extension, size max
			$ext = array('jpg', 'png', 'jpeg', 'gif', 'bmp');
			$max_size = 20000;
			$width_max = 300;
			$height_max = 150;
			$msg = "";

			//Save the logo into the server and add logo's url into database
			$target_dir = ROOT . DS . 'webroot' . DS . 'img' . DS . 'brands'. DS;
			$target_file = $target_dir . basename($_FILES['logo']['name']);
			$src = '/Azura/webroot/img/brands/' . basename($_FILES['logo']['name']);
			$img_type = pathinfo($target_file, PATHINFO_EXTENSION);
			if(!file_exists($target_file))
			{
				if(in_array(strtolower($img_type),$ext))
				{
					$check = getimagesize($_FILES['logo']['tmp_name']);
					if($check[2] >= 1 && $check[2] <= 14)
					{
						if($check[0] <= $width_max && $check[1] <= $height_max && filesize($_FILES['logo']['tmp_name']) <= $max_size)
						{
							if(move_uploaded_file($_FILES['logo']['tmp_name'], $target_file))
							{
								$data = $this->request->data;
								$data->name = htmlspecialchars($data->name);
								$data->description = htmlspecialchars($data->description);
								$data->url = htmlspecialchars($data->url);
								$data->products_type = htmlspecialchars($data->products_type);
								$data->online == 'yes' ? $this->request->data->online = 1 : $this->request->data->online = 0;

								//Add fields verifying + adding in database and throwing errors
								if(verifyField($data, 'name', array('empty' => 'no', 'maxLength' => 45))
								&& verifyField($data, 'description', array('empty' => 'no')))
								{
									$data->Logo_id = $this->Brand->saveLogo($src);
									if($this->Brand->save($data))
									{
										$msg = 'Bravo ! Vous avez ajouté une nouvelle marque !';
										$this->layout->Session->setFlash($msg);
										$this->redirect('/Azura/safehouse/brand/list');
									}
									else
									{
										$this->Brand->deleteLogo($data->Logo_id);
									}
								}
							}
							else
							{
								$msg = "Erreur lors du téléchargement de l'image";
							}
						}
						else
						{
							$msg = "La taille de l'image est trop grande, veuillez la redimensionner. Les dimensions maximales sont 300x150, le poids maximum est de 10mo.";
						}
					}
				}
				else
				{
					$msg = "Le type de l'image n'est pas correct. Seuls les formats .jpg, .jpeg, .png, .gif et .bmp sont acceptés.";
				}
			}
			else
			{
				$msg = "Le fichier existe déjà.";
			}

			unlink($target_file);
			$this->layout->Session->setFlash($msg, 'danger');
			$this->redirect('/Azura/safehouse/brand/add');			
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
			if(!empty($_FILES['logo']['name']))
			{
				//Authorized extension, size max
				$ext = array('jpg', 'png', 'jpeg', 'gif', 'bmp');
				$max_size = 20000;
				$width_max = 300;
				$height_max = 150;
				$msg = "";

				//Save the logo into the server and add logo's url into database
				$target_dir = ROOT . DS . 'webroot' . DS . 'img' . DS . 'brands'. DS;
				$target_file = $target_dir . basename($_FILES['logo']['name']);
				$src = '/Azura/webroot/img/brands/' . basename($_FILES['logo']['name']);
				$upload_ok = 1;
				$img_type = pathinfo($target_file, PATHINFO_EXTENSION);
				if(!file_exists($target_file))
				{
					if(in_array(strtolower($img_type),$ext))
					{
						$check = getimagesize($_FILES['logo']['tmp_name']);
						if($check[2] >= 1 && $check[2] <= 14)
						{
							if($check[0] <= $width_max && $check[1] <= $height_max && filesize($_FILES['logo']['tmp_name']) <= $max_size)
							{
								if(move_uploaded_file($_FILES['logo']['tmp_name'], $target_file))
								{
									$data = $this->request->data;
									$data->name = htmlspecialchars($data->name);
									$data->description = htmlspecialchars($data->description);
									$data->url = htmlspecialchars($data->url);
									$data->products_type = htmlspecialchars($data->products_type);
									$data->online == 'yes' ? $this->request->data->online = 1 : $this->request->data->online = 0;

									//Add fields verifying + adding in database and throwing errors
									if(verifyField($data, 'name', array('empty' => 'no', 'maxLength' => 45))
									&& verifyField($data, 'description', array('empty' => 'no')))
									{
										$old_logo = $this->Brand->findLogo($data->Logo_id);
										unlink( $target_dir . basename($old_logo->src));
										$this->Brand->updateLogo($data->Logo_id,$src);
										if($this->Brand->save($data))
										{
											$msg = 'Bravo ! Vous avez mis à jour la marque ' . $data->name . ' !';
											$this->layout->Session->setFlash($msg);
											$this->redirect('/Azura/safehouse/brand/list');
										}
										else
										{
											$this->Brand->deleteLogo($data->Logo_id);
										}
									}
								}
								else
								{
									$msg = "Erreur lors du téléchargement de l'image";
								}
							}
							else
							{
								$msg = "La taille de l'image est trop grande, veuillez la redimensionner. Les dimensions maximales sont 300x150, le poids maximum est de 10mo.";
							}
						}
					}
					else
					{
						$msg = "Le type de l'image n'est pas correct. Seuls les formats .jpg, .jpeg, .png, .gif et .bmp sont acceptés.";
					}
				}
				else
				{
					$msg = "Le fichier existe déjà.";
				}

				unlink($target_file);
				$this->layout->Session->setFlash($msg, 'danger');
				$this->redirect('/Azura/safehouse/brand/edit/' . $this->request->data->id);
			}
			else
			{
				$data = $this->request->data;
				$data->name = htmlspecialchars($data->name);
				$data->description = htmlspecialchars($data->description);
				$data->url = htmlspecialchars($data->url);
				$data->products_type = htmlspecialchars($data->products_type);
				$data->online == 'yes' ? $this->request->data->online = 1 : $this->request->data->online = 0;

				if(verifyField($data, 'name', array('empty' => 'no', 'maxLength' => 45))
				&& verifyField($data, 'description', array('empty' => 'no')))
				{
					if($this->Brand->save($data))
					{
						$msg = 'Bravo ! Vous avez mis à jour la marque' . $data->name . ' !';
						$this->layout->Session->setFlash($msg);
						$this->redirect('/Azura/safehouse/brand/list');
					}
				}
			}
		}
		else
		{
			$brand = $this->Brand->findFirst(array(
				'conditions' => 'id=' . $id)
			);
			$logo = $this->Brand->findLogo($brand->Logo_id);

			if(empty($brand))
				$this->admin_e404();

			$this->set('brand', $brand);
			$this->set('logo', $logo);

			$this->layout->addJsFile('js', array(
				'validator' => '<script src="' . BASE_URL . '/webroot/js/vendor/validator.min.js"></script>'
			));
			$this->render('admin_edit');
		}
	}
}
?>