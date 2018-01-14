<?php

session_start();

if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] && $_GET['submit'] === "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
	$con = mysqli_connect("localhost","root","08926889","rush");
	if ($con)
		echo "CONNECTION SUCCESS"."\n";
	$name = $_SESSION['login'];
	$mdp = $_SESSION['passwd'];
	if (mysqli_query($con, "INSERT INTO users (login, passwd) VALUES ('$name', '$mdp')"))
		echo "New record created successfully"; 
	else
		echo "Error: " . "INSERT INTO users (login, passwd) VALUES ('John', 'Doe')" . "<br>" . mysqli_error($con);
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

<?php Include("vitrine.php"); ?>

</div>