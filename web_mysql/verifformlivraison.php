<?php
session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

$_SESSION['error_livr'] = '';

//si on pr�cise une autre adresse
if ($_POST["livraison_precise"] == "1")
{
  //On test toutes les variables
  if (!isset($_POST["livraison_civilite"]))
    $error_livr['nociv'] = 1;
  if (checkname($_POST["livraison_nom"]))
    $error_livr['noname'] = 1;
  if (checkname($_POST["livraison_prenom"]))
		$error_livr['nosurname'] = 1;
  if (checkadresse($_POST["livraison_adresse1"]))
		$error_livr['noadress'] = 1;

	//Cleaning zipcode
	if ($_POST["livraison_cp"])
		$_POST["livraison_cp"] = clean_cp($_POST["livraison_cp"]);

  //Le code postal est t'il obligatoire ?
  if ($_POST["livraison_pays"] && !$_POST["livraison_cp"])
  {
    $sql_cp_oblig = "SELECT *
                     FROM pays
                     WHERE cp_obligatoire = 1
                     AND abrev = '" . $_POST["livraison_pays"] . "'
                     LIMIT 1;";
    $res_cp_oblig = mysql_query($sql_cp_oblig);
    if (mysql_num_rows($res_cp_oblig))
      $error_livr['nocp'] = 1;
  }
  elseif(checkcp($_POST["livraison_cp"]))
  {
		$error_livr['badcp'] = 1;
  }
  //if (checkname($_POST["livraison_etat"]))
    ////$error_livr['badstate'] = 1;
  if (checkadresse($_POST["livraison_ville"]))
		$error_livr['badcity'] = 1;
  if (checkname($_POST["livraison_pays"]))
		$error_livr['badcountry'] = 1;
}
else
{
  //sinon on récupére l'adresse actuelle du membre
  $sql_recupmembre = "SELECT *
                       FROM membre
                       WHERE id_membre = '" . $_SESSION["id_membre"] . "'
                       ;";
  $sql_recupmembre_result = mysql_query($sql_recupmembre);
  $recupmembre = mysql_fetch_array($sql_recupmembre_result);
  $_POST["livraison_civilite"] = $recupmembre["civilite"];
  $_POST["livraison_nom"] = $recupmembre["nom"];
  $_POST["livraison_prenom"] = $recupmembre["prenom"];
  $_POST["livraison_adresse1"] = $recupmembre["adresse1"];
  $_POST["livraison_adresse2"] = $recupmembre["adresse2"];
  $_POST["livraison_adresse3"] = $recupmembre["adresse3"];
  $_POST["livraison_ville"] = $recupmembre["ville"];
  $_POST["livraison_etat"] = $recupmembre["etat"];
  $_POST["livraison_cp"] = $recupmembre["cp"];
  $_POST["livraison_pays"] = $recupmembre["pays"];
}

if (!$error_livr)
{
  //on enregistre l'adresse de livraison dans la table des livraisons
  $sql_livraison = "INSERT INTO livraison(`id_livraison`,`id_frais_port`,
                                          `civilite`,`nom`,`prenom`,`adresse1`,
                                          `adresse2`,`adresse3`,`ville`,`etat`,
                                          `cp`,`pays`)
                    VALUES(
                            '',
                            '',
                            '" . addslashes($_POST["livraison_civilite"]) . "',
                            '" . addslashes($_POST["livraison_nom"]) . "',
                            '" . addslashes($_POST["livraison_prenom"]) . "',
                            '" . addslashes($_POST["livraison_adresse1"]) . "',
                            '" . addslashes($_POST["livraison_adresse2"]) . "',
                            '" . addslashes($_POST["livraison_adresse3"]) . "',
                            '" . addslashes($_POST["livraison_ville"]) . "',
                            '" . addslashes($_POST["livraison_etat"]) . "',
                            '" . addslashes($_POST["livraison_cp"]) . "',
                            '" . addslashes($_POST["livraison_pays"]) . "'
                           );";
  mysql_query($sql_livraison);

  //on passe l'id de cette livraison en session
  $_SESSION["id_livraison"] = mysql_insert_id();

  //on lie cette livraison à la commande
  $sql_livraison = "UPDATE commande
                SET id_livraison = '".addslashes($_SESSION["id_livraison"])."'
                WHERE id_commande = '".addslashes($_SESSION["id_commande"])."'
                  ;";
  mysql_query($sql_livraison);

  //on envoie sur la page de selection du mode de paiement
  $redirection =  "Location: index.php?page=formfacturation";
}
else
{
  if ($_POST["livraison_precise"] == "1")
  {
    if (isset($_POST["livraison_civilite"]))
		{
			$_SESSION["livraison_civilite"] = $_POST["livraison_civilite"];
		}
    $_SESSION["livraison_nom"] = $_POST["livraison_nom"];
    $_SESSION["livraison_prenom"] = $_POST["livraison_prenom"];
    $_SESSION["livraison_adresse1"] = $_POST["livraison_adresse1"];
    $_SESSION["livraison_adresse2"] = $_POST["livraison_adresse2"];
    $_SESSION["livraison_adresse3"] = $_POST["livraison_adresse3"];
    $_SESSION["livraison_ville"] = $_POST["livraison_ville"];
    $_SESSION["livraison_etat"] = $_POST["livraison_etat"];
    $_SESSION["livraison_cp"] = $_POST["livraison_cp"];
    $_SESSION["livraison_pays"] = $_POST["livraison_pays"];
  }
  $_SESSION["livraison_precise"] = $_POST["livraison_precise"];

  //on renvoie l'erreur sur le formulaire de livraison
  $_SESSION["error_livr"] = $error_livr;

  $redirection =  "Location: index.php?page=livraisonprecise";
}

if ($_POST['precis'] == 1)
{
  //on envoie sur le formulaire permettant de préciser
  $redirection =  "Location: index.php?page=livraisonprecise";
}

if($_POST['premierpassage'] == 1)
	$_SESSION["error_livr"] = "";

header($redirection);
?>