<?php

$basket = give_basket($_SESSION["id_commande"]);

// Recuperation des id des ouvrages dans un tableau
if ($basket)
{
	$basket_summary = basket_summary($basket);

	$smarty->assign("panier", $basket);
	$smarty->assign("quantite_totale", $basket_summary['total_quantite']);
	$smarty->assign("prix_ht_total", $basket_summary['total_ht']);
	$smarty->assign("prix_ht_total_rabais", $prix_ht_total_rabais);
	$smarty->assign("prix_total", $basket_summary['total_ttc']);
	$smarty->assign("prix_total_rabais", $prix_total_rabais);
	$smarty->assign("tva_totale", $basket_summary['total_taxe']);
	$smarty->assign("tva_totale_rabais", $tva_totale_rabais);
	$smarty->assign("delai_max", $basket_summary['total_delai']);
}
?>
