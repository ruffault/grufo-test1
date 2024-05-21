<?php
//porte d'entree a la fonctionalité de gestion des developpements
//include ("inc/config.inc.php"); je mets finalement tout dans connexion.inc.php
require ('inc/connexion.inc.php');
require ('inc/function.inc.php');
require ('inc/header.inc.php');

if (!isset($_GET['demande'])) {
	//on est dans le cas ou il n'y a pas de demande identifiée: on affiche la liste
	$liste = give_demandes();
	include ('inc/afficheliste.inc.php');
}
else {
	//on a une demande identifiée par son id on l'affiche ou on l'a crée
	$demande = give_demande($_GET['demande']);
	include ('inc/affichedemande.inc.php');
}

include ('inc/footer.inc.php');
?>
