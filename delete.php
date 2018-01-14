<?php
session_start();

if ($_POST['submit'] === 'OK' && isset($_POST['non']))
	header("Location: delete_confirm_2.php");
if ($_POST['submit'] === 'OK' && isset($_POST['oui']))
{
	$con = mysqli_connect("localhost","root","08926889","rush");
	if ($con)
		echo "CONNECTION SUCCESS"."\n";
	$name = $_SESSION['login'];
	$mdp = $_SESSION['passwd'];
	if (mysqli_query($con, "DELETE FROM `users` WHERE `users`.`login` = '$name'"))
	{
		mysqli_query($con, "DELETE from panier where id_user ='$name'");
		unset($_SESSION['cart']);
		echo "New record created successfully";
		session_destroy();
		header("Location: delete_confirm_2.php");
	}
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


<div id="main">
<?php 
if (isset($_SESSION['login']) && isset($_SESSION['passwd']) && !$_POST['submit'])
	Include("delete_confirm.php");

?>


</div>