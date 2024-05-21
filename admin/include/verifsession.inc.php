<?php

session_start();
session_name("dicoadmin");

if ($_SESSION['sessionvalide'] != 'sessionok')
{
	//echo "Session4 : ".$_SESSION['sessionvalide'];
	header("Location:index.php?error=1");
}

$adminpart = 1;

?>
