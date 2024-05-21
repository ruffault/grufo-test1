
<?php
if ($_SESSION["id_membre"])
{
	if ($ebooktek = give_ebooktheque($_SESSION["id_membre"])){
		//le membre a une ebooktheque. on passe les bonnes données vers les templates
$_SESSION['ebook']  = true; 
	$smarty->assign("ebooktek", (isset($ebooktek) ? $ebooktek : '') );

	}
}
?>
