<?php

$mini = give_basket($_SESSION["id_commande"]);
$mini_summary = basket_summary($mini);

// Recuperation des id des ouvrages dans un tableau
if ($mini)
{
	$smarty->assign("mini_panier", $mini);
	$smarty->assign("mini_quantite_totale", $mini_summary['total_quantite']);
	$smarty->assign("mini_prix_ht_total", $mini_summary['total_ht']);
	$smarty->assign("mini_prix_ht_total_rabais", $prix_ht_total_rabais);
	$smarty->assign("mini_prix_total", $mini_summary['total_ttc']);
	$smarty->assign("mini_prix_total_rabais", $prix_total_rabais);
	$smarty->assign("mini_tva_totale", $mini_summary['total_taxe']);
	$smarty->assign("mini_tva_totale_rabais", $tva_totale_rabais);
	$smarty->assign("mini_delai_max", $mini_summary['total_delai']);
}

?>
