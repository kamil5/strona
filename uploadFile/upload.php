<?php
	// Work-around for setting up a session because Flash Player doesn't send the cookies
	if (isset($_POST["PHPSESSID"])) {
		session_id($_POST["PHPSESSID"]);
	}
	session_start();

	// The Demos don't save files
	
		if(isset($_FILES['Filedata']))
	{
		$uploaddir = 'up/';
		$uploadfile = $uploaddir . basename($_FILES['Filedata']['name']);
		
		move_uploaded_file($_FILES['Filedata']['tmp_name'], $uploadfile);
	}
	
	exit(0);
?>