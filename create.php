<?php

	session_start();
	if ($_POST['submit'] === 'OK' && isset($_POST['login']) && isset($_POST['passwd']))
	{		
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['passwd'] = $_POST['passwd'];
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Authentification</title>
	<link rel="stylesheet" type="text/css" href="all.css">

</head>
<body>
<?php Include("header.html"); ?>
<?php Include("menu.html"); ?>

<div id="main">
	<div>
Créer un compte
	<form action="create.php" method="post">
	Identifiant: <input type="text" name="login" value="" /><br / >
	Mot de passe: <input type="password" name="passwd" value="" /><br / >
	<input type="submit" name="submit" value="OK" />
</form>	
	</div>




</div>