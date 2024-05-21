<?php

require 'graph.inc.php';


$cur_year = date("Y");
$cur_month = date("m");
$cur_day = date("d");
$begin = $end = "$cur_year-$cur_month-$cur_day";

if($_GET['date'])
{
	$cur_year = substr($_GET['date'],0,4);
	$cur_month = substr($_GET['date'],4,2);
	$cur_day = substr($_GET['date'],6,2);
	$begin = $end = "$cur_year-$cur_month-$cur_day";
}
if ($_GET['month'] == 1)
{
	$begin = "$cur_year-$cur_month-01";
	$end = "$cur_year-$cur_month-" . lastMonthDay($cur_year,$cur_month);
}

$referant = keyword($begin, $end);

$var = '<table>';
$var .= '<tr><th>Mots</th><th>Visites</th></tr>';

if(isset($referant))
{
	foreach($referant as $key => $value)
	{
		$var .= '<tr>';
		$var .= '<td>' . $key . '</td>';
		$var .= '<td>' . $value . '</td>';
		$var .= '</tr>';
	}
}
$var .= '</table>';

?>
<h4>Mots clés</h4>
<a href='index2.php?page=stat&categ=keyword&date=
<?php echo $_GET['date']; ?>&month=1'>Données sur le mois
</a>
<?php echo $var; ?>
<a href='index2.php?page=stat&categ=keyword&date=
<?php echo $_GET['date']; ?>&month=1'>Données sur le mois
</a>