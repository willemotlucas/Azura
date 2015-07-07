<?php

class ProductController extends Controller
{
	function admin_list_brand($brand_id, $msg = null)
	{
		$this->layout->setLayout('admin');
		$this->loadModel('Product');
		$products = $this->Product->find(array(
			'conditions' => 'Brand_id=' . $brand_id,
			'order' => 'id',
			'way' => 'DESC')
		);
		$this->loadModel('Brand');
		$brand = $this->Brand->find(array(
			'conditions' => 'id=' . $brand_id,
			'tables' => 'Brands')
		);

		$this->set('msg', $msg);
		$this->set('products', $products);
		$this->set('brand', $brand[0]);

		$this->render('admin_list_brand');
	}

	function admin_list()
	{
		$this->layout->setLayout('admin');
		$this->loadModel('Product');
		if($this->request->data)
		{
			$data = $this->request->data;
			$products = $this->Product->findWithKeyWords($data->keywords);
			$this->set('products', $products);
			$this->render('admin_list');
		}
		else
		{
			$products = $this->Product->find();
			$this->set('products', $products);
			$this->render('admin_list');
		}
	}

	function admin_add()
	{
		$this->layout->setLayout('admin');

		if($this->request->data)
		{
			//Authorized extension, size max
			$ext = array('jpg', 'png', 'jpeg', 'gif', 'bmp');
			$max_size = 20000;
			$width_max = 300;
			$height_max = 300;
			$msg = "";

			//Save the logo into the server and add logo's url into database
			$target_dir = ROOT . DS . 'webroot' . DS . 'img' . DS . 'products'. DS;
			$target_file = $target_dir . basename($_FILES['product_image']['name']);
			$src = '/Azura/webroot/img/products/' . basename($_FILES['product_image']['name']);
			$img_type = pathinfo($target_file, PATHINFO_EXTENSION);

			if(!file_exists($target_file))
			{
				if(in_array(strtolower($img_type), $ext))
				{
					$check = getimagesize($_FILES['product_image']['tmp_name']);
					if($check[2] >= 1 && $check[2] <= 14)
					{
						if($check[0] <= $width_max && $check[1] <= $height_max && filesize($_FILES['product_image']['tmp_name']) <= $max_size)
						{
							if(move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file))
							{
								
								$data = $this->request->data;
								$data->name = htmlspecialchars($data->name);
								$data->reference = htmlspecialchars($data->reference);
								$data->description = htmlspecialchars($data->description);
								$data->online == 'yes' ? $this->request->data->online = 1 : $this->request->data->online = 0;
								$brand = explode(' ', $data->brand);
								$data->Brand_id = $brand[0];
								unset($data->brand);

								if(verifyField($data, 'name', array('emtpy' => 'no', 'maxLength' => 45))
								&& verifyField($data, 'reference', array('maxLength' => 45)))
								{
									$this->loadModel('Product');
									$data->Product_image_id = $this->Product->saveImage($src);
									if($this->Product->save($data))
									{
										$msg = 'Bravo ! Vous avez ajouté un nouveau produit !';
										$this->layout->Session->setFlash($msg);
										$this->redirect('/Azura/safehouse/product/list/' . $brand[0]);
									}
									else
									{
										$this->Product->deleteImage($data->Product_image_id);
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
			$this->redirect('/Azura/safehouse/product/add');
		}
		else
		{
			$this->loadModel('Brand');
			$brands = $this->Brand->find();
			$this->set('brands', $brands);

			$this->render('admin_add');
		}

	}

	function admin_edit($id = null)
	{

	}

	function admin_delete($id)
	{
		$target_dir = ROOT . DS . 'webroot' . DS . 'img' . DS . 'products'. DS;
		$this->loadModel('Product');
		$img = $this->Product->findImageIdWithProductId($id);
		unlink($target_dir . basename($img->src));
		$this->Product->deleteImage($img->id);
		$this->Product->delete($id);
		
		$msg = 'Le produit a bien été supprimée.';
		$this->layout->Session->setFlash($msg);

		$this->redirect('/Azura/safehouse/brand/list');
	}
}

?>