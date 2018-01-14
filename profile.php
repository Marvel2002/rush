<?php

session_start();

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
<p id="bienvenue">Bonjour <?php echo $_SESSION['login'] ?> !</p>
<p>Ton panier est :</p>



<a href="logout.php"><?php 
if (isset($_SESSION['login']) && isset($_SESSION['passwd']))
	echo "Se déconnecter";

?></a>
<a href="delete.php"><?php 
if (isset($_SESSION['login']) && isset($_SESSION['passwd']))
	echo "Se désinscrire";

?></a>


</div>