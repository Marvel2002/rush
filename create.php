<?php

	session_start();
	$val = $_SESSION['cart'];
	echo "CART = $val (create)";
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK")
	{

	$con = mysqli_connect("localhost","root","0892","miniboutique");
	if ($con)
		echo "CONNECTION SUCCESS"."\n";
	$name = $_POST['login'];
	$mdp = $_POST['passwd'];
	if ($res = mysqli_query($con, "SELECT login from users WHERE login = '$name'"))
	{
		$value = mysqli_fetch_array($res);
		echo "New record created successfully\n";
		if (isset($value))
			echo "PSEUDO EXISTE DEJA, IMPOSSIBLE DE CREER\n";
		else
			{
					if (mysqli_query($con, "INSERT INTO users (login, passwd) VALUES ('$name', '$mdp')"))
						echo "PSEUDO NON EXISTANT, IL VIENT DETRE CREE\n"; 
					$_SESSION['login'] = $_POST['login'];
					$_SESSION['passwd'] = $_POST['passwd'];
					$name = $_SESSION['login'];
					if ($_SESSION['cart'])
					{
						$name = $_SESSION['login'];
						mysqli_query($con, "UPDATE `panier` SET `id_user`='$name' WHERE `id_user`='NONAME'");
					}
					header("Location: index.php");
			}
	}
	else
		echo "Error: " . "SELECT '$name' from 'users'" . "<br>" . mysqli_error($con);
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
	<div>
Créer un compte
	<form action="create.php" method="post">
	Identifiant: <input type="text" name="login" value="" /><br / >
	Mot de passe: <input type="password" name="passwd" value="" /><br / >
	<input type="submit" name="submit" value="OK" />
</form>	
	</div>




</div>