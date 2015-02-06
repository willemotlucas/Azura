<?php 

/*
 * Rooter is one-instance object, and is used in the entire 
 * website. That's why all attributes are specified as static.
 */

class Router {

	/*
	 * Permet de parser une URL
	 * @param $url à parser
	 * @return array contenant les paramètres
	 */
	static function parse($url, $request)
	{
		$url = trim($url, '/');
		
		$params = explode('?', $url);
		$request->params = isset($params[1]) ? array_slice($params, 1) : array();
		
		$params = explode('/', $params[0]);

		$request->controller = $params[0];
		$request->action = isset($params[1]) ? $params[1] : 'index';
		
		return true;
	}

}

?>