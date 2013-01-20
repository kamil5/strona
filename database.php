<?

require_once "db_engine.php";

function getUserLogin($userid)
{

db_connect();

$query = "
SELECT `login` from `user_account`
WHERE
`usac_id` = ".$userid."
";

	$result=mysql_query($query);
	
	$row = mysql_fetch_array($result);

db_disconnect();
	
return $row['login'];
}

?> 