<?php

$basket = give_basket($_SESSION["id_commande"]);

if ($basket != false)
{
	$basket_summary = basket_summary($basket);
	$address = order_address($_SESSION["id_commande"], $applicationlang);
	$poid_cmd = poid_commande($_SESSION['id_commande']);
	$frais_port = frais_port($poid_cmd, $_SESSION["id_livraison"]);
	$smarty->assign("panier", $basket);

	$smarty->assign("basket", $basket);
	$smarty->assign("address", $address);
	$smarty->assign("frais_port", $frais_port[0]['prix']);
	$smarty->assign("quantite_totale", $basket_summary['total_quantite']);
	$smarty->assign("tva_totale", $basket_summary['total_taxe']);
	$smarty->assign("prix_ht_total", $basket_summary['total_ht']);
	$smarty->assign("prix_total", $basket_summary['total_ttc']);
	$delai_livraison = $basket_summary['total_delai'] + delai_livraison($frais_port[0]['mode']);
	$smarty->assign("delai_max", $delai_livraison);

	if ($_SESSION['ht'] == 'ht')
	{
	  $smarty->assign("soustotal", twodecimal($basket_summary['total_ht'] + $frais_port[0]['prix']));
	}
	else
	{
	  $smarty->assign("soustotal", twodecimal($basket_summary['total_ttc'] + $frais_port[0]['prix']));
	}
}
else
{
  //Si le panier est vide on renvoie sur la page panier
  $redirection = "Location: index.php?page=showpanier";
  header($redirection);
}

?>
