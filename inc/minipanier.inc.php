<?php

$mini = give_basket($_SESSION["id_commande"]);
$mini_summary = basket_summary($mini);
// Recuperation des id des ouvrages dans un tableau
if ((isset($mini) ? $mini : '') )
{
	$smarty->assign("mini_panier", (isset($mini) ? $mini : '') );
	$smarty->assign("mini_quantite_totale", (isset($mini_summary['total_quantite']) ? $mini_summary['total_quantite'] : '') );
	$smarty->assign("mini_prix_ht_total", (isset($mini_summary['total_ht']) ? $mini_summary['total_ht'] : '')) ;
	$smarty->assign("mini_prix_ht_total_rabais", (isset($prix_ht_total_rabais) ? $prix_ht_total_rabais : '')) ;
	$smarty->assign("mini_prix_total", (isset($mini_summary['total_ttc']) ? $mini_summary['total_ttc'] : '')) ;
	$smarty->assign("mini_prix_total_rabais", (isset($prix_total_rabais) ? $prix_total_rabais : '')) ;
	$smarty->assign("mini_tva_totale", (isset($mini_summary['total_taxe']) ? $mini_summary['total_taxe'] : '')) ;
	$smarty->assign("mini_tva_totale_rabais", (isset($tva_totale_rabais) ? $tva_totale_rabais : '')) ;
	$smarty->assign("mini_delai_max", (isset($mini_summary['total_delai']) ? $mini_summary['total_delai'] : '')) ;
	$smarty->assign("total_ebook", (isset($mini_summary['total_ebook']) ? $mini_summary['total_ebook'] : '')) ;
	$smarty->assign("total_produits", (isset($mini_summary['total_produits']) ? $mini_summary['total_produits'] : '')) ;
	$_SESSION['total_produits'] = (isset($mini_summary['total_produits']) ? $mini_summary['total_produits'] : '');
	$_SESSION['total_ebook'] = (isset($mini_summary['total_ebook']) ? $mini_summary['total_ebook'] : '');

}

?>
