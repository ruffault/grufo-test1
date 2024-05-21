<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");

function exist_email($email)
{
	global $link;
	$sql = "SELECT email
					FROM membre
					WHERE `email` = '$email'
					LIMIT 1
					;";
	$res = mysqli_query($link,$sql);
	if(mysqli_num_rows($res))
		return true;
	else
		return false;
}


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

function add_to_list($email)
{
	global $link;
	$sql = "UPDATE `membre`
					SET `mailinglist` = '1'
					WHERE `email` = '$email'
					LIMIT 1;";
	mysqli_query($link,$sql);
}

if (isset($_GET['email']))
{
	$email = strtolower(html_entity_decode($_GET['email']));

	if (isset($_GET['type']) && exist_email($email))
	{
		if ($_GET['type'] == 'remove')
		{
			remove_from_list($email);
			remove_from_mailtmp($email);
		}
		elseif ($_GET['type'] == 'add')
		{
			add_to_list($email);
		}
	}
}

header('Location: ' .  $_SERVER['HTTP_REFERER']);

?>
