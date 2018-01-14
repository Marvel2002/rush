<?php

session_start();

if (isset($_SESSION['login']))
	$name = $_SESSION['login'];
else
	$name = "NONAME";
foreach ($_POST as $key => $value) 
{
	$con = mysqli_connect("localhost","root","08926889","rush");
	if ($con)
		echo "CONNECTION SUCCESS"."\n";
	if (mysqli_query($con, "INSERT INTO panier (id_article, qte, id_user) VALUES ('$key', '$value', '$name')"))
		echo "ENTREE CREEE\n";
	$_SESSION['cart'] = 1;
}
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

</table>

<div id="main">
<?php 
if (isset($_SESSION['login']) && isset($_SESSION['passwd']))
	echo "Choisis donc tes produits ".$_SESSION['login']." !";
?><br>

	<form action="produits.php" method="post">
		<p>Catégories</p>
	<input type="checkbox" name="breakfast" value=""/>Petit-Dejeuner<br / >
	<input type="checkbox" name="meal" value =""/>Repas<br / >
	<input type="checkbox" name="recipe" value =""/>Recette Gourmande<br / >
	<input type="submit" name="submit" value="OK" />
</form>	

<?php
if (isset($_POST['breakfast']))
	Include("breakfast.php");
if (isset($_POST['meal']))
	Include("meal.php");
if (isset($_POST['recipe']))
	Include("recipe.php");

?>


</div>
