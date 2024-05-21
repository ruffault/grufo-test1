<?php

session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

if ($_SESSION["id_membre"] == "" or !$_SESSION["id_membre"])
  $redirection =  "Location: index.php?page=alreadymember";
else
  $redirection =  "Location: index.php?page=formlivraison";
header($redirection);

?>
