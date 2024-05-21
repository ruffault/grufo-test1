<?php
session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

if ($_POST["modepaiement_submit"])
{
  if ($_POST["modepaiement_mode"])
  {
    $_SESSION["modepaiement_mode"] = $_POST["modepaiement_mode"];
    if ($_POST["modepaiement_mode"]== "cheque")
      $redirection =  "Location: index.php?page=paiementcheque";
//    if ($_POST["modepaiement_mode"]== "virement")
//      $redirection =  "Location: index.php?page=paiementvirement";
    if ($_POST["modepaiement_mode"]== "visa")
      $redirection =  "Location: index.php?page=paiementcarte";
  }
  else
  {
    $_SESSION["erreur_modepaiement"] = "Vous n'avez pas séléctionné le mode de paiement.";
    $redirection =  "Location: index.php?page=formmodepaiement";
  }
}
header($redirection);
?>
