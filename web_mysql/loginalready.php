<?php

session_start();
session_name("dicoland");
$oldnum = $_SESSION["id_commande"];

require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

$redirection = "Location: " . $_SERVER["HTTP_REFERER"] ."&badaccount=1";

//echo $_SESSION['id_user'];
$sql_verifuser = "SELECT id_membre
                 FROM membre
                 WHERE login = '".$_POST["login_identification"]."'
                 OR email = '".$_POST["login_identification"]."'
                 AND password = '".md5($_POST["password_identification"])."'
                 ;";
$sql_verifuser_result = mysql_query($sql_verifuser);
$sql_verifuser_result2 = mysql_query($sql_verifuser);

// if user exist
if (mysql_fetch_row($sql_verifuser_result))
{
	$_SESSION["old_commande"] = $_SESSION["id_commande"];

  $val_id_user = mysql_fetch_array($sql_verifuser_result2);
  /* Delete current session to create the new one
     so, we delete session an cookie session */
  $_SESSION["sessionid"] = "";

	foreach ($_COOKIE as $key => $value)
	{
		setcookie($key, "", time() - 3600);
		setcookie($key, "", time() - 3600, "/",".dicoland.com");
		setcookie($key, "", time() - 3600, "/","dicoland.com");
	}

	// give member id for createcookie script
  $idmembre = $val_id_user['id_membre'];

  // create session
  include("inc/createcookie.inc.php");
  $redirection = "Location: movepanier.php?alreadymember=1";

}
header($redirection);

?>
