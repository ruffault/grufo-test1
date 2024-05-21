<?php
// Permet de selectionner l'onglet qui sera indiqué comme page active : Catalogue, LMDD ou Mediqualis
$show_default_editeur = 0;
$default_editeur_id = 785;
$show_catalogue_lmdd = 0;
$show_catalogue_mediqualis = 0;
// On evite les id_editeurs foireux passes par l'url
if (!isset($_GET["idedit"]) || !is_numeric($_GET["idedit"]) || !id_editeur_exists($_GET["idedit"]) || !editeur_a_produits_online($_GET["idedit"]))
{
  $_GET["idedit"] = $default_editeur_id;
  $show_default_editeur = 1;
}
// Pour selectionner l'onglet adequate dans la barre de menu
if (isset($_GET["idedit"]) && is_numeric($_GET["idedit"]) && $_GET["idedit"] == $default_editeur_id)
{
  $show_catalogue_mediqualis = 1;
}
// Pour selectionner l'onglet adequate dans la barre de menu
if (isset($_GET["idedit"]) && is_numeric($_GET["idedit"]) && $_GET["idedit"] == 12)
{
  $show_catalogue_lmdd = 1;
}

$sql = "SELECT produit.id_produit, editeur.nom
	FROM `produit`, `editeur`
	WHERE produit.id_editeur = editeur.id_editeur
	AND editeur.id_editeur = '785 && 12'
	AND produit.sommeil <> 1
	ORDER BY produit.date_parution DESC
				;";
$res = mysql_query($sql);

$i = 0;
while($val = mysql_fetch_array($res))
{
	$vitrine[$i] = give_product($val['id_produit']);
	$nomediteur = $val['nom'];
	$i++;
}


// $nomediteur = 1;
$smarty->assign("id_editeur", $_GET["idedit"]);
$smarty->assign("vitrine", $vitrine);
$smarty->assign("nomediteur", $nomediteur);
$smarty->assign("show_default_editeur", $show_default_editeur);
$smarty->assign("show_catalogue_mediqualis", $show_catalogue_mediqualis);
$smarty->assign("show_catalogue_lmdd", $show_catalogue_lmdd);
?>