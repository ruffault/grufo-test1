<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");

function expire_session($id_member)
{
	global $link;
	$lastminute ;= mktime(date("H"), date("i") - 2, date("s"), date("m")-1, date("d"), date("Y"));
	$lastminute = date("Y-m-d H:i:s", $lastminute);
	$sql = "UPDATE utilisateur
					SET `dateexpire` = '$lastminute'
					WHERE `id_membre` = '$id_member'
					AND `dateexpire` > NOW()
					;";
	mysqli_query($link,$sql);
}


function user_statut($id_user, $enable = 1)
{
	global $link;
	if ($enable == 0)
		expire_session($id_user);

	$sql = "UPDATE `membre`
					SET `enable` = '$enable'
					WHERE `id_membre` = '$id_user'
					LIMIT 1;";
	mysqli_query($link,$sql);
}

if (isset($_GET['id_user']))
{
	$id_user = $_GET['id_user'];

	if ($_GET['type'] == 'remove')
		user_statut($id_user, 0);
	elseif ($_GET['type'] == 'add')
		user_statut($id_user);
}

header('Location: ' .  $_SERVER['HTTP_REFERER']);

?>
