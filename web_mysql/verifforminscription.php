<?php
session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

function first_referers($ip)
{
	if(isset($ip))
	{
		$sql = "SELECT referant
					FROM log
					WHERE ip = '" . addslashes($ip) . "'
					AND referant NOT LIKE '%dicoland.com%'
					AND referant <> ''
					AND date < NOW()
					ORDER BY date DESC LIMIT 1;";
		$res = mysql_query($sql);
		$val = mysql_fetch_assoc($res);
		if(isset($val['referant']))
		{
			$referant = str_replace('http://', '',$val['referant']);
			$referant = str_replace('www.', '',$referant);
			$referant = ereg_replace('/*', '',$referant);

			return $referant;
		}
	}
	return 'dicoland.com';

}

//On enléve les erreurs
$_SESSION['error_inscript'] = '';


// on test les variables
if (checklogin($_POST["inscription_login"]))
  $error_inscript['badpseudo'] = 1;

//test du login (on verifie qu'il n'est pas déja pris)
$sql_verifloginexist = "SELECT login
                        FROM membre
                        WHERE login = '" . addslashes($_POST["inscription_login"]) . "'
                        ;";
$sql_verifloginexist_result = mysql_query($sql_verifloginexist);
if (mysql_num_rows($sql_verifloginexist_result))
  $error_inscript['loginexist'] = 1;

//test si cet email ne posséde pas déja un compte
$sql_verifemailexist = "SELECT email
                        FROM membre
                        WHERE email = '" . addslashes($_POST["inscription_email"]) . "'
                        ;";
$sql_verifemailexist_result = mysql_query($sql_verifemailexist);
if (mysql_num_rows($sql_verifemailexist_result))
  $error_inscript['mailexist'] = 1;

if (checkmail($_POST["inscription_email"]))
  $error_inscript['badmail'] = 1;

if (checkpass($_POST["inscription_password"]))
	$error_inscript['badpass'] = 1;

if (checkverif($_POST["inscription_password"],$_POST["inscription_confirmation"]))
  $error_inscript['passnotegalconf'] = 1;

if (checkname($_POST["inscription_nom"]))
	$error_inscript['badname'] = 1;

if (checkname($_POST["inscription_prenom"]))
  $error_inscript['badsurname'] = 1;

if (checkadresse($_POST["inscription_adresse1"]))
	$error_inscript['badadress'] = 1;

if (checkadresse($_POST["inscription_ville"]))
	$error_inscript['badcity'] = 1;

//Cleaning zipcode, phone and fax
if ($_POST["inscription_cp"])
	$_POST["inscription_cp"] = clean_cp($_POST["inscription_cp"]);
if ($_POST["inscription_tel"])
	$_POST["inscription_tel"] = clean_str($_POST["inscription_tel"]);
if ($_POST["inscription_fax"])
	$_POST["inscription_fax"] = clean_str($_POST["inscription_fax"]);


//Le code postal est t'il obligatoire ?
if ($_POST["inscription_pays"] && !$_POST["inscription_cp"])
{
  $sql_cp_oblig = "SELECT *
                   FROM pays
                   WHERE cp_obligatoire = 1
                   AND abrev = '" . $_POST["inscription_pays"] . "'
                   LIMIT 1;";
  $res_cp_oblig = mysql_query($sql_cp_oblig);
  if (mysql_num_rows($res_cp_oblig))
    $error_inscript['nocp'] = 1;
}
elseif(checkcp($_POST["inscription_cp"]))
  $error_inscript['badcp'] = 1;

if (checkname($_POST["inscription_etat"]) && $_POST["inscription_etat"])
  $error_inscript['badstate'] = 1;
if (checkname($_POST["inscription_pays"]))
  $error_inscript['country'] = 1;
if (checktel($_POST["inscription_tel"]))
	$error_inscript['badphone'] = 1;
if (checktel($_POST["inscription_fax"]) && $_POST["inscription_fax"])
	$error_inscript['badfax'] = 1;

if (isset($_POST["inscription_info"]))
  $_POST["inscription_info"] = '1';

