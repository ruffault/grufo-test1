<?php

function buy_same($id_product, $lang)
{
	$sql = 'SELECT  same.id_sameproduit as id, auteur.nom as auteur,
									produit.nom_' . $lang . ' as nom
					FROM same, produit, auteur
					WHERE same.id_produit =  "' . $id_product . '"
					AND same.id_sameproduit = produit.id_produit
					AND produit.id_auteur = auteur.id_auteur
					ORDER BY same.iter desc
					LIMIT 4;';
	$res = mysql_query($sql);
	$i = 0;
	while ($val = mysql_fetch_assoc($res))
	{
		$tab[$i]['id'] = $val['id'];
		$tab[$i]['nom'] = $val['nom'];
		$tab[$i]['auteur'] = $val['auteur'];
		$i++;
	}
	
	return $tab;
}

$tab_same = buy_same($_GET['id'], $applicationlang);
if (isset($tab_same))
	$smarty->assign("tab_same", $tab_same);

?>