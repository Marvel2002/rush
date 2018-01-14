<?php
session_start();
$con = mysqli_connect("localhost","root","0892","miniboutique");
	if ($con)
	{
		$name = $_SESSION['login'];
		mysqli_query($con, "CREATE TABLE commande LIKE panier");
		mysqli_query($con, "INSERT commande SELECT * FROM panier");
		mysqli_query($con, "DELETE from panier where id_user ='$name'");
		unset($_SESSION['cart']);
	}

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

	<p>Merci de ta commande !</p>
	<a href="index.php">Retour à l'accueil</a>


</div>