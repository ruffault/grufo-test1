<?php

session_start();
session_name("dicoland");

require 'inc/function2.inc.php';
$tps_start = get_microtime();
echo "je suis la";
require_once '/usr/share/php/smarty/libs/Smarty.class.php';
//require_once '/var/www/clients/client1/web1/web/Smarty.class.php';


$smarty = new Smarty;

// controle manuel du vidage du cache
if (isset($_GET["PURGECACHE"]) && $_GET["PURGECACHE"] == 1)
{
	// désactive le cache
	$smarty->caching = false;
	// efface tous les fichiers du cache
	$smarty->clear_all_cache();
}
// 

// controle manuel du DEBUGGAGE SMARTY
if ((isset($_GET["DEBUG"]) && $_GET["DEBUG"] == 1) || (isset($_POST["DEBUG"]) && $_POST["DEBUG"] == 1))
{
	// désactive le cache
	$smarty->debugging = true;
}
//


require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'countvisite.inc.php';
require 'inc/session.inc.php';


if (good_lang($_GET['aplan']))
{
	// Si lang valide on la switch dans la session
	$_SESSION['applicationlang'] = $_GET['aplan'];

	if (!empty($_SESSION["id_membre"]) && $_SESSION["id_membre"] != 0)
	{
		// Si c'est un membre on met à jour sa langue.
		$sql = "UPDATE `membre`
						SET `aplan` = '" . $_GET['aplan'] . "'
						WHERE `id_membre` = '" . $_SESSION["id_membre"]  . "'
						LIMIT 1;";
		$res = mysql_query($sql);
	}
}

//echo "test2";
?>
