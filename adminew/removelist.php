<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");

$email = html_entity_decode($_GET['email']);

function remove_from_list($email)
{
	global $link;
	$sql = "UPDATE `membre`
					SET `mailinglist` = '0'
					WHERE `email` = '$email'
					LIMIT 1;";
	mysqli_query($link,$sql);
}

function remove_from_mailtmp($email)
{
	global $link;
	$sql = "DELETE FROM `mailtmp`
					WHERE `email` = '$email';";
	mysqli_query($link,$sql);
}

remove_from_list($email);
remove_from_mailtmp($email);

header('Location: index2.php?page=users');

?>
