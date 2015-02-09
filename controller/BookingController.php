<?php 

class BookingController extends Controller
{
	function view()
	{
		// set the css and js files for the specific view
		$this->layout->addCssFile('css', array(
			'view' => '<link href="' .BASE_URL. '/webroot/css/booking/view.css" rel="stylesheet">'
		));
		$this->layout->addJsFile('js', array(
			'view' => '<script src="' .BASE_URL. '/webroot/js/booking/view.js"></script>'
		));

		//load the view and display it for the user
		$this->render('view');
	}
}
?>