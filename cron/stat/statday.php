<?php

function exist_date($date)
{
	$sql = "SELECT date
					FROM statday
					WHERE date = '$date';";
	$res = mysql_query($sql);
	if (mysql_num_rows($res))
		return true;
	else
		return false;
}



function working_month_day()
{
	$sql = 'SELECT statmonth.id_statmonth as id, year, month
				  FROM statmonth
					LEFT JOIN statday
						ON (statmonth.id_statmonth = statday.id_statmonth)
					WHERE statday.id_statday IS NULL
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

function nbnewmember($id, $date)
{
	$sql = "SELECT count(inscr_date) as total
					FROM membre
					WHERE inscr_date = '$date';";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	
	$total = 0;
	if(isset($val))
		$total = $val['total'];

	if(!exist_date($date))
	{
		$sql = "INSERT INTO `statday` (`id_statmonth`, `date`, `newmember`)
						VALUES ('$id', '$date', '$total');";
	}
	else
	{
		$sql = "UPDATE `statday`
						SET `newmember`= '$total'
						WHERE date = '$date'
						LIMIT 1 ;";
	}
	mysql_query($sql) or die(mysql_error());

}

function totalca($id, $date)
{
	$sql = "SELECT  round(SUM(prix_total_ht)) as total
					FROM commande
					WHERE date_envoie = '$date'
					AND STATUT = 6;";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$total = 0;
	if(isset($val))
		$total = $val['total'];

		$sql = "UPDATE `statday`
						SET `ca`= '$total'
						WHERE date = '$date'
						LIMIT 1 ;";
	mysql_query($sql);
}

function totalport($id, $date)
{
	$sql = "SELECT  round(SUM(prix_port)) as total
					FROM commande
					WHERE date_envoie = '$date'
					AND STATUT = 6;";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$total = 0;
	if(isset($val))
		$total = $val['total'];

		$sql = "UPDATE `statday`
						SET `port`= '$total'
						WHERE date = '$date'
						LIMIT 1 ;";
	mysql_query($sql);
}

function newcommande($id, $date)
{
	$sql = "SELECT  count(*) as total
					FROM commande
					WHERE date_validation LIKE '$date%';";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$total = 0;
	if(isset($val))
		$total = $val['total'];


	$sql = "UPDATE `statday`
					SET `newcommande`= '$total'
					WHERE date = '$date'
					LIMIT 1 ;";
	mysql_query($sql);
}

function commandeclosed($id, $date)
{
	$sql = "SELECT  count(*) as total
					FROM commande
					WHERE date_envoie = '$date';";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$total = 0;
	if(isset($val))
		$total = $val['total'];


	$sql = "UPDATE `statday`
					SET `commandeclosed`= '$total'
					WHERE date = '$date'
					LIMIT 1 ;";
	mysql_query($sql);
}

function visitor($id, $date)
{
	$sql = "SELECT count(distinct(ip)) as total
					FROM log
     			WHERE date like '$date%';";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$total = 0;
	if(isset($val))
		$total = $val['total'];


	$sql = "UPDATE `statday`
					SET `visitor` = '$total'
					WHERE date = '$date'
					LIMIT 1 ;";
	mysql_query($sql);
}

function pageseen($id, $date)
{
	$sql = "SELECT count(*) as total
					FROM log
     			WHERE date like '$date%';";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$total = 0;
	if(isset($val))
		$total = $val['total'];


	$sql = "UPDATE `statday`
					SET `pageseen` = '$total'
					WHERE date = '$date'
					LIMIT 1 ;";
	mysql_query($sql);
}

$day = working_month_day();
foreach($day as $key => $value)
{
	$sql = "SELECT left(date, 10) as date
					FROM log
					WHERE date LIKE '" . $value['date'] . "%'
					GROUP BY date;";
	$res = mysql_query($sql);
	while($val = mysql_fetch_assoc($res))
	{
		nbnewmember($value['id'], $val['date']);
		totalca($value['id'], $val['date']);
		totalport($value['id'], $val['date']);
		newcommande($value['id'], $val['date']);
		commandeclosed($value['id'], $val['date']);
		visitor($value['id'], $val['date']);
		pageseen($value['id'], $val['date']);
	}
}


?>
