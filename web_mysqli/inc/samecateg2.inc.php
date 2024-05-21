<?php

if (!$_GET["idcat"])
{
  $_GET["idcat"] = 0;
}

$sql = "SELECT produit.id_produit
				FROM produit, categorie, auteur
				WHERE categorie.id_categorie = '$categorie'
				AND produit.id_categorie = categorie.id_categorie
				AND produit.sommeil <> 1
				AND produit.id_auteur = auteur.id_auteur
				AND auteur.id_auteur <> '$auteur'
				ORDER BY image DESC
				LIMIT 20;";
$res = mysqli_query($link,$sql);

$i = 0;
while($val = mysqli_fetch_array($res))
{
	$samecateg2[$i] = give_product($val['id_produit']);
	$i++;
}

$smarty->assign("samecateg2", $samecateg2);

?>
