<?php
include ("verifsession.inc.php");
include ("connexion.inc.php");
$sql = 'delete from frais_port_new WHERE id_frais_port=' . $_POST["id"] .';';

$res = mysqli_query($link,$sql);
	header('location:../index2.php?page=new_frais_port&pays=' . $_POST['pays']);
?>

