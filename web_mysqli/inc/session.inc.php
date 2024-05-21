<?php

if (!isset($_SESSION["sessionid"]))
{
	$_SESSION["sessionid"] = '';
}

//on regarde si la session ne viens pas d'expirer dans la base
$session_query = "SELECT sessionid
                  FROM utilisateur
                  WHERE sessionid = '" . $_SESSION["sessionid"] . "'
                  AND dateexpire > '" . date("Y-m-d H:i:s") . "'
                  ;";
$session_result = mysqli_query($link,$session_query);

// si elle n'est pas valide on la detruit
if (mysqli_num_rows($session_result) < 1)
  session_unset();

//On passe le cookie en id de session
if(isset($HTTP_COOKIE_VARS["sessionid"]))
  $_SESSION["sessionid"] = $_COOKIE["sessionid"];

if (!isset($_SESSION["sessionid"]))
{
	$_SESSION["sessionid"] = '';
}

//la session est-elle valide ?
$session_query = "SELECT sessionid
                  FROM utilisateur
                  WHERE sessionid = '" . $_SESSION["sessionid"] . "'
                  AND dateexpire > '" . date("Y-m-d H:i:s") . "'
                  ;";
$session_result = mysqli_query($link,$session_query);

// si elle n'est pas valide on la detruit
if (mysqli_num_rows($session_result) < 1 && isset($_SESSION["sessionid"]))
  session_unset();

if (!$_SESSION['applicationlang'] or $_SESSION['applicationlang'] == '')
{
	if($_GET['aplan'])
	{
		$_SESSION['applicationlang'] = $_GET['aplan'];
		$applicationlang = $_GET['aplan'];
	}
	elseif(good_lang(substr(getenv("HTTP_ACCEPT_LANGUAGE"),0,2)))
	{
		$_SESSION['applicationlang'] = substr(getenv("HTTP_ACCEPT_LANGUAGE"),0,2);
		$applicationlang = substr(getenv("HTTP_ACCEPT_LANGUAGE"),0,2);
	}
	else
	{
		$_SESSION['applicationlang'] = 'fr';
		$applicationlang = 'fr';
	}
}
else
	$applicationlang = $_SESSION['applicationlang'];


if (!isset($_SESSION["sessionid"]) or $_SESSION["sessionid"] == '')
  include("inc/createcookie.inc.php");

/* Maintenant qu'on a forcement un id de
session on lis les infos de celui-ci et on
les passes en session */

//on recupere l'id de l'utilisateur
$sql_iduser = "SELECT id_utilisateur, id_membre
               FROM utilisateur
               WHERE sessionid = '".$_SESSION["sessionid"]."';";
$sql_iduser_result = mysqli_query($link,$sql_iduser);
$val_iduser = mysqli_fetch_array($sql_iduser_result);

$_SESSION["id_user"] = $val_iduser["id_utilisateur"];
$_SESSION["id_membre"] = $val_iduser["id_membre"];

//on recupere la derniere commande en cours qui n'a pas ete validee
//s'il n'en existe pas, on en cree une
if (!$_SESSION["id_membre"] or $_SESSION["id_membre"] == "" or $_SESSION["id_membre"] == 0)
{
  $sql_selectlastcommande="SELECT id_commande, code
                        FROM commande, utilisateur
                        WHERE utilisateur.id_membre = '0'
                        AND utilisateur.sessionid='".$_SESSION["sessionid"]."'
                        AND commande.id_utilisateur=utilisateur.id_utilisateur
                        AND statut='0'
                        ORDER BY id_commande DESC
                        LIMIT 1
                        ;";
}
else
{
  $sql_selectlastcommande="SELECT id_commande, code
                        FROM commande, utilisateur, membre
                        WHERE membre.id_membre='".$_SESSION["id_membre"]."'
                        AND utilisateur.id_membre = membre.id_membre
                        AND commande.id_utilisateur=utilisateur.id_utilisateur
                        AND statut='0'
                        ORDER BY id_commande DESC
                        LIMIT 1
                        ;";
}
$sql_selectlastcommande_result = mysqli_query($link,$sql_selectlastcommande);

