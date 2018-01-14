<?php
session_start();

if ($_POST['submit'] === 'OK' && isset($_POST['oui']))
{
	$con = mysqli_connect("localhost","root","08926889","rush");
	if ($con)
		echo "CONNECTION SUCCESS"."\n";
	$name = $_SESSION['login'];
	$mdp = $_SESSION['passwd'];
	if (mysqli_query($con, "DELETE FROM users"))
		echo "New record created successfully"; 
	else
		echo "Error: " . "DELETE FROM users" . "<br>" . mysqli_error($con);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="all.css">

</head>
<body>
<?php Include("header.html"); ?>
<?php Include("menu.html"); ?>

<div id="main">
	<form action="delete.php" method="post">
	Es-tu vraiment sûr(e) de vouloir te désinscrire ?<br/>
	Cette action supprime tes informations personnelles de notre base de données, c'est irréversible... <br />
	<input type="radio" name="oui" value=""/>Oui<br / >
	<input type="radio" name="non" value =""/>Non<br / >
	<input type="submit" name="submit" value="OK" />
</form>	


</div>