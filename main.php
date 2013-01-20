<?
	include "login.php";
	include "inputUserLoginForm.php";
	include "createuserform.php";
	
	require_once "db_engine.php";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>CSS Layout</title>
<link rel="stylesheet" type="text/css" href="reset-fonts-grids.css">
<link rel="stylesheet" type="text/css" href="base.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="doc3" class="yui-t2">
	<div id="hd">
		<div class="top">
			<div class="tl"></div>
			<div class="tr">
				<div class="trl">
					<form class="searchBar">
						szukaj: <input type="text" name="search" style="width:330px">
					</form> 
				</div>
				<div class="trr">
					<?
						mainLoginFormFunction();
					?>
				</div>
			</div>
		</div>
	</div>
	<div id="bd">
		<div id="yui-main">
			<div class="yui-b">
				<div class="content">
					
					<div class="centerBox">
						<div class="verse">
							<div class="leftPart"><br>111111<br></div>
							<div class="rightPart"><br>2222222<br></div>
						</div>
						<div class="verse">
							<div class="leftPart"><br>111111<br></div>
							<div class="rightPart"><br>2222222<br></div>
						</div>
						<br>
					</div>
					
					
				</div>
			</div>
		</div>
		<div class="yui-b">
			<div class="left">
				<div class="l0">poziom 0 linia 1</div>
				<div class="l0">poziom 0 linia 2</div>
				<div class="l1">poziom 1 linia 1</div>
				<div class="l2">poziom 2 linia 1</div>
				<div class="l0">poziom 0 linia 1</div>
			</div>
		</div>
	</div>
	<div id="ft">
		<div class="bottom">
		</div>
	</div>
</div>
</body>
</html>
