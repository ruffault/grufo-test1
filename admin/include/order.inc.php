<?php

$applicationlang = 'fr';
$id_order = $_GET['id_order'];
$cmd_info = command_info($id_order);
$address_info = order_address($id_order, 'fr');
$basket = give_basket($id_order);
$cancel = give_cancel($id_order);
$basket_summary = basket_summary($basket );
$poid_cmd = poid_commande($id_order);
// $frais_port = frais_port($poid_cmd, $address_info["livraison_id_livraison"]);
$frais_port = infos_frais_port_for_admin($address_info["livraison_id_frais_port"], $id_order);
$europe_member = europe_member($address_info['membre_pays']);
$portttc = twodecimal($cmd_info['prix_port']);
$answer = answer();
$correspondence = all_correspondence($id_order);

if (isset($_GET['id_answer']))
{
	$id_answer = $_GET['id_answer'];
	//On r�cup�re la r�ponse type dans la base de donn�es.
	$currentanswer = give_answer($id_answer, $_GET['langage']);
}

if ((typeprice($address_info['membre_societe'], $address_info['membre_intracommu'],
	$europe_member) == 'ht') && $address_info['membre_pays'] != 'FR' )
{
	$taxe = 'false';
}
else
{
	$taxe = 'true';
}

if ($taxe == 'false')
{
	$netapayer = twodecimal($cmd_info['prix_total_ht'] + $portttc);
}
else
{
	$netapayer = twodecimal($cmd_info['prix_total_ttc'] + $portttc);
}

