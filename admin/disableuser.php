<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");

function expire_session($id_member)
{
	$lastminute = mktime(date("H"), date("i") - 2, date("s"), date("m")-1, date("d"), date("Y"));
	$lastminute = date("Y-m-d H:i:s", $lastminute);
	$sql = "UPDATE utilisateur
					SET `dateexpire` = '$lastminute'
					WHERE `id_membre` = '$id_member'
					AND `dateexpire` > NOW()
					;";
	mysql_query($sql);
}


function user_statut($id_user, $enable = 1)
{
	if ($enable == 0)
		expire_session($id_user);

	$sql = "UPDATE `membre`
					SET `enable` = '$enable'
					WHERE `id_membre` = '$id_user'
					LIMIT 1;";
	mysql_query($sql);
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
