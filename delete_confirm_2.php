<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Désinscription</title>
	<link rel="stylesheet" type="text/css" href="all.css">

</head>
<body>
<?php Include("header.html"); ?>
<?php Include("menu.html"); ?>


<div id="main">
<?php 
if (isset($_SESSION['login']) && isset($_SESSION['passwd']))
{
	$name = $_SESSION['login'];
	echo "Sage Décision $name ...\n";
}
else
	echo "Navré de ton départ, nous espérons te revoir bientôt ...\n";

?>
<a href="index.php"><p>Retour à l'accueil</p></a>

</div>