?>
<div id="order">
	<div class="box">
		<h2><img src="css/box1.png" alt="" /> Commande en ligne</h2>
		<p>
			<span>R�f�rence :</span>
			<?php echo $cmd_info['code']; ?>
		</p>
		<p>
			<span>Date :</span>
			<?php echo move_date(substr($cmd_info['date_validation'],0, 10)); ?>
		</p>
		<p>
			<span>Mode de paiement :</span>
			<?php echo $cmd_info['mode_paiement']; ?>
		</p>
		<p>
			<span>Statut :</span>
			<?php echo statut2txt($cmd_info['statut']); ?>
		</p>
	</div>

	<div class="box">
		<h2><img src="css/box2.png" alt="" /> Gestion des impressions</h2>
		<p><a href='facture.php?id=<?php echo $id_order; ?>'>Facture</a></p>
		<!--
		<p><a href=''>Etiquette postale</a></p>
		<p><a href=''>Proforma</a></p>
		-->

	</div>

	<div class="box">
		<h2><img src="css/box3.png" alt="" /> Traitement</h2>
			<form action="traitement.php" method="post">
			<table style='border: 0;'>

				<tr>
					<?php

					echo "</tr><tr>";
					if ($cmd_info['statut'] < 4)
					{
						echo '<td><input type="radio" name="choix" value="5" checked="checked" /></td>';
						echo '<td>1. Traitement de la commande</td>';
					}
					else
					{
						echo '<td>&nbsp;</td>';
						echo '<td class="disable">1. Traitement de la commande</td>';
					}
					echo "</tr><tr>";

					if ($cmd_info['statut'] < 6 && $cmd_info['statut'] > 4)
					{
						echo '<td><input type="radio" name="choix" value="6" checked="checked" /></td>';
						echo '<td>2. Exp�dition du colis (';
						echo $cmd_info['delay'] + $basket_summary['total_delai'] + delai_livraison($frais_port[0]['mode']);
						echo 'j)</td>';
					}
					else if ($cmd_info['statut'] < 6)
					{
						echo '<td><input type="radio" name="choix" value="6" /></td>';
						echo '<td>2. Exp�dition du colis</td>';
					}
					else
					{
						echo '<td>&nbsp;</td>';
						echo '<td class="disable">2. Exp�dition du colis</td>';
					}
					?>
				</tr>
			</table>

			<?php
				if ($cmd_info['statut'] == 3)
				{
					echo 'Livraison dans <input type="text" name="delai" size="2" ';
					echo 'maxlength="2" value="' . ($basket_summary['total_delai']+ $cmd_info['delay'] + delai_livraison($frais_port[0]['mode']));
					echo '"> jours<br />';
				}
				if ($cmd_info['statut'] < 6)
				{
			?>
					<input type='hidden' name='id_commande' value='<?php echo $id_order; ?>' />
					<input type="submit" name="submit" value="Ok" />
			<?php
				}
			?>
		</form>
	</div>

	<div class="spacer" />

	<div class="box">
		<h2><img src="css/box4.png" alt="" /> Informations client</h2>
		<p>
			<?php
				echo "<a href='index2.php?page=detailuser&id_membre="
				. $address_info['membre_id_membre'] . "'>";
			?>
			<?php echo civility_txt($address_info['membre_civilite']); ?>
			<?php echo utf8_decode(ucfirst($address_info['membre_prenom'])); ?>
			<?php echo utf8_decode(ucfirst($address_info['membre_nom'])); ?>
			<?php echo '</a>'; ?><br />
			<?php if (!empty($address_info['membre_adresse1']))
							echo utf8_decode($address_info['membre_adresse1']) . '<br>'; ?>
			<?php if (!empty($address_info['membre_adresse2']))
							echo utf8_decode($address_info['membre_adresse2']) . '<br>'; ?>
			<?php if (!empty($address_info['membre_adresse3']))
							echo utf8_decode($address_info['membre_adresse3']) . '<br>'; ?>
			<?php echo utf8_decode($address_info['membre_cp']); ?>
			<?php if (!empty($address_info['membre_ville']))
							echo utf8_decode($address_info['membre_ville']) . '<br>'; ?>
			<?php if (!empty($address_info['membre_etat']))
							echo utf8_decode($address_info['membre_etat']) . '<br>'; ?>
			<?php echo utf8_decode($address_info['membre_pays_name']); ?>
			<br />
			<?php if (!empty($address_info['membre_tel']))
							echo 'T�l : ' . utf8_decode($address_info['membre_tel']) . '<br>'; ?>
			<?php if (!empty($address_info['membre_fax']))
							echo 'Fax : ' . utf8_decode($address_info['membre_fax']) . '<br>'; ?>

		</p>
		</p>
	</div>

	<div class="box">
		<h2><img src="css/box5.png" alt="" /> Adresse de livraison</h2>
		<p>
			<?php echo civility_txt($address_info['livraison_civilite']); ?>
			<?php echo utf8_decode(ucfirst($address_info['livraison_prenom'])); ?>
			<?php echo utf8_decode(ucfirst($address_info['livraison_nom'])); ?><br />
			<?php if (!empty($address_info['livraison_adresse1']))
							echo utf8_decode($address_info['livraison_adresse1']) . '<br>'; ?>
			<?php if (!empty($address_info['livraison_adresse2']))
							echo utf8_decode($address_info['livraison_adresse2']) . '<br>'; ?>
			<?php if (!empty($address_info['livraison_adresse3']))
							echo utf8_decode($address_info['livraison_adresse3']) . '<br>'; ?>
			<?php echo utf8_decode($address_info['livraison_cp']); ?>
			<?php if (!empty($address_info['livraison_ville']))
							echo utf8_decode($address_info['livraison_ville']) . '<br>'; ?>
			<?php if (!empty($address_info['livraison_etat']))
							echo utf8_decode($address_info['livraison_etat']) . '<br>'; ?>
			<?php echo utf8_decode($address_info['livraison_pays_name']); ?>
		</p>
	</div>

	<div class="box">
		<h2><img src="css/box6.png" alt="" /> Adresse de facturation</h2>
		<p>
			<?php echo utf8_decode(civility_txt($address_info['facturation_civilite'])); ?>
			<?php echo utf8_decode(ucfirst($address_info['facturation_prenom'])); ?>
			<?php echo utf8_decode(ucfirst($address_info['facturation_nom'])); ?><br />
			<?php if (!empty($address_info['facturation_adresse1']))
							echo utf8_decode($address_info['facturation_adresse1']) . '<br>'; ?>
			<?php if (!empty($address_info['facturation_adresse2']))
							echo utf8_decode($address_info['facturation_adresse2']) . '<br>'; ?>
			<?php if (!empty($address_info['facturation_adresse3']))
							echo utf8_decode($address_info['facturation_adresse3']) . '<br>'; ?>
			<?php echo $address_info['facturation_cp']; ?>
			<?php if (!empty($address_info['facturation_ville']))
							echo utf8_decode($address_info['facturation_ville']) . '<br>'; ?>
			<?php if (!empty($address_info['facturation_etat']))
							echo utf8_decode($address_info['facturation_etat']) . '<br>'; ?>
			<?php echo utf8_decode($address_info['facturation_pays_name']); ?>
		</p>
	</div>

	<div class="spacer" />

	<div class="">
		<h2 class="noborder"><img src="css/box7.png" alt="" /> D�tail de la commande</h2>

		<table id="cmd_content">
			<tr>
				<th>&nbsp;</th>
				<th>Code sage</th>
				<th>Nom</th>
				<th>D�lai</th>
				<th>Remise</th>
				<th>PuHT</th>
				<th>PuTTC</th>
				<th>Qt�</th>
				<th>PtHT</th>
				<th>PtTTC</th>
				<th>&nbsp;</th>
			</tr>
	<?php
		foreach ($basket as $key => $line)
		{
			echo '<tr>';
			echo '<td><!--<input type="checkbox" value="">-->&nbsp;</td>';
			echo '<td>' . $line['reference'] . '</td>';
			echo '<td>' . $line['nom'] . '</td>';
			echo '<td>' . $line['delai_reapprovisionnement'] . 'j</td>';
			echo '<td>' . $line['discount'] . '%</td>';
			echo '<td>' . $line['prix_unitaire_ht_rabais'] . '&euro;</td>';
			if ($taxe == 'false')
			{
				echo '<td>-</td>';
			}
			else
			{
				echo '<td>' . $line['prix_unitaire_ttc_rabais'] . '</td>';
			}
			echo '<td>' . $line['quantite'] . '</td>';
			echo '<td>' . $line['prix_unitaire_rabais_ht_for_all'] . '</td>';
			if ($taxe == 'false')
			{
				echo '<td>-</td>';
			}
			else
			{
				echo '<td>' . $line['prix_unitaire_ttc_rabais_for_all'] . '</td>';
			}
			echo '<td><form action="cancelarticle.php" method="GET">';
			echo '<input type="hidden" name="id_basket" '
					 . 'value="' . $line['id_panier'] . '" />';
			echo '<input type="hidden" name="id_order" value="' . $id_order . '" />';
			echo '<!--<input type="image" src="css/trash.png"
							alt="Retirer de la commande"
							title="Retirer de la commande"
							class="noborder"/>--></form></td>';
			echo '</tr>';
		}

		if (is_array($cancel)) {
			foreach ($cancel as $key => $line)
			{
				echo '<tr class="cancel">';
				echo '<td><input type="checkbox" value=""></td>';
				echo '<td>' . $line['reference'] . '</td>';
				echo '<td>' . $line['nom'] . '</td>';
				echo '<td>' . $line['delai_reapprovisionnement'] . 'j</td>';
				echo '<td>' . $line['discount'] . '%</td>';
				echo '<td>' . $line['prix_unitaire_ht_rabais'] . '&euro;</td>';
				echo '<td>' . $line['prix_unitaire_ttc_rabais'] . '&euro;</td>';
				echo '<td>' . $line['quantite'] . '</td>';
				echo '<td>' . $line['prix_unitaire_rabais_ht_for_all'] . '</td>';
				echo '<td>' . $line['prix_unitaire_ttc_rabais_for_all'] . '</td>';
				echo '<td> </td>';
				echo '</tr>';
			}
		}


		if (isset($frais_port) && is_array($frais_port))
		{
			echo '<tr>';
			echo '<td><input type="checkbox" value=""></td>';
			echo '<td>' . $line['reference'] . '</td>';
			echo '<td>Frais de port (' . cp_name($frais_port[0]['mode']) . ')</td>';
			echo '<td>';
			if (delai_livraison($frais_port[0]['mode']) == '0')
			{
				echo '-';
			}
			else
			{
				echo delai_livraison($frais_port[0]['mode']).'j';
			}
			echo '</td>';
			echo '<td>-</td>';
			echo '<td>-</td>';
			echo '<td>' . $portttc . '&euro;</td>';
			echo '<td>1</td>';
			echo '<td>-</td>';
			echo '<td>' .  $portttc . '&euro;</td>';
			echo '<td> </td>';
			echo '</tr>';
		}
	?>

	<tr class='total' id="separ">
		<td colspan="7">
			<strong>Total HT</strong>
		</td>
		<td colspan="3">
			<?php echo $basket_summary['total_ht']; ?> &euro;
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr class='total'>
		<td colspan="7">
			<strong>Total Taxes</strong>
		</td>
		<td colspan="3">
			<?php
				if ($taxe == 'false')
				{
					echo "-";
				}
				else
				{
					echo $basket_summary['total_taxe'] . '&euro;';
				}
			?>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr class='total'>
		<td colspan="7">
			<strong>Port TTC</strong>
		</td>
		<td colspan="3">
				<?php echo $portttc; ?> &euro;

		</td>
		<td>&nbsp;</td>
	</tr>
	<tr class='total'>
		<td colspan="7">
			<strong>Acompte</strong>
		</td>
		<td colspan="3">-</td>
		<td>&nbsp;</td>
	</tr>
	<tr class='total'>
		<td colspan="7">
			<strong>Total TTC</strong>
		</td>
		<td colspan="3">
			<?php

				if ($taxe == 'false')
				{
					echo ($cmd_info['prix_total_ht'] + $portttc);
				}
				else
				{
					echo ($cmd_info['prix_total_ttc'] + $portttc);
				}
			?>
 			&euro;
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr class='total'>
		<td colspan="7">
			<strong>Net � payer</strong>
		</td>
		<td colspan="3">
			<?php echo $netapayer; ?> &euro;
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr class='total'>
		<td colspan="7">
			<strong>Montant � recr�diter</strong>
		</td>
		<td colspan="3">-</td>
		<td>&nbsp;</td>
	</tr>

		</table>

	</div>

	<div class="">
		<h2><img src="css/box8.png" alt=""/> R�diger un e-mail</h2>
		Commande : <?php echo $cmd_info['code']; ?>
