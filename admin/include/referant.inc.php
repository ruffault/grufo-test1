<?php


function referer($year, $month)
{
	$sql = 'SELECT name, counter
					FROM statreferer, statmonth, referer
					WHERE statreferer.id_month = statmonth.id_statmonth
					AND statreferer.id_referer = referer.id_referer
					AND statmonth.month = "' . $month . '"
					AND statmonth.year = "' . $year . '"
					ORDER BY counter desc
					LIMIT 80
					;';
	$res = mysql_query($sql);
	while ($val = mysql_fetch_assoc($res))
	{
		$referant[$val['name']] = $val['counter'];
	}

	return $referant;
}

$cur_year = date("Y");
$cur_month = date("m");

if($_GET['date'])
{
	$cur_year = substr($_GET['date'],0,4);
	$cur_month = substr($_GET['date'],4,2);
}



$referant = referer($cur_year, $cur_month);

if (isset($referant))
{

	$var = '<table>';
	$var .= '<tr><th>Référants</th><th>Visites</th></tr>';
	
	foreach($referant as $key => $value)
	{
		$var .= '<tr>';
		$var .= '<td>' . $key . '</td>';
		$var .= '<td>' . $value . '</td>';
		$var .= '</tr>';
	}
	$var .= '</table>';
}

?>
<h4>Référants</h4>
<?php echo $var; ?>