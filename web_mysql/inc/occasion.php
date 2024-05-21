<?php
$sql = "SELECT produit.id_produit
				FROM `produit`
				WHERE produit.occasion = 1
				AND produit.sommeil <> 1
				ORDER BY produit.date_parution DESC
				;";
$res = mysql_query($sql);

$i = 0;
while($val = mysql_fetch_array($res))
{
	$vitrine[$i] = give_product($val['id_produit']);
	$i++;
}


$smarty->assign("vitrine", $vitrine);

?>