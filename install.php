<?php
$link = mysqli_connect("localhost","root","0892","miniboutique") or die("Error " . mysqli_error($link)); 
if (isset($_POST['submit']))
{
$sql = file_get_contents("miniboutique.sql");
$sql_array = explode(";", $sql);
foreach ($sql_array as $val) 
{
mysqli_query($link, $val); 
}
}
?>

<form action="install.php" method="post">
	<input type="submit" name="submit" id="" value="INSTALLEZ" />
</form>