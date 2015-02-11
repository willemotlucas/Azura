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
		$req = array(
				'conditions' => 'Brands_id=' . $id,
				'order' => 'num_order'
				);
		$products = $this->Product->find($req);
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
}
?>