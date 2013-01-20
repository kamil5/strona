<?

require_once "db_engine.php";
include_once "database.php";
require_once "auth.php";



function mainLoginFormFunction() 
{

	 if($_SESSION['userid'] > 0)
	{
		printLoggedUserMessage();
	}
	else
	{
		printLoginUserForm();
	}
	
}

function printLoginUserForm()
{
echo
('

	<div class="loginBar" style="height: 20px; margin-top: 6px; margin-right: 30px; color: white; font-family: calibri;"> 
		<form action="main.php?target=loginuser" method="post">
				Login: <input type="text" name="login" />
				Pass: <input type="password" name="password" />
				<input type="hidden" name="callingFile" value="inputUserLoginForm">
				<input type="image" src="system/login.png" name="submit"/>
		</form>
	</div>
');
}

function printLoggedUserMessage()
{
	echo('
	<div class="login">
		Hello '.getUserLogin($_SESSION['userid']).'!
		<a href="main.php?logout"><input type="image" src="system/logout.png" name="submit"/></a>
	</div>
	');
}


?>
