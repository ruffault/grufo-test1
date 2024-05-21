<?php
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';

function referer_id($name)
{
	$sql = "SELECT id_referer as id
					FROM referer
					WHERE name = '$name'
					LIMIT 1
					;";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	if(isset($val))
	{
		mysql_free_result($res);
		return ($val['id']);
	}
}

function insert_referermonth($idmonth,$idreferer,$counter)
{
	$sql = "INSERT INTO `statreferer` (`id_month`,`id_referer`,`counter`)
					VALUES ('$idmonth', '$idreferer', '$counter');";
	mysql_query($sql) or die("plop");
}



function id_date($year, $month)
{
	$month = (int) $month;
	$sql = "SELECT id_statmonth
					FROm statmonth
					WHERE year = '$year'
					AND month = '$month'
				 ;";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	mysql_free_result($res);

	if (isset($val))
		return $val['id_statmonth'];
}

function date2letter($date)
{
	if(strlen($date) == 1)
		return "0$date";
	else
	return $date;
}

function selectmonth()
{
	$currentmonth = date("Y-m");
	$sql = "SELECT distinct(id_month) as id , year, month
					FROM statmonth, statreferer
					WHERE statmonth.id_statmonth = statreferer.id_month
					AND id_month <> '$currentmont';";
	$res = mysql_query($sql);
	while($val = mysql_fetch_assoc($res))
	{
		$date = $val['year'] . '-' . date2letter($val['month']);
		if ($currentmonth != $date)
		$sql2 .=	' and date not like "' . $date .'%" ';
	}
	return $sql2;
}


function all_referer()
{
	$i = 0;
	
	$selectedmonth = selectmonth();
	$sql = 'select left(date,7) as year,
								 right(left(date,7),2) as month,
								 referant
					from log
					where referant not like "http://www.dicoland.com%"
					and referant not like "http://dicoland.com%"
					and referant not like "http://localhost%"
					and referant like "http://%"
					'. $selectedmonth .'
					ORDER by right(left(date,7),2), left(date,7)
					;';
	$res = mysql_query($sql);
	while($val = mysql_fetch_assoc($res))
	{
		$url = $val['referant'];
		preg_match("/^(http:\/\/)?([^\/]+)/i", $url, $matches);
		$host = $matches[2];
		preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
		$plop = ereg_replace('[0-9\.\:]*','',$matches[0]) != '';
		if($plop != '')
		{
			if(ereg_replace('.*:[0-9]*','',$matches[0]) != '')
			{
				$id = referer_id($matches[0]);
				if (isset($id))
				{
					$id_month = id_date($val['year'], $val['month']);
					$tabreferer[$i]['id_referer'] = $id;
					$tabreferer[$i]['id_month'] = $id_month;
					$i++;
				}
			}
		}
	}
	mysql_free_result($res);
	return $tabreferer;
}


function exist_month($idmonth)
{
	$sql = "select * from statmonth where id_statmonth = '$month';";
	$res = mysql_query($sql);
	if (mysql_num_rows($res))
		return true;

	return false;	
}






$sql = 'DELETE FROM statreferer WHERE id_month = "'
	.id_date(date('Y'), date('m')) . '";';
mysql_query($sql);

$tabreferer = all_referer();

foreach($tabreferer as $key => $value)
{
	$tabcount[$value['id_referer']][$value['id_month']]++;
}

foreach($tabcount as $idreferer => $value)
{
	foreach($value as $month => $count)
	{
		insert_referermonth($month, $idreferer, $count);
	}
}

//print_r($tabcount);

//truncate_tablemonthtemp();

?>