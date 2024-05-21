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

$begin_last_month = date("Y-m-d",mktime(0,0,0,(substr($begin,5,2)-1),01,substr($begin,0,4)));

$this_month = affaireOnMonth($begin);
$last_month = affaireOnMonth($begin_last_month);
$this_year = affaireOnYear($cur_year);


foreach ($this_month as $key => $value)
{
	$databary[] = $value;
	$databarx[] = round($key) . '';
}

foreach ($last_month as $key => $value)
{
	$databary2[] = $value;
	$databarx2[] = round($key) . '';
}

foreach ($this_year as $key => $value)
{
	$databary3[] = $value;
	$databarx3[] = round($key) . '';
}

$graph = new Graph(480,180,'auto');
$graph->SetScale("textlin");
$graph->xaxis->SetTickLabels($databarx);
$graph->xaxis->SetTextLabelInterval(2);
$graph->xaxis->SetTextTickInterval(1);
$b1 = new BarPlot($databary);
$b1->SetWidth(0.4);
$graph->Add($b1);
$graph->Stroke('graph/cathismonth.png');

$graph2 = new Graph(480,180,'auto');
$graph2->SetScale("textlin");
$graph2->xaxis->SetTickLabels($databarx2);
$graph2->xaxis->SetTextLabelInterval(2);
$graph2->xaxis->SetTextTickInterval(1);
$b2 = new BarPlot($databary2);
$b2->SetWidth(0.4);
$graph2->Add($b2);
$graph2->Stroke('graph/calastmonth.png.png');

$graph3 = new Graph(480,180,'auto');
$graph3->SetScale("textlin");
$graph3->xaxis->SetTickLabels($databarx3);
$graph3->xaxis->SetTextLabelInterval(10);
$graph3->xaxis->SetTextTickInterval(5);
$b3 = new BarPlot($databary3);
$b3->SetWidth(0.4);
$graph3->Add($b3);
$graph3->Stroke('graph/cathisyear.png.png');

?>

<h4>Chiffre d'affaires du <?php echo "$cur_month $cur_year"; ?></h4>
<img src="graph/cathismonth.png" alt='' /><br />

<h4>Chiffre d'affaires du mois précédent</h4>
<img src="graph/calastmonth.png.png" alt='' />
<br />

<h4>Chiffre d'affaires de l'année</h4>
<img src="graph/cathisyear.png.png" alt='' /><br />
