<?php

class ProductController extends Controller
{
	function admin_list($brand_id, $msg = null)
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

		$this->render('admin_list');
	}

	function admin_add()
	{

	}

	function admin_edit($id = null)
	{

	}

	function admin_delete($id)
	{

	}
}

?>