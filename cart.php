<?php

session_start();

if (isset($_GET['submit']) && $_GET['submit'] == "Payer/Commander")
{
	if (!isset($_SESSION['login']))
		header("Location: login.php");
	else if (isset($_SESSION['prixtotal']) && $_SESSION['prixtotal'] > 0)
		header("Location: order.php");
	else
		echo "Vous n'avez rien commandé, impossible de payer";
}

if (isset($_GET['submit']) && $_GET['submit'] == "Vider mon panier")
{
	$con = mysqli_connect("localhost","root","08926889","rush");
	if ($con)
	{
		if (isset($_SESSION['login']))
			$name = $_SESSION['login'];
		else
			$name = "NONAME";
		mysqli_query($con, "DELETE from panier where id_user ='$name'");
		unset($_SESSION['cart']);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Panier</title>
	<link rel="stylesheet" type="text/css" href="all.css">

</head>
<body>
<?php Include("header.html"); ?>
<?php Include("menu.html"); ?>

<div id="main">
<p id="bienvenue">Bonjour <?php echo $_SESSION['login'] ?> !</p>
<p>Ton panier est :</p>

<?php 
session_start();
if (isset($_SESSION['login']))
	$name = $_SESSION['login'];
else
	$name = "NONAME";
$con = mysqli_connect("localhost","root","08926889","rush");
if ($con)
{
if ($res = mysqli_query($con, "SELECT * FROM panier WHERE id_user = '$name'"))
	{
		$prix_total = 0;
		while ($array = mysqli_fetch_array($res)){
			$prix = 5 * $array['qte'];
			echo $array['id_article'] . ' x ' . $array['qte'] . " pour un prix de $prix euros";
			$prix_total += $prix;
			echo "<br>";
			
		}
		echo "<br><br><br>Le prix total est de : $prix_total<br>";
		$_SESSION['prixtotal'] = $prix_total;
	}
	else
		echo "Error: " . "SELECT '$name' from 'users'" . "<br>" . mysqli_error($con);
}
?>



<br><br><br>

	<form action="cart.php" method="get">
	<input type="submit" name="submit" value="Vider mon panier" />
	<input type="submit" name="submit" value="Payer/Commander" />
</form>	


<br/></br>
<a href="logout.php"><?php 
if (isset($_SESSION['login']) && isset($_SESSION['passwd']))
	echo "Se déconnecter";

?></a>
<a href="delete.php"><?php 
if (isset($_SESSION['login']) && isset($_SESSION['passwd']))
	echo "Se désinscrire";

?></a>


</div>