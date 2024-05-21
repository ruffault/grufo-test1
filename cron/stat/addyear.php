<?php

function add_month($year, $month)
{
	$sql = "INSERT INTO `statmonth` (`year`,`month`)
					VALUES ('$year', '$month');";
	mysql_query($sql);
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
	if (isset($val))
		return $val['id_statmonth'];
}

function organize_month()
{
	$sql = 'SELECT left(date, 4) AS year,
								 right(left(date, 7),2) AS month
					FROM log
					GROUP BY left(date,7)';
	$res = mysql_query($sql);
	while ($val = mysql_fetch_assoc($res))
	{
		$id = id_date($val['year'], $val['month']);
		if(!isset($id))
			add_month($val['year'], $val['month']);
	}
	mysql_free_result($res);
}

organize_month();
?>
