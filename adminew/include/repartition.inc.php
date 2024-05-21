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

$pageseen = pageSeenPerHour($begin,$end);
$visitor = visitorPerHour($begin,$end);

foreach ($pageseen as $key => $value)
{
	$databary[] = $value;
	$databarx[] = round($key) . 'h';
}
	
$graph = new Graph(500,250,'auto');
$graph->SetScale("textlin");
$graph->xaxis->SetTickLabels($databarx);
$graph->xaxis->SetTextLabelInterval(2);
$graph->xaxis->SetTextTickInterval(1);
$b1 = new BarPlot($databary);
$b1->SetWidth(0.4);
$graph->Add($b1);
$graph->Stroke('graph/pageseen.png');

foreach ($visitor as $key => $value)
{
	$databary2[] = $value;
	$databarx2[] = round($key) . 'h';
}

$graph2 = new Graph(500,250,'auto');
$graph2->SetScale("textlin");
$graph2->xaxis->SetTickLabels($databarx2);
$graph2->xaxis->SetTextLabelInterval(2);
$graph2->xaxis->SetTextTickInterval(1);
$b2 = new BarPlot($databary2);
$b2->SetWidth(0.4);
$graph2->Add($b2);
$graph2->Stroke('graph/visitor.png');

?>

<h4>Pages vues</h4>
<img src="graph/pageseen.png" alt='' />
<br />
<a href='index2.php?page=stat&categ=repartition&date=
<?php echo $_GET['date']; ?>&month=1'>Données sur le mois
</a>

<h4>Visiteurs</h4>
<img src="graph/visitor.png" alt='' />
<br />
<a href='index2.php?page=stat&categ=repartition&date=
<?php echo $_GET['date']; ?>&month=1'>Données sur le mois
</a>