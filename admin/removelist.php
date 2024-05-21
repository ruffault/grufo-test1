<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");

$email = html_entity_decode($_GET['email']);

function remove_from_list($email)
{
	$sql = "UPDATE `membre`
					SET `mailinglist` = '0'
					WHERE `email` = '$email'
					LIMIT 1;";
	mysql_query($sql);
}

function remove_from_mailtmp($email)
{
	$sql = "DELETE FROM `mailtmp`
					WHERE `email` = '$email';";
	mysql_query($sql);
}

remove_from_list($email);
remove_from_mailtmp($email);

header('Location: index2.php?page=users');

?>
