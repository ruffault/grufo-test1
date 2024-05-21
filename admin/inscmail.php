<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");

function exist_email($email)
{
	$sql = "SELECT email
					FROM membre
					WHERE `email` = '$email'
					LIMIT 1
					;";
	$res = mysql_query($sql);
	if(mysql_num_rows($res))
		return true;
	else
		return false;
}


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

function add_to_list($email)
{
	$sql = "UPDATE `membre`
					SET `mailinglist` = '1'
					WHERE `email` = '$email'
					LIMIT 1;";
	mysql_query($sql);
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
