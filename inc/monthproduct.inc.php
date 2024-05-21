<?php
//Select product of the month
$sql = "SELECT  produit.id_produit, produit.nom_$applicationlang as nom, produit.description_$applicationlang as description,
				categorie.nom_$applicationlang as categorie
				FROM produit, categorie
				WHERE produit.id_categorie = categorie.id_categorie
				and monthbook = 1
				LIMIT 1;";
$res = mysqli_query($link,$sql);
$val = mysqli_fetch_array($res);
$monthproduct['id_produit'] = $val['id_produit'];
$monthproduct['nom'] = $val['nom'];
$monthproduct['categorie'] = $val['categorie'];
$monthproduct['description'] = $val['description'];



$smarty->assign("monthproduct", $monthproduct);
?>
