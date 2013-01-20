<?

function db_connect()
{

	$db_host = "db447292249.db.1and1.com";
	$db_user = "dbo447292249";
	$db_pass = "marekbawiec";
	$db_database = "db447292249";	
	
 mysql_connect($db_host, $db_user, $db_pass) or die('cannot connect do db!');
 mysql_select_db($db_database);
	
	
}

function db_disconnect()
{
	mysql_close();
}


?> 