<?php
$smarty->assign("namesite", $namesite);
$smarty->assign("urlsite", $urlsite);
$smarty->assign("originalurl", $originalurl);
$smarty->assign("mailwebaster", $mailwebmaster);
$smarty->assign("mailadmin", $mailadmin);
$smarty->assign("mailcoordonnee", $mailcoordonnee);
// je rajoute l'url d'origine avant rewrite que je mets dans "urisite"
$smarty->assign("urisite", substr($originalurl, 0, -1).$_SERVER['REQUEST_URI']);

if ($_SESSION['applicationlang'] or !$applicationlang)
	$applicationlang = $_SESSION['applicationlang'];
$smarty->assign("applicationlang", $applicationlang);
$smarty->display($applicationlang . "/index.tpl");

?>
