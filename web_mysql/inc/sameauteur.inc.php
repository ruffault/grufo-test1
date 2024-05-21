<?php

if (!$_GET["idcat"])
{
  $_GET["idcat"] = 0;
}

$sql = "SELECT produit.id_produit
				FROM produit, auteur
				WHERE auteur.id_auteur = '$auteur'
				AND produit.id_auteur = auteur.id_auteur
				AND produit.id_produit <> '". $_GET["id"] ."'
				AND produit.sommeil <> 1
				ORDER BY image DESC
				LIMIT 20;";
$res = mysql_query($sql);

$i = 0;
while($val = mysql_fetch_array($res))
{
	$sameauteur[$i] = give_product($val['id_produit']);
  $i++;
}

$smarty->assign("sameauteur", $sameauteur);

?>
