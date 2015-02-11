<?php 

/*
 * Rooter is one-instance object, and is used in the entire 
 * website. That's why all attributes are specified as static.
 */

class Router {

	static $prefixes = array();

	/*
	 * Permet de parser une URL
	 * @param $url à parser
	 * @return array contenant les paramètres
	 */
	static function parse($url, $request)
	{
		$url = trim($url, '/');

		if(strpos($url, '?') !== false)
		{
			$params = explode('?', $url);
			$request->params = isset($params[1]) ? array_slice($params, 1) : array();	
			
			$params = explode('/', $params[0]);
			$request->controller = $params[0];
			$request->action = isset($params[1]) ? $params[1] : 'index';
		}
		else
		{
			$params = explode('/', $url);
			if(in_array($params[0], array_keys(self::$prefixes)))
			{
				$request->prefix = self::$prefixes[$params[0]];
				array_shift($params);
			}
			$request->controller = isset($params[0]) ? $params[0] : 'page';
			$request->action = isset($params[1]) ? $params[1] : 'index';
			$request->params = isset($params[2]) ? array_slice($params, 2) : array();
		}
		
		return true;
	}

	static function prefix($url, $prefix)
	{
		self::$prefixes[$url] = $prefix;
	}

}

?>