<?php

if (isset($_GET['mail']))
{
	echo "<p><strong>L'email � �t� corretement envoy� !</strong></p>";
}

?>
		<form name="" method="GET" action="index2.php">
			<input type="hidden" name="page" value="order" />
			<input type="hidden" name="id_order"
				value="<?php echo $id_order; ?>" />

		<p>Texte pr�d�fini :</p>
		<select name="id_answer">
		<?php
			foreach($answer as $key => $value)
			{
//		print_r($answer);
				echo '<option value="' . $value['id_answer'] . '">'
					. $value['title'] . '</option>';
			}
		?>
		</select>
		<select name="langage">
			<option value="fr">Fran�ais</option>
			<option value="de">Allemand</option>
			<option value="en">Anglais</option>
			<option value="es">Espagnol</option>
			<option value="it">Italien</option>
		</select>

		<input type="submit" value="Ins�rer" />
		</form>

		<form name="" method="POST" action="sendmail.php">
			<input type="hidden" name="email"
				value="<?php echo $address_info['membre_email']; ?>" />
			<input type="hidden" name="sender"
				value="Dicoland.com &#060;service-client@dicoland.com&#062;" />
			<p>Sujet du message :</p>
			<?php
			if (isset($currentanswer))
			{
				echo 	'<input type="text" name="subject" size="82"
					value="' . $currentanswer['subject'] . '" />';
				echo '<p>Corps du message :</p>';
				echo '<textarea rows="12" cols="70" name="content">' . $currentanswer['content']
					. '</textarea>';
			}
			else
			{
				echo 	'<input type="text" name="subject" size="125" value="" />';
				echo '<p>Corps du message :</p>';
				echo '<textarea rows="8" cols="106" name="content"></textarea>';
			}

			?>
			<br />
			<input type="hidden" name="id_order" value="<?php echo $id_order; ?>" />
			<input type="submit" value="Envoyer le message" />
		</form>
	</div>
	<div>

