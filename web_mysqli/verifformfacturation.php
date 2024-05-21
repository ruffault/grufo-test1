<?php
session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

$_SESSION["error_livr"] = '';

//si on précise une autre adresse
if ($_POST["facturation_precise"] == "1")
{
  //On test toutes les variables
  if (!isset($_POST["facturation_civilite"]))
    $error_livr['nociv'] = 1;
  if (checkname($_POST["facturation_nom"]))
    $error_livr['noname'] = 1;
  if (checkname($_POST["facturation_prenom"]))
		$error_livr['nosurname'] = 1;
  if (checkadresse($_POST["facturation_adresse1"]))
		$error_livr['noadress'] = 1;

	if($_POST["facturation_cp"])
		$_POST["facturation_cp"] = clean_cp($_POST["facturation_cp"]);

  //Le code postal est t'il obligatoire ?
  if ($_POST["facturation_pays"] && !$_POST["facturation_cp"])
  {
    $sql_cp_oblig = "SELECT *
                     FROM pays
                     WHERE cp_obligatoire = 1
                     AND abrev = '" . mysqli_real_string($link,$_POST["facturation_pays"]) . "'
                     LIMIT 1;";
    $res_cp_oblig = mysqli_query($link,$sql_cp_oblig);
    if (mysqli_num_rows($res_cp_oblig))
      $error_livr['nocp'] = 1;
  }
  elseif(checkcp($_POST["facturation_cp"]))
  {
		$error_livr['badcp'] = 1;
  }

  //if (checkname($_POST["facturation_etat"]))
  //  $erreur_facturation .= "- Etat invalide<br />\n";
  if (checkadresse($_POST["facturation_ville"]))
		$error_livr['badcity'] = 1;
  if (checkname($_POST["facturation_pays"]))
		$error_livr['badcountry'] = 1;
}
else
{
  //sinon on récupére l'adresse actuelle du membre
  $sql_recupmembre = "SELECT *
                       FROM membre
                       WHERE id_membre = '" . $_SESSION["id_membre"] . "'
                       ;";
  $sql_recupmembre_result = mysqli_query($link,$sql_recupmembre);
  $recupmembre = mysqli_fetch_array($sql_recupmembre_result);
  $_POST["facturation_civilite"] = $recupmembre["civilite"];
  $_POST["facturation_nom"] = $recupmembre["nom"];
  $_POST["facturation_prenom"] = $recupmembre["prenom"];
  $_POST["facturation_adresse1"] = $recupmembre["adresse1"];
  $_POST["facturation_adresse2"] = $recupmembre["adresse2"];
  $_POST["facturation_adresse3"] = $recupmembre["adresse3"];
  $_POST["facturation_ville"] = $recupmembre["ville"];
  $_POST["facturation_etat"] = $recupmembre["etat"];
  $_POST["facturation_cp"] = $recupmembre["cp"];
  $_POST["facturation_pays"] = $recupmembre["pays"];
}

if (!$error_livr)
//S'il les champs sont correctement renseignés (!$erreur_facturation)
{
  //on enregistre l'adresse de facturation dans la table des facturations
  $sql_facturation = "INSERT INTO facturation(`id_facturation`,`civilite`,
                                              `nom`,`prenom`,`adresse1`,
                                              `adresse2`,`adresse3`,`ville`,
                                              `etat`,`cp`,`pays`)
                      VALUES(
                             '',
                             '". mysqli_real_string($link,$_POST["facturation_civilite"])."',
                             '". mysqli_real_string($link,$_POST["facturation_nom"])."',
                             '". mysqli_real_string($link,$_POST["facturation_prenom"])."',
                             '". mysqli_real_string($link,$_POST["facturation_adresse1"])."',
                             '". mysqli_real_string($link,$_POST["facturation_adresse2"])."',
                             '". mysqli_real_string($link,$_POST["facturation_adresse3"])."',
                             '". mysqli_real_string($link,$_POST["facturation_ville"])."',
                             '". mysqli_real_string($link,$_POST["facturation_etat"])."',
                             '". mysqli_real_string($link,$_POST["facturation_cp"])."',
                             '". mysqli_real_string($link,$_POST["facturation_pays"])."'
                            );";
  mysqli_query($link,$sql_facturation);

  //on passe l'id de cette facturation en session
  $_SESSION["id_facturation"] = mysqli_insert_id($link);

  //on lie cette facturation à la commande
  $sql_facturation = "UPDATE commande
                    SET id_facturation = '".mysqli_real_string($link,$_SESSION["id_facturation"])."'
                    WHERE id_commande = '".mysqli_real_string($link,$_SESSION["id_commande"])."'
                  ;";
  mysqli_query($link,$sql_facturation);

  //on envoie sur la page de selection du mode de paiement
  $redirection =  "Location: index.php?page=formfraisport";
}
else
{
  if ($_POST["facturation_precise"] == "1")
  {
		if (isset($_POST["facturation_civilite"]))
		{
    	$_SESSION["facturation_civilite"] = $_POST["facturation_civilite"];
    }
		$_SESSION["facturation_nom"] = $_POST["facturation_nom"];
    $_SESSION["facturation_prenom"] = $_POST["facturation_prenom"];
    $_SESSION["facturation_adresse1"] = $_POST["facturation_adresse1"];
    $_SESSION["facturation_adresse2"] = $_POST["facturation_adresse2"];
    $_SESSION["facturation_adresse3"] = $_POST["facturation_adresse3"];
    $_SESSION["facturation_ville"] = $_POST["facturation_ville"];
    $_SESSION["facturation_etat"] = $_POST["facturation_etat"];
    $_SESSION["facturation_cp"] = $_POST["facturation_cp"];
    $_SESSION["facturation_pays"] = $_POST["facturation_pays"];
  }
  $_SESSION["facturation_precise"] = $_POST["facturation_precise"];

  //on renvoie l'erreur sur le formulaire de facturation
  $_SESSION["error_livr"] = $error_livr;

	$redirection =  "Location: index.php?page=facturationprecise";
}

if ($_POST['precis'] == 1)
{
  //on envoie sur le formulaire permettant de préciser
  $redirection =  "Location: index.php?page=facturationprecise";
}

if($_POST['premierpassage'] == 1)
	$_SESSION["error_livr"] = "";

header($redirection);
?>