//S'il ya une precedente commande non validee on recupere son id
if (mysqli_num_rows($sql_selectlastcommande_result) > 0)
{
  $sql_selectlastcommande_result2 = mysqli_query($link,$sql_selectlastcommande);
  $val_lastcommande = mysqli_fetch_array($sql_selectlastcommande_result2);
  $id_commande = $val_lastcommande["id_commande"];
  $code_cmd = $val_lastcommande["code"];
}
else{
  $code_cmd = code_cmd();
  //Sinon on cree une nouvelle commande non validee
  $sql_newcommande = "INSERT INTO commande(id_commande,
                                           id_utilisateur,
                                           date_creation,
                                           statut,
                                           code)
                     VALUES('',
                            '" . $_SESSION["id_user"] . "',
                            '" . date("Y-m-d H:i:s") . "',
                            '0',
                            '" . $code_cmd . "' 
                           );";
  mysqli_query($link,$sql_newcommande);

  //et on recupere son id
  if (!$_SESSION["id_membre"] or $_SESSION["id_membre"] == "" or $_SESSION["id_membre"] == 0)
  {
    $sql_selectlastcommande="SELECT id_commande
                        FROM commande, utilisateur
                        WHERE utilisateur.id_membre='0'
                        AND utilisateur.sessionid='".$_SESSION["sessionid"]."'
                        AND commande.id_utilisateur=utilisateur.id_utilisateur
                        AND statut='0'
                        ORDER BY id_commande DESC
                        LIMIT 1
                        ;";
  } 
  else
  {
    $sql_selectlastcommande="SELECT id_commande
                        FROM commande, utilisateur, membre
                        WHERE membre.id_membre='".$_SESSION["id_membre"]."'
                        AND utilisateur.id_membre = membre.id_membre
                        AND commande.id_utilisateur=utilisateur.id_utilisateur
                        AND statut='0'
                        ORDER BY id_commande DESC
                        LIMIT 1
                        ;";
  }
                           
  $sql_selectlastcommande_result = mysqli_query($link,$sql_selectlastcommande);
  $val_lastcommande = mysqli_fetch_array($sql_selectlastcommande_result);
  $id_commande = $val_lastcommande["id_commande"];
}
$_SESSION["id_commande"] = $id_commande;
refresh_basket($_SESSION['id_commande']);
$_SESSION["code_cmd"] = $code_cmd;

//on recupere toutes les infos du membre
if ($_SESSION["id_membre"]<>'0')
{
  $allabout = "SELECT *
               FROM membre, pays
               WHERE id_membre = '".$_SESSION["id_membre"]."'
               AND membre.pays = pays.abrev
               ;";
  $allabout_result = mysqli_query($link,$allabout);

  $val_allabout = mysqli_fetch_array($allabout_result);
  $_SESSION["loginuser"] = $val_allabout["login"];
  $_SESSION["nom"] = $val_allabout["nom"];
  $_SESSION["prenom"] = $val_allabout["prenom"];
  $_SESSION["email"] = $val_allabout["email"];
  $_SESSION["intracommu"] = $val_allabout["intracommu"];
  $_SESSION["societe"] = $val_allabout["societe"];
  $_SESSION["pays"] = $val_allabout["pays"];
  $_SESSION["europe"] = $val_allabout["europe"];
  $_SESSION["ht"] = typeprice($val_allabout["societe"],
  	$val_allabout["intracommu"],$val_allabout["europe"]);
//	if (!$_SESSION['applicationlang'])
//	{
		$_SESSION['applicationlang'] = $val_allabout['aplan'];
		$applicationlang = $val_allabout['aplan'];
//	}
}
//echo "test";
?>
