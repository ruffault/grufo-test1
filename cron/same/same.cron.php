<?php

function add_same($id_produit, $id_same, $iter)
{
	$verifsql = 'SELECT *
							 FROM same
							 WHERE id_produit = "' . $id_produit . '"
							 AND id_sameproduit = "' . $id_same . '";';
	$verifres = mysql_query($verifsql);
	if (!mysql_num_rows($verifres))
	{
		$sql = 'INSERT INTO `same`(
																`id_produit`,
																`id_sameproduit`,
																`iter`
															)
						VALUES (
										"' . $id_produit . '",
										"' . $id_same . '",
										"' . $iter . '"
										);';
		mysql_query($sql);
	}
}

$limit = 4;

mysql_query("TRUNCATE TABLE `same`;");

$sql = 'SELECT panier.id_produit as id
				from panier, commande
				where commande.id_commande = panier.id_commande
				and statut > 0
				order by panier.id_produit;';
$res = mysql_query($sql);
while($val = mysql_fetch_assoc($res))
{
	$sql2 = 'SELECT distinct(panier.id_commande) as idcmd
					 FROM commande, panier
					 WHERE commande.id_commande = panier.id_commande
					 AND commande.statut > 0
					 AND panier.id_produit = "' . $val['id'] . '";';
	$res2 = mysql_query($sql2);
	while ($val2 = mysql_fetch_assoc($res2))
	{
		$sql3 = 'select id_produit, count(id_produit) as iter
						 from commande, panier
						 WHERE  panier.id_commande = commande.id_commande
						 AND commande.id_commande = "' . $val2['idcmd'] . '"
						 AND id_produit <> "' . $val['id'] .'"
						 GROUP by id_produit
						 order by iter DESC
						 LIMIT '.$limit.';';
		$res3 = mysql_query($sql3);
		$i = 0;
		while ($val3 = mysql_fetch_assoc($res3))
		{
			if ($i <= $limit)
				add_same($val['id'], $val3['id_produit'], $val3['iter']);
			$i++;
		}
	}
}

?>
