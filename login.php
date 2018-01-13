<?php

session_start();

if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] && $_GET['submit'] === "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
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

	<form action="index.php" method="get">
	Identifiant: <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>" /><br / >
	Mot de passe: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>" /><br / >
	<input type="submit" name="submit" value="OK" />
</form>



</div>