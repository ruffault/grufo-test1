<?php


function working_month_art()
{
	$sql = 'SELECT statmonth.id_statmonth as id, year, month
				  FROM statmonth
					LEFT JOIN statarticle
						ON (statmonth.id_statmonth = statarticle.id_month)
					WHERE statarticle.id_statarticle IS NULL
					or (year = left(now(),4) and month = round(right(left(now(),7),2)))
					GROUP by id
					;';
	$res = mysql_query($sql);
	$i = 0;
	while($val = mysql_fetch_assoc($res))
	{
		$tab[$i]['id'] = $val['id'];
		$tab[$i]['date'] = $val['year'] . '-' . date2letter($val['month']);
		$i++;
	}
	return $tab;
}

function add_countersell($idmonth, $idarticle, $countersell)
{
	$sql = "SELECT id_statarticle
					FROM statarticle
					WHERE id_month = '$idmonth'
					AND id_article = '$idarticle'
					;";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	if (isset($val['id_statarticle']))
	{
		$sql = "UPDATE `statarticle`
						SET `countersell` = '$countersell'
						WHERE `id_statarticle` = '" . $val['id_statarticle'] . "'
						LIMIT 1 ;";
	}
	else
	{
		$sql = "INSERT INTO `statarticle`(`id_month`,`id_article`,`countersell`)
						VALUES ('$idmonth', '$idarticle', '$countersell');";
	}
	mysql_query($sql);
}


function counter_sell($date, $idmonth)
{
	$sql = "SELECT panier.id_produit,
								count(panier.id_produit) as countersell
					FROM commande, panier
					WHERE panier.id_commande = commande.id_commande
					AND commande.date_envoie like '$date%'
					GROUP BY id_produit
					ORDER BY date_envoie;";
	$res = mysql_query($sql);
	while ($val = mysql_fetch_assoc($res))
	{
		add_countersell($idmonth, $val['id_produit'], $val['countersell']);
	}
}

$day = working_month_art();
foreach($day as $key => $value)
{
	counter_sell($value['date'], $value['id']);
}

?>