//Si les champs sont renseignés et que le login n'est pas dans la base
if (!$error_inscript)
{
  //on enregistre l'utilisateur dans les membres
  $sql_newmember = "INSERT INTO membre(
                                        id_membre,
                                        login,
                                        `password`,
                                        email,
                    										mailinglist,
                                        societe,
                                        nomsociete,
                                        intracommu,
                               					civilite,
                                        nom,
                                        prenom,
                                        adresse1,
                                        adresse2,
                                        adresse3,
                                        ville,
                                        etat,
                                        cp,
                                        pays,
																				indicatif_tel,
                                        tel,
																				indicatif_fax,
																				fax,
																				aplan,
																				inscr_date,
																				provenance
                                      )
                    VALUES(
                          '',
                          '".addslashes($_POST["inscription_login"])."',
                          '".md5($_POST["inscription_password"])."',
                          '".addslashes($_POST["inscription_email"])."',
                          '".addslashes($_POST["inscription_info"])."',
                          '".addslashes($_POST["inscription_societe"])."',
                          '".addslashes($_POST["inscription_nomsociete"])."',
                          '".addslashes($_POST["inscription_intracommu"])."',
                          '".addslashes($_POST["inscription_civilite"])."',
                          '".addslashes($_POST["inscription_nom"])."',
                          '".addslashes($_POST["inscription_prenom"])."',
                          '".addslashes($_POST["inscription_adresse1"])."',
                          '".addslashes($_POST["inscription_adresse2"])."',
                          '".addslashes($_POST["inscription_adresse3"])."',
                          '".addslashes($_POST["inscription_ville"])."',
                          '".addslashes($_POST["inscription_etat"])."',
                          '".addslashes($_POST["inscription_cp"])."',
                          '".addslashes($_POST["inscription_pays"])."',
                          '".addslashes($_POST["inscription_indicatif_tel"])."',
                          '".addslashes($_POST["inscription_tel"])."',
                          '".addslashes($_POST["inscription_indicatif_fax"])."',
                          '".addslashes($_POST["inscription_fax"])."',
													'".addslashes($_SESSION['applicationlang'])."',
                          '".date("Y-m-d")."',
													'".first_referers($_SERVER['REMOTE_ADDR'])."'
													)
                   ;";

  mysql_query($sql_newmember);

  //on r øcup øre l'id du nouveau membre
  $sql_newiduser = "SELECT id_membre
                    FROM membre
                    WHERE login = '".$_POST["inscription_login"]."'
                    AND password = '".md5($_POST["inscription_password"])."'
                    ;";
  $sql_newiduser_result = mysql_query($sql_newiduser);
  $val = mysql_fetch_array($sql_newiduser_result);
  $idmembre = $val['id_membre'];

  //on stock l'id de l'ancienne commande
  $_SESSION["old_commande"] = $_SESSION["id_commande"];
  if (isset($val_sql_newiduser["id_membre"]))
  {
    $_SESSION["id_membre"] = $val_sql_newiduser["id_membre"];
  }
  $_SESSION["email"] = $_POST["inscription_email"];
  $_SESSION["societe"] = $_POST["inscription_societe"];
  $_SESSION["nomsociete"] = $_POST["inscription_nomsociete"];
  $_SESSION["intracommu"] = $_POST["inscription_intracommu"];
  $_SESSION["login"] = $_POST["inscription_login"];
  $_SESSION["password"] = $_POST["inscription_password"];
  $_SESSION["nom"] = $_POST["inscription_nom"];
  $_SESSION["prenom"] = $_POST["inscription_prenom"];

  //on passe l'id de l'ancien panier de cot ø $_SESSION["olddecote"] = $_SESSION["id_user"];

  //on efface les sessions et le cookie de l'utilisateur
  $_SESSION["sessionid"] = "";
  $_SESSION["id_commande"] = "";
	foreach ($_COOKIE as $key => $value)
	{
		setcookie($key, "", time() - 3600);
		setcookie($key, "", time() - 3600, "/",".dicoland.com");
		setcookie($key, "", time() - 3600, "/","dicoland.com");
	}

  //et on cr øe le nouveau
  include('inc/createcookie.inc.php');

  if (isset($_POST["newaccount"]) && $_POST["newaccount"] == 1)
    header("Location: movepanier.php?newaccount=1");
  //Sinon on envoie sur une autre page afin de recharger le cookie
  else
    header("Location: movepanier.php");
}
else
{
  $_SESSION["inscription_login"] = $_POST["inscription_login"];
  $_SESSION["inscription_password"] = $_POST["inscription_password"];
  $_SESSION["inscription_confirmation"] = $_POST["inscription_confirmation"];
  if (isset($_POST["inscription_civilite"]))
  {
    $_SESSION["inscription_civilite"] = $_POST["inscription_civilite"];
  }
  else
  {
    $_SESSION["inscription_civilite"] = '';
  }
  $_SESSION["inscription_nom"] = $_POST["inscription_nom"];
  $_SESSION["inscription_prenom"] = $_POST["inscription_prenom"];
  $_SESSION["inscription_adresse1"] = $_POST["inscription_adresse1"];
  $_SESSION["inscription_adresse2"] = $_POST["inscription_adresse2"];
  $_SESSION["inscription_adresse3"] = $_POST["inscription_adresse3"];
  $_SESSION["inscription_ville"] = $_POST["inscription_ville"];
  $_SESSION["inscription_etat"] = $_POST["inscription_etat"];
  $_SESSION["inscription_cp"] = $_POST["inscription_cp"];
  $_SESSION["inscription_pays"] = $_POST["inscription_pays"];
  $_SESSION["inscription_indicatif_tel"] = $_POST["inscription_indicatif_tel"];
  $_SESSION["inscription_tel"] = $_POST["inscription_tel"];
  $_SESSION["inscription_indicatif_fax"] = $_POST["inscription_indicatif_fax"];
  $_SESSION["inscription_fax"] = $_POST["inscription_fax"];
  $_SESSION["inscription_email"] = $_POST["inscription_email"];
  if (isset($_POST["inscription_societe"]))
  {
    $_SESSION["inscription_societe"] = $_POST["inscription_societe"];
  }
	else
  {
    $_SESSION["inscription_societe"] = '';
  }
  if (isset($_POST["inscription_nomsociete"]))
  {
    $_SESSION["inscription_nomsociete"] = $_POST["inscription_nomsociete"];
  }
  else
  {
    $_SESSION["inscription_nomsociete"] = '';
  }

  if (isset($_POST["inscription_intracommu"]))
  {
    $_SESSION["inscription_intracommu"] = $_POST["inscription_intracommu"];
  }
  else
  {
    $_SESSION["inscription_intracommu"] = '';
  }
  if (isset($_POST["inscription_info"]))
  {
    $_SESSION["inscription_info"] = $_POST["inscription_info"];
  }
	else
  {
    $_SESSION["inscription_info"] = '';
  }
  // on passe  øgalement les erreurs en session
  $_SESSION["error_inscript"] = $error_inscript;

  // on renvoie sur le formulaire d'inscription en indiquant les erreurs
  if (isset($_POST["newaccount"]) && $_POST["newaccount"] == 1)
  {
    $redirection = "Location: index.php?page=forminscription&newaccount=1&error=1";
  }
  else
  {
    $redirection = "Location: index.php?page=forminscription&error=1";
	}
  header($redirection);
}
?>
