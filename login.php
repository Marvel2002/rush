<?php

session_start();

if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] && $_GET['submit'] === "OK")
{
	$con = mysqli_connect("localhost","root","0892","miniboutique");
	if ($con)
		echo "CONNECTION SUCCESS"."\n";
	$name = $_GET['login'];
	$mdp = $_GET['passwd'];
	if ($res = mysqli_query($con, "SELECT login from users WHERE login = '$name'"))
	{
		$value = mysqli_fetch_array($res);
		echo "New record created successfully";
		if (isset($value) && $value[0] == $name)
		{
			echo "pseudo valide";
			if ($res = mysqli_query($con, "SELECT passwd from users WHERE login = '$name'"))
			{
				$value = mysqli_fetch_array($res);
				if (isset($value) && $value[0] == $mdp)
				{
						$_SESSION['login'] = $_GET['login'];
						$_SESSION['passwd'] = $_GET['passwd'];
						echo "PSEUDO EXISTE";
				}
			}
		}
	}
	else
		echo "Error: " . "SELECT '$name' from 'users'" . "<br>" . mysqli_error($con);
}

if (isset($_SESSION['login']) && isset($_SESSION['passwd']))
{
	if (isset($_SESSION['cart']))
	{
		$name = $_SESSION['login'];
		$generic = "NONAME";
		mysqli_query($con, "UPDATE `panier` SET `id_user`='$name' WHERE 'id_user' = '$generic'");
	}

	header("Location: profile.php");
	exit();
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
Se connecter
	<form action="login.php" method="get">
	Identifiant: <input type="text" name="login" value="" /><br / >
	Mot de passe: <input type="password" name="passwd" value="" /><br / >
	<input type="submit" name="submit" value="OK" />
</form>	
	</div>

<?php 
if (!isset($_SESSION['login']) && !isset($_SESSION['passwd']) && $_GET['submit'] && $_GET['submit'] === "OK")
	echo "Cet utilisateur n'existe pas, merci de vous inscrire\n";
?>

<a href="create.php"><p>Nouveau ?</p></a>



</div>