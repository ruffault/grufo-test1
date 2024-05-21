<?php

session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

if (!isset($_POST["fraisport_mode"]))
{
  $erreur_fraisport = 1;
}


//S'il les champs sont correctement renseignés
if(!$erreur_fraisport)
{
  /*on récupere l'id du frais de port, correspondant
    au mode et au pays de livraison, dans la table
    livraison*/
  $sql_idfraisport = "SELECT frais_port.id_frais_port
                      FROM frais_port, livraison, commande
                      WHERE commande.id_livraison = livraison.id_livraison
                      AND commande.id_commande = '".$_SESSION["id_commande"]."'
                      AND frais_port.pays = livraison.pays
                      AND frais_port.mode = '" . $_POST["fraisport_mode"] . "'
                      ;";
  $sql_idfraisport = mysqli_query($link,$sql_idfraisport);
  $val_idfraisport = mysqli_fetch_array($sql_idfraisport);
  $id_fraisport = $val_idfraisport["id_frais_port"];

  //on enregistre l'id du frais de port dans la table livraison
  $sql_saveidfraisport = "UPDATE livraison
                          SET id_frais_port = '".$id_fraisport."'
                          WHERE id_livraison = '".$_SESSION["id_livraison"]."'
                          ;";
  mysqli_query($link,$sql_saveidfraisport);
  $_SESSION["fraisport_mode"] = $_POST["fraisport_mode"];
  $_SESSION["erreur_fraisport"] = "";
  //on envoie sur la page de selection du mode de paiement
  $redirection =  "Location: index.php?page=formmodepaiement";
}
else
{
	if (isset($_POST["fraisport_mode"]))
	{
	  $_SESSION["fraisport_mode"] = $_POST["fraisport_mode"];
	}
  //on renvoie l'erreur sur le formulaire de fraisport
  $_SESSION["erreur_fraisport"] = $erreur_fraisport;
  $redirection =  "Location: index.php?page=formfraisport";
}
header($redirection);

?>
