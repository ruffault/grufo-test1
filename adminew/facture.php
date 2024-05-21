<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");
include ("include/function.inc.php");
include ("include/ean13.php");

$applicationlang = 'fr';
$id_order = $_GET['id'];
$cmd_info = command_info($id_order);
$address_info = order_address($id_order, 'fr');
$europe_member = europe_member($address_info['membre_pays']);
$basket = give_basket($id_order);
$basket_summary = basket_summary($basket );
$poid_cmd = poid_commande($id_order);
$portttc = twodecimal($cmd_info['prix_port']);

if ((typeprice($address_info['membre_societe'], $address_info['membre_intracommu'],
	$europe_member) == 'ht') && $address_info['membre_pays'] != 'FR' )
{
	$taxe = 'false';
}
else
{
	$taxe = 'true';
}

//$taxe = 'false';

if ($taxe == 'false')
{
	$netapayer = twodecimal($cmd_info['prix_total_ht'] + $portttc);
}
else
{
	$netapayer = twodecimal($cmd_info['prix_total_ttc'] + $portttc);
}

//echo "<pre>" . print_r($basket, 1) . "</pre>";

?>

<html>
<head>
	<title></title>
<!--
	<script language="javascript">
		window.print()
	</script>
-->

<style type="text/css">
body
{
  background-color: #FFFFFF;
  font-family: Arial, Verdana,Helvetica, sans-serif, monospace;
  font-size: 13px;
}
table
{
  font-size: 13px;
}
.bordure
{
	border: 1px solid black;
}
h1
{
  font-size: 20px;
  font-weight: 900;
  margin:0px;
	margin-top: 24px;
}
.tresgros
{
  font-size: 18px;
  margin:0px;
}
.devise
{
  font-size: 18px;
  margin:0px;
  font-weight: 600;
}

.gros
{
  font-size: 15px;
  font-weight: 400;
  margin:0px;
}
.nom
{
  font-size: 15px;
  font-weight: 900;
  margin:0px;
}

.page{page-break-after:always;height:1050px;}

.maintable
{
	border: 1px solid black;
}
.maintable td{
	border: 1px solid black;
	border-bottom:0px;
	border-top:0px;
	height:40px;
}
.titre td
{
  border: 1px solid black;
	height:25px;
	vertical-align:middle;
}
</style>

