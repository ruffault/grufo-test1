<?php
session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

$temp = $_SESSION['applicationlang'];

// On fait expirer la session dans la base
$sql_expire = "UPDATE `utilisateur`
              SET dateexpire = '" . date("2002-m-d H:i:s"). "'
              WHERE `sessionid`='" . $_SESSION["sessionid"] . "';";
mysqli_query($link,$sql_expire);

// Unset all of the session variables.
session_unset();
// Finally, destroy the session.
session_destroy();

// On efface le cookie
foreach ($_COOKIE as $key => $value)
{
	setcookie($key, "", time() - 3600);
	setcookie($key, "", time() - 3600, "/",".dicoland.com");
	setcookie($key, "", time() - 3600, "/","dicoland.com");
}

// On repasse la langue actuelle
$redirection =  "Location: index.php?aplan=$temp";

header($redirection);
?>
