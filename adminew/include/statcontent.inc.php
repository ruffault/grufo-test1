<?php

require 'include/histogramme.inc.php';

function daystat($date)
{
	global $link;
	$sql = 'SELECT *
					FROM statday
					WHERE date = "'.$date.'"
					;';
					//echo $sql;
	$res = mysqli_query($link,$sql);
	$val = mysqli_fetch_assoc($res);
	
	$stat = array(
								'newmember' => $val['newmember'],
								'visitor' => $val['visitor'],
								'pageseen' => $val['pageseen'],
								'ca' => $val['ca'],
								'newcommande' => $val['newcommande'],
								'commandeclosed' => $val['commandeclosed']
							 );
	return $stat;	
}

function monthstat()
{
	global $link;
	$sql = 'SELECT year,
								 month,
								 ca,
								 port,
								 newmember,
								 visitor,
								 pageseen,
								 newcommande,
								 commandeclosed
					FROM statmonth
					ORDER BY id_statmonth ASC
					;';
	$res = mysqli_query($link,$sql);
	
	$i = 0;
	while($val = mysqli_fetch_assoc($res))
	{
		$tab[$i]['year'] = $val['year'];
		$tab[$i]['month'] = $val['month'];
		$tab[$i]['ca'] = $val['ca'];
		$tab[$i]['port'] = $val['port'];
		$tab[$i]['newmember'] = $val['newmember'];
		$tab[$i]['visitor'] = $val['visitor'];
		$tab[$i]['pageseen'] = $val['pageseen'];
		$tab[$i]['newcommande'] = $val['newcommande'];
		$tab[$i]['commandeclosed'] = $val['commandeclosed'];
		$i++;
	}
	
	foreach($tab as $key => $value)
	{
		if (isset($temp['ca']))
		{
			$tab[$key]['ca_evol'] = evolution($temp['ca'], $tab[$key]['ca']) . '%';
			$tab[$key]['port_evol'] = evolution($temp['port'], $tab[$key]['port']) . '%';
			$tab[$key]['newmember_evol'] = evolution($temp['newmember'], $tab[$key]['newmember']) . '%';
			$tab[$key]['visitor_evol'] = evolution($temp['visitor'], $tab[$key]['visitor']) . '%';
			$tab[$key]['pageseen_evol'] = evolution($temp['pageseen'], $tab[$key]['pageseen']) . '%';
			$tab[$key]['newcommande_evol'] = evolution($temp['newcommande'], $tab[$key]['newcommande']) . '%';
			$tab[$key]['commandeclosed_evol'] = evolution($temp['commandeclosed'], $tab[$key]['commandeclosed']) . '%';
			
		}

		$temp['ca'] = $tab[$key]['ca'];
		$temp['port'] = $tab[$key]['port'];
		$temp['newmember'] = $tab[$key]['newmember'];
		$temp['visitor'] = $tab[$key]['visitor'];
		$temp['pageseen'] = $tab[$key]['pageseen'];
		$temp['newcommande'] = $tab[$key]['newcommande'];
		$temp['commandeclosed'] = $tab[$key]['commandeclosed'];
	}
	$tab = array_reverse($tab);
	return $tab;
}


