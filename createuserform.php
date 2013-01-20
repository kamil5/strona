<?

include_once "db_engine.php";



function verificateInput()
{

  // $filters = array
  // (
  // "name" => array
    // (
    // "filter"=>FILTER_SANITIZE_STRING
    // ),
  // "email" => array
  // (
  // "filter"=>FILTER_VALIDATE_EMAIL
  // ),
  // // "password" => array
    // // (
	// // "filter"=>FILTER_VALIDATE_STRING
    // // "options"=>array
      // // (
      // // "min_range"=>6,
      // // "max_range"=>50
      // // ),
	 
    // // ),
  // "email"=> FILTER_VALIDATE_EMAIL
  // );
	
  // $result = filter_input_array(INPUT_POST, $filters);
	
	
	// if(!$result["email"])
	// {
		// echo('Invalid email!');
		// return false;
	// }
	// if(!$result["password"])
	// {
		// echo('Invalid password!');
		// return false;
	// }
	
	// echo('name' . $_result["name"]);
	
		// echo('<br>Verification valid!');
		
	return true;

}

function enterToDatabase($name, $pswd, $mail)
{

db_connect();


$query = "
INSERT INTO `user_account` (
	`login`,
	`password`,
	`email`,
	`role_id`)
SELECT
	'".$name."',
	'".$pswd."',
	'".$mail."',
	1;
";

	if(!mysql_query($query))
	{
		db_disconnect();
		echo('SQL Error: '. mysql_error());
		return false;
	}


	db_disconnect();
	
	
	return true;
}

function mainCreateUserFormFunction()
{

	if(!userIsLoggedIn())
	{
		if($_GET["target"] == "createuser")
		{
			if(!verificateInput())
			{
				printCreateUserForm();
				exit();
			}
			else
			{
				if(enterToDatabase($_POST["login"], md5($_POST["password"]), $_POST["email"]))
				{
					printUserCreatedSuccessfull();
				}
				else
				{
					printErrorAddingToDataBase();
				}
			}
		}
		else //Pierwsze uruchomienie - nie ma wypelnionego formularza
		printCreateUserForm();
	}
	else
	{
		printAlreadyLoggedIn();		
	}

}




//Funkcje printujace - obudowac ladnie grafika

function printAlreadyLoggedIn()
{
	echo ('
	<div class="registerForm" style="text-align: center;">
		<div class="info">	
			<p>You\'re already logged in!</p>
		</div>
	</div>
	');
}

function printCreateUserForm()
{

echo
('
	<div class="registerForm" style="text-align: center;">
		<div class="info">
			<p>Formularz rejestracyjny</p>
		</div>
		
		<div class="containertotest">
			<div class="left">
				Login:<br />
				Password:<br />
				Retype password:<br />
				E-mail:<br />
			</div>
			
			<div class="right">
				<form action="main.php?target=createuser" method="post">							
							<input type="text" name="login" style="width:200px" />
							<input type="password" name="password" style="width:200px" />
							<input type="password" name="retypePassword" style="width:200px" />
							<input type="text" name="email" style="width:200px" />
				</form>							
			</div>
		</div>

		<div class="ok">
			<input type="submit" value="Zrob mnie ladnego!" class="button" />
		</div>
	
	</div>	
');

}

function printUserCreatedSuccessfull()
{
	
		echo('
		
		<div class="registerForm" style="text-align: center">
			<div class="info" style="padding: 10px">
				User created successfully!<br> Now you may log in above.
			</div>
		</div>
		
		');
	
}

function printErrorAddingToDataBase()
{
	echo('
		<div class="registerForm" style="text-align: center">
			<div class="info" style="padding: 10px">
				Error entering data to database!
			</div>
		</div>
	');
	exit();
}

?> 