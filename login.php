<?
session_set_cookie_params(60*1);
session_start();

require_once "db_engine.php";
require_once "auth.php";

if(isset($_GET["logout"]))
{
	logout();
}

if(!userIsLoggedIn()) //Jesli user nie jest zalogowany rozpoczynamy mu anonimowa sesje
	{
		$_SESSION['userid'] = 0;
		tryLoginUser();
	}
	
function logout()
{
	session_destroy();
	$_SESSION['userid'] = 0;
}

?>