<?php

if (!isset($_GET["idcat"]))
{
  $_GET["idcat"] = 0;
}

$sql = "SELECT produit.id_produit
				FROM produit, vitrine
				WHERE produit.id_produit = vitrine.id_produit
				AND produit.sommeil <> 1
				AND produit.affaire <> 1
				ORDER BY vitrine.pos ASC
				;";
$res = mysql_query($sql);

$i = 0;
while($val = mysql_fetch_array($res))
{
	$vitrine[$i] = give_product($val['id_produit']);
	$i++;
}

$nomvitrine = 1;

$smarty->assign("vitrine", $vitrine);
$smarty->assign("nomvitrine", $nomvitrine)

?>
