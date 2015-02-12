<?php 

class Session 
{
	/*function sec_session_start() 
	{
	    $session_name = 'sec_session_id';   // Attribue un nom de session
	    $secure = SECURE;
	    // Cette variable empêche Javascript d’accéder à l’id de session
	    $httponly = true;
	    // Force la session à n’utiliser que les cookies
	    if (ini_set('session.use_only_cookies', 1) === FALSE) {
	        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
	        exit();
	    }
	    // Récupère les paramètres actuels de cookies
	    $cookieParams = session_get_cookie_params();
	    session_set_cookie_params($cookieParams["lifetime"],
	        $cookieParams["path"], 
	        $cookieParams["domain"], 
	        $secure,
	        $httponly);
	    // Donne à la session le nom configuré plus haut
	    session_name($session_name);
	    session_start();            // Démarre la session PHP 
	    session_regenerate_id();    // Génère une nouvelle session et efface la précédente
	}*/

	public function __construct()
	{
		if(!isset($_SESSION))
		{
			session_start();
		}
	}

	public function setFlash($msg, $type = 'success')
	{
		$_SESSION['flash'] = array(
			'msg' => $msg,
			'type' => $type
		);
	}

	public function flash()
	{
		if(isset($_SESSION['flash']['msg']))
		{
			$html = '<div class="alert alert-'. $_SESSION['flash']['type'] . ' alert-dismissable">
						<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
						<p>' . $_SESSION['flash']['msg'] . '</p>
					</div>';
			$_SESSION['flash'] = array();
			return $html;
		}
	}
}

 ?>