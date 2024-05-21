<?php
//on verifie que le panier n'est pas vide.
$sql_showpanier = "SELECT panier.id_produit
									FROM panier
                  WHERE panier.id_commande = '" . $_SESSION["id_commande"] . "'
                  GROUP BY panier.id_produit
                  ;";
$sql_showpanier_result = mysql_query($sql_showpanier);
if (mysql_num_rows($sql_showpanier_result) > 0)
{
  $poid_cmd = poid_commande($_SESSION['id_commande']);

  $frais_port = all_frais_port($poid_cmd, $_SESSION["id_livraison"]);
	$unique = 1;

	if (isset($frais_port[1]))
		$unique = 0;

	$smarty->assign("unique", $unique);
	$smarty->assign("frais_port", $frais_port);

//  $smarty->assign("port_eco", $port_eco);
//  $smarty->assign("port_prio", $port_prio);

}
else
{
  //Si le panier est vide on renvoie sur le panier
  $redirection = "Location: index.php?page=showpanier";
  header($redirection);
}
?>
