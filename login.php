<?php

session_start();

if (isset($_SESSION['login']) && isset($_SESSION['passwd']))
{
	header("Location: produits.php");
	exit();
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
Se connecter
	<form action="index.php" method="get">
	Identifiant: <input type="text" name="login" value="" /><br / >
	Mot de passe: <input type="password" name="passwd" value="" /><br / >
	<input type="submit" name="submit" value="OK" />
</form>	
	</div>

<a href="create.php"><p>Nouveau ?</p></a>



</div>