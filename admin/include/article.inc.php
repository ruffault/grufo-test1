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

$most_commande = articleMostCommande($begin, $end, 8);
$most_seen = articleMostSeen(8);
$most_add = articleMostAdd2Panier($begin, $end, 8);
//echo "Session : ".$_SESSION['sessionvalide'];
?>
<h4>Les plus commandés</h4>
<table>
	<tr>
		<th>&nbsp;</th>
		<th>Nom</th>
		<th>Exemplaire</th>
	</tr>
<?php
foreach ($most_commande as $key => $value)
{
	$id_produit = $most_commande[$key]['idprod'];
	$link = '<a href="../article-' . $id_produit . '-1-1-1-1.html">';
	echo '<tr>';
	echo "<td>$link";
	if (file_exists('../picproduct/' . $id_produit . '_icon.jpg')){
			echo '<img src="../picproduct/' . $id_produit . '_icon.jpg" alt="" height="60px"/><a>';
	}else{
			echo '<img src="../lang/fr/img/no-image.gif" alt="" height="60px"/><a>';
	}
	echo '</td>';
	echo '<td>' . $link. $most_commande[$key]['nom'] . '</a></td>';
	echo '<td>' . $most_commande[$key]['total'] . '</td>';
	echo '</tr>';
}
?>
</table>


<h4>Les plus regardés (depuis l'ouverture)</h4>
<table>
	<tr>
		<th>&nbsp;</th>
		<th>Nom</th>
		<th>Visite</th>
	</tr>
<?php
foreach ($most_seen as $key => $value)
{
	$id_produit = $most_seen[$key]['id_produit'];
	$link = '<a href="../article-' . $id_produit . '-1-1-1-1.html">';
	echo '<tr>';
	echo "<td>$link";
	if (file_exists('../picproduct/' . $id_produit . '_icon.jpg')){
			echo '<img src="../picproduct/' . $id_produit . '_icon.jpg" alt="" height="60px"/><a>';
	}else{
			echo '<img src="../lang/fr/img/no-image.gif" alt="" height="60px"/><a>';
	}
	echo '</td>';
	echo '<td>' . $link. $most_seen[$key]['nom'] . '</a></td>';
	echo '<td>' . $most_seen[$key]['total'] . '</td>';
	echo '</tr>';
}
?>
</table>


<h4>Les plus ajoutés aux paniers</h4>
<table>
	<tr>
		<th>&nbsp;</th>
		<th>Nom</th>
		<th>Panier</th>
	</tr>
<?php
foreach ($most_add as $key => $value)
{
	$id_produit = $most_add[$key]['id_produit'];
	$link = '<a href="../article-' . $id_produit . '-1-1-1-1.html">';
	echo '<tr>';
	echo "<td>$link";
	if (file_exists('../picproduct/' . $id_produit . '_icon.jpg')){
			echo '<img src="../picproduct/' . $id_produit . '_icon.jpg" alt="" height="60px"/><a>';
	}else{
			echo '<img src="../lang/fr/img/no-image.gif" alt="" height="60px"/><a>';
	}
	echo '</td>';
	echo '<td>' . $link. $most_add[$key]['nom'] . '</a></td>';
	echo '<td>' . $most_add[$key]['total'] . '</td>';
	echo '</tr>';
}
//echo "Session2 : ".$_SESSION['sessionvalide'];

?>
</table>