<?php

session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';
//$basket = give_basket($_SESSION["id_commande"]);
//$tot=basket_summary($basket);
if ($_SESSION["id_membre"] == "" or !$_SESSION["id_membre"])
  $redirection =  "Location: index.php?page=alreadymember";
elseif ($_SESSION['total_ebook'] != 0 && $_SESSION['total_ebook'] == $_SESSION['total_produits'])
	$redirection = "Location: index.php?page=formfacturation";	
	else
  $redirection =  "Location: index.php?page=formlivraison";
header($redirection);

?>
