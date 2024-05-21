<?php
include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");
include ("include/class.emailing.php");
include ("include/function.inc.php");
if (!isset($_GET['ID']) && !isset($_POST['ID']))
{
  echo "Impossible d'identifier cet emailing";
  return;
}
else
{
  $emailing = new emailing();
  if (isset($_GET['ID']))
  	$emailing -> lire_emailing($_GET['ID']);
  else if (isset($_POST['ID']))
  	$emailing -> lire_emailing($_POST['ID']);
  else
  	return;
}
$contenu = $emailing->CONTENU;
echo $contenu;
?>