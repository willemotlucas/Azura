<?php

require_once(ROOT.DS.'model'.DS.'UserDAO.php');

class AdminController extends Controller
{
	function login()
	{
		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = htmlspecialchars($_POST['login']);
			$password = htmlspecialchars($_POST['password']);
			
			//$UserDAO = new UserDAO();
			//$user = $UserDAO->getUserByLogin($login)->fetch();

			$password = hash('sha512', $password);
			if($password == $user['password'])
			{
				// Récupère la chaîne user-agent de l’utilisateur
                $user_browser = $_SERVER['HTTP_USER_AGENT'];

                // Protection XSS car nous pourrions conserver cette valeur
                $user_id = preg_replace("/[^0-9]+/", "", $user['id']);
                $_SESSION['user_id'] = $user_id;
                // Protection XSS car nous pourrions conserver cette valeur
                $login = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                            "", 
                                                            $user['login']);
                $_SESSION['username'] = $login;
                $_SESSION['login_string'] = hash('sha512', 
                          $user['password'] . $user_browser);
                // Ouverture de session réussie.
                $this->index();
			}
			else
			{
				echo('Mot de passe incorrect');
			}
		}
		else
		{
			echo('Erreur POST');
		}
	}

	function index()
	{
		if(isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_SESSION['login_string']))
		{
        	$this->render('index');
		}
		else
		{
			echo 'Permission denied';
		}
	}

	function logout()
	{

	}
}

?>