<?php

if (isset($correspondence))
{

?>

	<h2 class='noborder'><img src='css/box9.gif' /> Correspondance par email</h2>

		<table>
			<tr>
				<th>&nbsp;</th>
				<th>Date</th>
				<th>Heure</th>
				<th>Sujet</th>
				<th>Exp�diteur</th>
				<th>&nbsp;</th>
			</tr>
			<?php
			foreach ($correspondence as $key => $line)
			{
				echo '<tr>';
				echo '<td><img src="css/mail_mini.gif" alt="" /></td>';
				echo '<td>';
				echo substr($line['date_corres'],6,2) . '/';
				echo substr($line['date_corres'],4,2) . '/';
				echo substr($line['date_corres'],0,4);
				echo '</td>';
				echo '<td>';

				echo substr($line['date_corres'],8,2) . ':';
				echo substr($line['date_corres'],10,2);
				echo '</td>';
				echo '<td><a href="index2.php?page=showmail&id_mail='
					. $line['id_correspondence'] .'">' . $line['subject'] . '</a></td>';
				echo '<td>' . $line['sender'] . '</td>';
				echo '<td>&nbsp;</td>';
				echo '</tr>';
			}
			?>
		</table>
	</div>
<?php

}
?>
<!--
	<div class="">
		<h2> Recr�diter l'acheteur</h2>
		<p>Montant du versement :</p>
		<input type="text" name="" value="" size="20" />
		<input type="submit" value="Recr�diter" />
	</div>
-->
</div>