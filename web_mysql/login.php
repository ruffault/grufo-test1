<?php

session_start();
session_name("dicoland");

require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

$is_valid = 0;

$sql_verifuser = "SELECT id_membre
                 FROM membre
                 WHERE (login = '".$_POST["login_identification"]."'
                 OR email = '".$_POST["login_identification"]."')
                 AND password = '".md5($_POST["password_identification"])."'
                 AND enable = 1
								 ;";
$sql_verifuser_result = mysql_query($sql_verifuser);
$sql_verifuser_result2 = mysql_query($sql_verifuser);

//si l'utilisateur existe
if (mysql_fetch_row($sql_verifuser_result))
{
	$is_valid = 1;
  $val_id_user = mysql_fetch_array($sql_verifuser_result2);
  /*on supprime la session courante pour créer la nouvelle
  on supprime donc la session et le cookie de session*/
  $_SESSION["sessionid"] = "";

	foreach ($_COOKIE as $key => $value)
	{
		setcookie($key, "", time() - 3600);
		setcookie($key, "", time() - 3600, "/",".dicoland.com");
		setcookie($key, "", time() - 3600, "/","dicoland.com");
	}

	//on passe l'id du membre en variable pour le fichier createcookie
  $idmembre = $val_id_user['id_membre'];

  //on cree la session
  include("inc/createcookie.inc.php");
}

if ($is_valid == 1)
	$redirection = "Location: index.php?page=myaccount";
else
{
	$redirection = "Location: index.php?page=myaccount&badlogin=1";
}

header($redirection);

?>
