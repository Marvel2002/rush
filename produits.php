<?php

session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Produits</title>
	<link rel="stylesheet" type="text/css" href="all.css">

</head>
<body>
<?php Include("header.html"); ?>
<?php Include("menu.html"); ?>

<div id="main">
<?php 
if (isset($_SESSION['login']) && isset($_SESSION['passwd']))
	echo "Choisis donc tes produits ".$_SESSION['login']." !";
?><br>

Nutella + -  <br/>
Confiture + - <br/>
Cacahuete + - <br/>
Beurre + -  <br/>
Recettes + - <br/>
Moutarde + - <br/>
Haricots + - <br/>
Oignons + - <br/>
Brioches + - <br/>
Café + - <br/>



<a href="logout.php"><?php 
if (isset($_SESSION['login']) && isset($_SESSION['passwd']))
	echo "Se déconnecter";

?></a>
<a href="delete.php"><?php 
if (isset($_SESSION['login']) && isset($_SESSION['passwd']))
	echo "Se désinscrire";

?></a>
</div>