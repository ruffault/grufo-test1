<?php

function working_month_stat()
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

function add_field($idmonth, $pageseen, $field)
{
	$sql = "UPDATE `statmonth`
					SET `$field` = '$pageseen'
					WHERE `id_statmonth` = '" . $idmonth . "'
					LIMIT 1 ;";
	mysql_query($sql);
}


function counter_field($date, $idmonth, $field)
{
	$sql = "SELECT id_statmonth, sum($field) as field
					FROM `statday`
					WHERE id_statmonth = '$idmonth'
					group by id_statmonth
					order by id_statmonth;";
	$res = mysql_query($sql);
	while ($val = mysql_fetch_assoc($res))
	{
		add_field($val['id_statmonth'], $val['field'], $field);
	}
}

$day = working_month_stat();

foreach($day as $key => $value)
{
	counter_field($value['date'], $value['id'], 'ca');
	counter_field($value['date'], $value['id'], 'port');
	counter_field($value['date'], $value['id'], 'newmember');
	counter_field($value['date'], $value['id'], 'visitor');
	counter_field($value['date'], $value['id'], 'pageseen');
	counter_field($value['date'], $value['id'], 'newcommande');
	counter_field($value['date'], $value['id'], 'commandeclosed');
}

?>
