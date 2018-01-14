<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<link rel="stylesheet" type="text/css" href="all.css">

</head>
<body>
<?php Include("header.html"); ?>
<?php Include("menu.html"); ?>

<div id="main">

	<p>Tu as été déconnecté !</p>
	<a href="index.php">Retour à l'accueil</a>
	<a href="login.php">Me connecter</a>


</div>