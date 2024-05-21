<?php
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

$most_commande = clientMostCommande($begin, $end, 10);
$most_buy = clientMostBuy($begin, $end, 10);

?>
<h4>Clients qui commandent le plus</h4>
<table>
	<tr>
	<th>Login</th>
	<th>Nom</th>
	<th>Prénom</th>
	<th>Commande</th>
</tr>
<?php
foreach ($most_commande as $key => $value)
{
	$id_membre = $most_commande[$key]['id_membre'];
	$link = "<a href='index2.php?page=detailuser&id_membre=$id_membre'>";
	echo '<tr>';
	echo '<td>' . $link . utf8_decode($most_commande[$key]['login']) . '</a></td>';
	echo '<td>' . $link . utf8_decode($most_commande[$key]['prenom']) . '</a></td>';
	echo '<td>' . $link . utf8_decode($most_commande[$key]['nom']) . '</a></td>';
	echo '<td>' . $most_commande[$key]['total'] . '</td>';
	echo '</tr>';
}
?>
</table>

<h4>Clients qui dépensent le plus</h4>
<table>
	<tr>
	<th>Login</th>
	<th>Nom</th>
	<th>Prénom</th>
	<th>Montant</th>
</tr>
<?php
foreach ($most_buy as $key => $value)
{
	$id_membre = $most_buy[$key]['id_membre'];
	$link = "<a href='index2.php?page=detailuser&id_membre=$id_membre'>";
	echo '<tr>';
	echo '<td>' . $link . utf8_decode($most_buy[$key]['login']) . '</a></td>';
	echo '<td>' . $link . utf8_decode($most_buy[$key]['prenom']) . '</a></td>';
	echo '<td>' . $link . utf8_decode($most_buy[$key]['nom']) . '</a></td>';
	echo '<td>' . $most_buy[$key]['total'] . '&euro;</td>';
	echo '</tr>';
}
?>
</table>