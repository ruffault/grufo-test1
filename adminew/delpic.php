<?php
include ("include/verifsession.inc.php");
include ("include/createpic.inc.php");
include ("include/connexion.inc.php");
$uploaddir = '../picproduct/';

if($_GET["id_produit"])
{
	// efface les anciennes images
  unlink_wc($uploaddir, $_GET["id_produit"] . "*.*");
	
	//Passe le bit image à 0 pour le produit dans la base
	$query = "UPDATE produit
						SET image = '0'
						WHERE id_produit = '" . $_GET["id_produit"] . "'
						LIMIT 1;";
  mysqli_query($link,$query);
}

	
//on renvoie sur la page d'ajout / modification / suppression d'images
$redirection = "index2.php?page=showpic&produit=" . $_GET["id_produit"];
header("location: $redirection");
?>
