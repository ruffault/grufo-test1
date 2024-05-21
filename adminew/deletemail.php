<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");

function deletemail($id)
{
	global $link;
	$sql = "DELETE FROM `mailing`
					WHERE id_mailing = '$id'
					LIMIT 1;";
	mysqli_query($link,$sql);
}

function deletelist($id)
{
	global $link;
	$sql = "DELETE FROM `mailtmp`
					WHERE id_mailing = '$id';";
	mysqli_query($link,$sql);
}

$id = $_GET['id'];
deletemail($id);
deletelist($id);

if ($_GET['page'] == 'edit')
	header('Location: index2.php?page=list&categ=editmail');
else
	header('Location: index2.php?page=list&categ=planing');

?>
