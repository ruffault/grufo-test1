<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");

function deletemail($id)
{
	$sql = "DELETE FROM `mailing`
					WHERE id_mailing = '$id'
					LIMIT 1;";
	mysql_query($sql);
}

function deletelist($id)
{
	$sql = "DELETE FROM `mailtmp`
					WHERE id_mailing = '$id';";
	mysql_query($sql);
}

$id = $_GET['id'];
deletemail($id);
deletelist($id);

if ($_GET['page'] == 'edit')
	header('Location: index2.php?page=list&categ=editmail');
else
	header('Location: index2.php?page=list&categ=planing');

?>