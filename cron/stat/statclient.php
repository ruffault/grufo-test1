<?php

function date2letter($date)
{
	if(strlen($date) == 1)
		return "0$date";
	else
	return $date;
}

function working_month()
{
	$sql = 'SELECT statmonth.id_statmonth as id, year, month
				  FROM statmonth
					LEFT JOIN statclient
						ON (statmonth.id_statmonth = statclient.id_month)
					WHERE statclient.id_statclient IS NULL
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

function add_nbcommande($idmonth, $idclient, $nbcommande)
{
	$sql = "SELECT id_statclient
					FROM statclient
					WHERE id_month = '$idmonth'
					AND id_client = '$idclient'
					;";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	if (isset($val['id_statclient']))
	{
		$sql = "UPDATE `statclient`
						SET `nbcommande` = '$nbcommande'
						WHERE `id_statclient` = '" . $val['id_statclient'] . "'
						LIMIT 1 ;";
	}
	else
	{
		$sql = "INSERT INTO `statclient`(`id_month`,`id_client`,`nbcommande`)
						VALUES ('$idmonth', '$idclient', '$nbcommande');";
	}
	mysql_query($sql);
}

function add_ca($idmonth, $idclient, $ca)
{
	$sql = "SELECT id_statclient
					FROM statclient
					WHERE id_month = '$idmonth'
					AND id_client = '$idclient'
					;";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	if (isset($val['id_statclient']))
	{
		$sql = "UPDATE `statclient`
						SET `ca` = '$ca'
						WHERE `id_statclient` = '" . $val['id_statclient'] . "'
						LIMIT 1 ;";
	}
	else
	{
		$sql = "INSERT INTO `statclient`(`id_month`,`id_client`,`ca`)
						VALUES ('$idmonth', '$idclient','$ca');";
	}

	mysql_query($sql);
}


function nb_commande($date, $idmonth)
{
	$sql = "SELECT id_membre as idclient, count(commande.id_commande)as nbcommande
					FROM `commande`, utilisateur
					WHERE commande.id_utilisateur = utilisateur.id_utilisateur
					AND commande.date_envoie like '$date%'
					GROUP BY id_membre;";
	$res = mysql_query($sql);
	while ($val = mysql_fetch_assoc($res))
	{
		add_nbcommande($idmonth,$val['idclient'], $val['nbcommande']);
	}
}

function ca($date, $idmonth)
{
	$sql = "SELECT id_membre, prix_total_ht
					FROM `commande`, utilisateur
					WHERE commande.id_utilisateur = utilisateur.id_utilisateur
					AND commande.date_envoie like '$date%'
					order by id_membre";
	$res = mysql_query($sql);
	$i = 0;
	while ($val = mysql_fetch_assoc($res))
	{
		$tab[$i]['id_client'] = $val['id_membre'];

		if ($tab[$i]['id_client'] == $tab[$i-1]['id_client'])
		{
			$tab[$i-1]['ca'] += $val['prix_total_ht'];
		}
		else
		{
			$tab[$i]['ca'] = $val['prix_total_ht'];
			$i++;
		}
	}
	if(isset($tab))
	{
		foreach ($tab as $key => $value)
		{
			add_ca($idmonth, $value['id_client'], $value['ca']);
		}
	}
}



$day = working_month();
foreach($day as $key => $value)
{
	nb_commande($value['date'], $value['id']);
	ca($value['date'], $value['id']);
	//on compte les commandes des clients pour cette periode
}


?>