</head>
<body>

	<div class='page'>
  <table border='0' celpadding='0' cellspacing="0" width="700">
  <tr>
  <td width='350' valign="top">
  <img src='css/logo_pdf.png' />
  <h1>La Maison du Dictionnaire</h1>
  98, bd du Montparnasse<br />
	F-75014 PARIS<br />
  Tél : +33 (0)1.43.22.12.93<br />
	Fax : +33 (0)1.43.22.01.77<br />
	<br />
  E-mail : service-client@dicoland.com<br />
	Web : http://www.dicoland.com<br /><br  />

  SARL : 42.685,72&euro; - TVA/VAT : FR 56998477210<br />
  APE : 542R - SIRET : 998 447 210 00020
  </td>
  <td width='350' valign="top">
  
  <span class="tresgros">FACTURE<br />
  <? echo $cmd_info['code']; ?> du <? echo move_date(substr($cmd_info['date_validation'],0, 10)); ?> </span><br />
  <br />
	Adresse de facturation
  <br />
  <span class='nom'><? echo utf8_decode($address_info['facturation_prenom']) . " " . utf8_decode($address_info['facturation_nom']); ?></span><br /><br />
  <? if (isset($address_info['facturation_adresse1']) && $address_info['facturation_adresse1'] != '') {echo utf8_decode($address_info['facturation_adresse1']) . '<br />';} ?>
  <? if (isset($address_info['facturation_adresse2']) && $address_info['facturation_adresse2'] != '') {echo utf8_decode($address_info['facturation_adresse2']) . '<br />';} ?>
  <? if (isset($address_info['facturation_adresse3']) && $address_info['facturation_adresse3'] != '') {echo utf8_decode($address_info['facturation_adresse3']) . '<br /><br />';} ?>
  <? if (isset($address_info['facturation_cp']) or isset($address_info['facturation_ville'])) {echo utf8_decode($address_info['facturation_cp']) . " " . utf8_decode($address_info['facturation_ville']) . '<br />';} ?>
  <? if (isset($address_info['facturation_etat']) or isset($address_info['facturation_pays_name'])) {echo utf8_decode($address_info['facturation_etat']) . " " . utf8_decode($address_info['facturation_pays_name']) . '<br />';} ?>
  </td>
  </tr>
  </table>
  
  <br />
  
  <table border='0' celpadding='0' cellspacing="0" width="700">
  <tr>
  <td width='250' valign="top">
  	<table border='1' celpadding='0' cellspacing="0" width="250" class="bordure">
  	<tr>
			<td width='100' valign="top" align='center' class="bordure">
			<strong>CLIENT</strong>
			</td>
  	</tr>
  	<tr>
			<td class="bordure" style="text-align:center;">
				<strong><? echo $address_info['membre_id_membre'];?></strong>
			</td>
  	</tr>
  	</table>
  
  </td>
  
  <td width='340' valign="top">
  	<table border='1' celpadding='0' cellspacing="0" width="300" class="bordure">
  	<tr>
  	<td width='300' valign="top" align='center' class="bordure">
  	<strong>COMMANDE</strong>
  	</td>
  	</tr>
  	<tr>
  	<td class="bordure" style="text-align:center;">
  	V/Réf : Internet <? echo $cmd_info['code']; ?>
  	</td>
  	</tr>
  	</table>
  </td>
  <td width='100' valign="center">
  <span class='devise'>Devise : &euro;</span>
  </td>
  </tr>
  </table>
  
  <br />
  <table border='1' celpadding='0' cellspacing="0" width="700" class='maintable'>
  <tr class='titre'>
		<td width='80' valign="top" align='center' class="bordure">
			<strong>Code Produit</strong>
		</td>
		<td width='240' valign="top" align='center' class="bordure">
			<strong>Titre</strong>
		</td>
		<td width='30' valign="top" align='center' class="bordure">
			<strong>Qté</strong>
		</td>
		<td width='55' valign="top" align='center' class="bordure">
			<strong>PU HT</strong>
		</td>
		<td width='40' valign="top" align='center' class="bordure">
			<strong>Remise</strong>
		</td>
		<td width='70' valign="top" align='center' class="bordure">
			<strong>Mt. HT NET</strong>
		</td>
		<td width='10' valign="top" align='center' class="bordure">
			<strong>Taxe</strong>
		</td>
  </tr>

  <?php
	$count_element = count($basket);
	foreach ($basket as $key => $value)
	{
		if (($key + 1) == $count_element)
		{
			echo '<tr style="height: 570px;">';
		}
		else
		{
			echo '<tr>';
		}
	?>
		<td width='70' valign="top" align='left' class="bordure">
			<?php echo $value['reference']; ?>
		</td>
		<td width='260' valign="top" align='left' class="bordure">
			<?php echo $value['nom']; ?>
		</td>
		<td width='30' valign="top" align='center' class="bordure">
			<?php echo $value['quantite']; ?>
		</td>
		<td width='55' valign="top" align='right' class="bordure">
			<?php echo $value['prix_unitaire_ht']; ?>
		</td>
		<td width='40' valign="top" align='right' class="bordure">
			<?php echo $value['discount'] . '%'; ?>
		</td>
		<td width='70' valign="top" align='right' class="bordure">
			<?php echo $value['prix_unitaire_rabais_ht_for_all']; ?>
		</td>
		<td width='10' valign="top" align='right' class="bordure">
			<?php
				if ($taxe == 'false')
				{
					echo "<div style='text-align:center;'>-</div>";
				}
				else
				{
					echo twodecimal($value['taxes'] / 10) . '%';
				}
			?>
		</td>
	</tr>
	<?php
	}
	?>

	</table>

  <br />

  
  <table border='1' celpadding='0' cellspacing="0" width="700" class="bordure">
		<tr>
			<td class="bordure" align="center" width="70">
				<strong>Total HT</strong>
			</td>
			<td class="bordure" align="center" width="70">
				<strong>Total Taxes</strong>
			</td>
			<td class="bordure" align="center" width="70">
				<strong>Port TTC</strong>
			</td>
			<td class="bordure" align="center" width="70">
				<strong>Total TTC</strong>
			</td>
			<td class="bordure" align="center" width="70">
				<strong>Acompte</strong>
			</td>
			<td class="bordure" align="center" width="70">
				<strong>Net &#224; payer &euro;</strong>
			</td>

		</tr>
		<tr>
			<td class="bordure" align="center" width="70">
				<?php echo $basket_summary['total_ht']; ?>
			</td>
			<td class="bordure" align="center" width="70">
			<?php
				if ($taxe == 'false')
				{
					echo "-";
				}
				else
				{
					echo $basket_summary['total_taxe'];
				}
			?>
			</td>
			<td class="bordure" align="center" width="70">
				<?php echo $portttc; ?>
  		</td>
			<td class="bordure" align="center" width="70">
			<?php
				if ($taxe == 'false')
				{
					echo twodecimal($cmd_info['prix_total_ht'] + $portttc);
				}
				else
				{
					echo twodecimal($cmd_info['prix_total_ttc'] + $portttc);
				}
			?>
			</td>
			<td class="bordure" align="center" width="70">
				-
			</td>
			<td class="bordure" align="center" width="70">
				<?php echo $netapayer; ?>
  		</td>
  	</tr>

  </tr>
  </table>
  <br />

</div>
</body>
</html>