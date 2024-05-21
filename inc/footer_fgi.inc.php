<?php
$smarty->assign("namesite", $namesite);
$smarty->assign("urlsite", $urlsite);
$smarty->assign("originalurl", $originalurl);
$smarty->assign("mailwebaster", $mailwebmaster);
$smarty->assign("mailadmin", $mailadmin);
$smarty->assign("mailcoordonnee", $mailcoordonnee);

if ($_SESSION['applicationlang'] or !$applicationlang)
	$applicationlang = $_SESSION['applicationlang'];
$smarty->assign("applicationlang", $applicationlang);
$smarty->display($applicationlang . "/index_fgi.tpl");

?>