if ((isset($_GET['date']) ? $_GET['date'] : '') )
{
	$cur_year = substr($_GET['date'],0,4);
	$cur_month = substr($_GET['date'],4,2);
	$cur_day = substr($_GET['date'],6,2);
	$today= "$cur_year-$cur_month-$cur_day";
	$yesterday = date("Y-m-d",mktime(0,0,0,$cur_month,$cur_day-1,$cur_year));
}
else
{
	$today = date('Y-m-d');
	$yesterday = date("Y-m-d",mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")));
}

//bloc 1
$todaystat = daystat($today);
//bloc 2
$yesterdaystat = daystat($yesterday);
//bloc 3
$monthstat = monthstat();


foreach ($monthstat as $key => $value)
	$tabca[$key] = $value['ca'];

$tabca = array_reverse($tabca);
draw_histogramme($tabca, 'img/cayear.png');

foreach ($monthstat as $key => $value)
	$tabvisitor[$key] = $value['visitor'];

$tabvisitor = array_reverse($tabvisitor);
draw_histogramme($tabvisitor, 'img/visitoryear.png');

foreach ($monthstat as $key => $value)
	$tabpageseen[$key] = $value['pageseen'];

$tabpageseen = array_reverse($tabpageseen);
draw_histogramme($tabpageseen, 'img/pageseenyear.png');

foreach ($monthstat as $key => $value)
	$tabnewcommande[$key] = $value['newcommande'];

$tabnewcommande = array_reverse($tabnewcommande);
draw_histogramme($tabnewcommande, 'img/newcommandeyear.png');

?>

<h4>Bilan du <?php echo endate2fr($today); ?></h4>
<dl>
	<dt>Visiteurs</dt>
		<dd><?php echo $todaystat['visitor']; ?></dd>
	<dt>Pages vues</dt>
		<dd><?php echo $todaystat['pageseen']; ?></dd>
	<dt>Chiffre d'affaires</dt>
		<dd><?php echo $todaystat['ca'] ;?> &euro;</dd>
	<dt>Commandes reçues</dt>
		<dd><?php echo $todaystat['newcommande']; ?></dd>
	<dt>Commandes expédiées</dt>
		<dd><?php echo $todaystat['commandeclosed'] ?></dd>
</dl>
<br />
<br />

<h4>Bilan du <?php echo endate2fr($yesterday); ?></h4>
<dl>
	<dt>Visiteurs</dt>
		<dd><?php echo $yesterdaystat['visitor']; ?></dd>
	<dt>Pages vues</dt>
		<dd><?php echo $yesterdaystat['pageseen']; ?></dd>
	<dt>Chiffre d'affaires</dt>
		<dd><?php echo $yesterdaystat['ca'] ;?> &euro;</dd>
	<dt>Commandes reçues</dt>
		<dd><?php echo $yesterdaystat['newcommande']; ?></dd>
	<dt>Commandes expédiées</dt>
		<dd><?php echo $yesterdaystat['commandeclosed'] ?></dd>
</dl>
<br />

<h4>Bilan et évolution sur l'année</h4>

<table class="table table-brdered" id="stat">
	<tr>
		<th>&nbsp;</th>
		<th colspan="2">Visiteurs</th>
		<th colspan="2">Pages vues</th>
		<th colspan="2">Chiffre d'affaire HT</th>
		<th colspan="2">Frais de port</th>
		<th colspan="2">Commandes Reçues</th>
		<th colspan="2">Commandes Expédiées</th>
	</tr>

<?php
	$visitor_total = 0 ;
	$pageseen_total = 0 ;
	$ca_total = 0 ;
	$port_total = 0 ;
	$commande_total = 0 ;

foreach ($monthstat as $key => $value)
{
  if ($key%2 == 0)
    echo "<tr>";
  else
    echo '<tr>';
	echo '
				<td class="bis">' . substr(monthLessMonth($key), 0, 3) .(isset($value['year']) ? $value['year'] : '') .'</td>
				<td>' . (isset($value['visitor']) ? $value['visitor'] : '') . '	</td>
				<td class="bis"><span>'. (isset($value['visitor_evol']) ? $value['visitor_evol'] : '') .'</span></td>
				<td>' . (isset($value['pageseen']) ? $value['pageseen'] : '') . '</td>
				<td class="bis"><span>'. (isset($value['pageseen_evol']) ? $value['pageseen_evol'] : '') .'</span></td>
				<td>' . $value['ca'] . '</td>
				<td class="bis"><span>'. (isset($value['ca_evol']) ? $value['ca_evol'] : '') .'</span></td>
				<td>' . (isset($value['port']) ? $value['port'] : '') . '</td>
				<td class="bis"><span>'. (isset($value['port_evol']) ? $value['port_evol'] : '') .'</span></td>
				<td>' . (isset($value['newcommande']) ? $value['newcommande'] : '') . '</td>
				<td class="bis"><span>'. (isset($value['newcommande_evol']) ? $value['newcommande_evol'] : '') .'</span></td>
				<td>' . (isset($value['commandeclosed']) ? $value['commandeclosed'] : '') . '</td>
				<td class="bis"><span>'. (isset($value['commandeclosed_evol']) ? $value['commandeclosed_evol'] : '') .'</span></td>
				</tr>';
	$visitor_total+= $value['visitor'] ;
	$pageseen_total += $value['pageseen'] ;
	$ca_total += $value['ca'] ;
	$port_total += $value['port'] ;
	$commande_total += $value['commandeclosed'] ;
}
?>
</table>

<h5>Evolution du Chiffre d'affaires</h5>
<img src="img/cayear.png" alt="" class="graph" />

<h5>Evolution des visiteurs</h5>
<img src="img/visitoryear.png" alt="" class="graph" />

<h5>Evolution des pages vues</h5>
<img src="img/pageseenyear.png" alt="" class="graph" />

<h5>Evolution du nombre de commandes</h5>
<img src="img/newcommandeyear.png" alt="" class="graph" />

<?php
	$nb_membre = countMember();
?>
<h4>Quelques chiffres depuis l'ouverture</h4>
<?php echo $nb_membre; ?> membres<br />
<?php echo $ca_total;?>&euro; de chiffre d'affaires<br />
<?php echo $port_total;?>&euro; de frais de port<br />
<?php echo $commande_total;?> commandes<br />
<?php echo $visitor_total; ?> visiteurs<br />
<?php echo $pageseen_total; ?> pages vues<br />
 
