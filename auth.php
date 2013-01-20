<?

require_once "db_engine.php";

function userIsLoggedIn()
{
	if (!isset($_SESSION['userid']) ||  $_SESSION['userid'] == 0)
        {
         	return false;
        }
	return true;
}

function tryLoginUser()
{
		
		if(isset($_POST["login"]) && isset($_POST["password"]))
        {
			$id = tryAuthUser($_POST["login"], md5($_POST["password"]));			
			if($id != 0)
			{
				$_SESSION['userid'] = $id;
				return true;
			}		
		}
		return false;
}

function tryAuthUser($login, $password) 
{

	db_connect();

	$query = "
	SELECT
	CASE 
		WHEN ( 
			SELECT count(*)
			FROM `user_account`
			WHERE 
				`login` = '".$login."' and
				`password` = '".$password."' ) = 0
		THEN 0
		ELSE (
			SELECT `usac_id`
			FROM `user_account`
			WHERE 
				`login` = '".$login."' and
				`password` = '".$password."' )
	END;
	";
	
	$result=mysql_query($query);
	$row = mysql_fetch_array($result, MYSQL_NUM);
	db_disconnect();
	return $row[0];
	
}



?>
