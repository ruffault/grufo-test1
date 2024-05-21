<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");
include ("include/function.inc.php");

if (isset($_GET['id_order']) && isset($_GET['id_basket']))
{
	$id_order = $_GET['id_order'];
	$id_basket = $_GET['id_basket'];

	recredit($id_basket, $id_order);
	copy_to_cancel($id_basket);
	delete_from_order($id_basket);

	// Supprimer les frais de port comme on supprime un produit
	// Possibiliter de le rayer de la liste du panier
	// revoir les fonctions liés au frais de port
	//

	// on recalcule le délai de livraison pour la commande

	// On met à jour les informations de la commande, nouveau prix_total_ht,
	// nouveaux prix_total_ttc, nouveau delay

	header('Location: index2.php?page=order&id_order=' . $id_order);
}

?>
