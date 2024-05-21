<?php
// Pour éviter les problemes de timeout de max_execution_time dans php.ini
set_time_limit(90);
require 'include/class.phpmailer.php';
// Action de renommer un nom de mode de frais de port; ATTENTION, cela entraine normalement la modification du code PHP en conséquence !
if (isset($_POST["do"]) && $_POST["do"] == "Renommer" && isset($_POST["PAYS"]) && trim($_POST["PAYS"]) && isset($_POST["id_frais_port"]) && isset($_POST["nom_frais_port"]) && trim($_POST["nom_frais_port"]))
{
	if (!frais_port_mode_exists($_POST["nom_frais_port"],$_POST["PAYS"]))
	{
		$Infos_Historique_Tarif = "Quelqu'un a effectué une modification sur un tarif de frais de port du site www.dicoland.com.\r\nVous devriez garder ce mail au cas où...\r\n";
		$Infos_Historique_Tarif.= "Anciens tarifs :\r\n\r\n".get_frais_port_infos_for_email($_POST["id_frais_port"]);
		$ResultMessage = "";
		// Tout est ok, on enregistre le nouveau nom du mode de frais de port en base
		$sql = "UPDATE `frais_port` SET `mode`='".$_POST["nom_frais_port"]."'";
		$sql.= " WHERE `id_frais_port`='".$_POST["id_frais_port"]."' LIMIT 1";
		$req = mysqli_query($link,$sql)  or die ("Erreur SQL : ".mysqli_error($link));
		if ($req)
		{
			$ResultMessage.= "Information : Le nouveau nom du mode de frais de port a bien été enregistré en base de données.<br />";
			$mail = new PHPMailer();
			$mail->From     = "admin@dicoland.com";
			$mail->FromName = "www.dicoland.com";
			$mail->Priority = 3;
			$mail->Subject  = "[DICOLAND][FRAIS DE PORT][RENOMMAGE]Pays : ".$_POST["PAYS"];
			$Infos_Historique_Tarif.= "\r\n\r\nNouveaux tarifs :\r\n".get_frais_port_infos_for_email($_POST["id_frais_port"]);
			$message = $Infos_Historique_Tarif;
			$mail->Body    = $message;
			$mail->AddAddress("admin@dicoland.com");
			$mail->Send();
		}
		else
		{
			$ResultMessage.= "Erreur : Le nouveau nom du mode de frais de port n'a pas pu être enregistré en base de données.<br />";
		}
	}
	else
	{
		$ResultMessage.= "Erreur : Un autre mode de frais de port existe déjà en base de données avec ce nom pour ce pays.<br />";
	}
	$_POST["do"] = "display_tarifs";
}
// Action de supprimer un nom de mode de frais de port; ATTENTION, cela entraine normalement la modification du code PHP en conséquence !
if (isset($_POST["do"]) && $_POST["do"] == "Supprimer" && isset($_POST["id_frais_port"]) && is_numeric($_POST["id_frais_port"]))
{
	$Infos_Historique_Tarif = "Quelqu'un a effectué une modification sur un tarif de frais de port du site www.dicoland.com.\r\nVous devriez garder ce mail au cas où...\r\n";
	$Infos_Historique_Tarif.= "Anciens tarifs :\r\n\r\n".get_frais_port_infos_for_email($_POST["id_frais_port"]);
	$ResultMessage = "";
	// Tout est ok, on supprime le mode de frais de port en base
	$sql = "DELETE FROM `frais_port`";
	$sql.= " WHERE `id_frais_port`='".$_POST["id_frais_port"]."' LIMIT 1";
	$req = mysqli_query($link,$sql)  or die ("Erreur SQL : ".mysqli_error($link));
	if ($req)
	{
		$ResultMessage.= "Information : Le mode de frais de port a bien été supprimé en base de données.<br />";
		$mail = new PHPMailer();
		$mail->From     = "admin@dicoland.com";
		$mail->FromName = "www.dicoland.com";
		$mail->Priority = 3;
		$mail->Subject  = "[DICOLAND][FRAIS DE PORT][SUPPRESSION]Pays : ".$_POST["PAYS"];
		$message = $Infos_Historique_Tarif;
		$mail->Body    = $message;
		$mail->AddAddress("admin@dicoland.com");
		$mail->Send();
	}
	else
	{
		$ResultMessage.= "Erreur : Le mode de frais de port n'a pas pu être supprimé en base de données.<br />";
	}
	$_POST["do"] = "display_tarifs";
}
// Action de dupliquer un mode de frais de port; ATTENTION, cela entraine normalement la modification du code PHP en conséquence !
if (isset($_POST["do"]) && $_POST["do"] == "Dupliquer" && isset($_POST["id_frais_port"])&& is_numeric($_POST["id_frais_port"]) && isset($_POST["VERS_PAYS"]) && trim($_POST["VERS_PAYS"]))
{
	if ($_POST["VERS_PAYS"] != "choisissez")
	{
		if (!frais_port_mode_exists($_POST["nom_frais_port"],$_POST["VERS_PAYS"]))
		{
			$Infos_Historique_Tarif = "Quelqu'un a effectué une modification sur un tarif de frais de port du site www.dicoland.com.\r\nVous devriez garder ce mail au cas où...\r\n";
			$Infos_Historique_Tarif.= "Tarifs dupliqués vers le pays ".$_POST["VERS_PAYS"]." :\r\n\r\n".get_frais_port_infos_for_email($_POST["id_frais_port"]);
			$ResultMessage = "";
			// On récupère les infos à dupliquer dans un tableau
			$infos_frais_port = get_frais_port_infos($_POST["id_frais_port"]);
			// Tout est ok, on duplique le nouveau mode de frais de port vers le pays de destination si il n'existe pas déjà avec le même nom en base
			$sql = "INSERT INTO `frais_port` (`id_frais_port`,`mode`,`pays`,`250`,`500`,`750`,`1000`,`1500`,`2000`,`3000`,`4000`,`5000`,`6000`,`7000`,`8000`,`9000`,`10000`,`11000`,`12000`,`13000`,`14000`,`15000`,`16000`,`17000`,`18000`,`19000`,`20000`,`25000`,`30000`,`promo_begin`,`promo_end`) VALUES('', '".$infos_frais_port[0]["mode"]."', '".$_POST["VERS_PAYS"]."', '".$infos_frais_port[0]["250"]."', '".$infos_frais_port[0]["500"]."', '".$infos_frais_port[0]["750"]."', '".$infos_frais_port[0]["1000"]."', '".$infos_frais_port[0]["1500"]."', '".$infos_frais_port[0]["2000"]."', '".$infos_frais_port[0]["3000"]."', '".$infos_frais_port[0]["4000"]."', '".$infos_frais_port[0]["5000"]."', '".$infos_frais_port[0]["6000"]."', '".$infos_frais_port[0]["7000"]."', '".$infos_frais_port[0]["8000"]."', '".$infos_frais_port[0]["9000"]."', '".$infos_frais_port[0]["10000"]."', '".$infos_frais_port[0]["11000"]."', '".$infos_frais_port[0]["12000"]."', '".$infos_frais_port[0]["13000"]."', '".$infos_frais_port[0]["14000"]."', '".$infos_frais_port[0]["15000"]."', '".$infos_frais_port[0]["16000"]."', '".$infos_frais_port[0]["17000"]."', '".$infos_frais_port[0]["18000"]."', '".$infos_frais_port[0]["19000"]."', '".$infos_frais_port[0]["20000"]."', '".$infos_frais_port[0]["25000"]."', '".$infos_frais_port[0]["30000"]."',NULL,NULL)";
			$req = mysqli_query($link,$sql)  or die ("Erreur SQL : ".mysqli_error($link));
			if ($req)
			{
				$ResultMessage.= "Information : Le mode de frais de port a bien été dupliqué vers le pays ".$_POST["VERS_PAYS"]." en base de données.<br />";
				$mail = new PHPMailer();
				$mail->From     = "admin@dicoland.com";
				$mail->FromName = "www.dicoland.com";
				$mail->Priority = 3;
				$mail->Subject  = "[DICOLAND][FRAIS DE PORT][DUPLICATION] Tarif ".$_POST["nom_frais_port"]." du Pays ".$_POST["PAYS"]." vers le Pays ".$_POST["VERS_PAYS"];
				$message = $Infos_Historique_Tarif;
				$mail->Body    = $message;
				$mail->AddAddress("admin@dicoland.com");
				$mail->Send();
			}
			else
			{
				$ResultMessage.= "Erreur : Le mode de frais de port n'a pas pu être dupliqué vers le pays ".$_POST["VERS_PAYS"]." en base de données.<br />";
			}
		}
		else
		{
			$ResultMessage.= "Erreur : Le mode de frais de port n'a pas pu être dupliqué vers le pays ".$_POST["VERS_PAYS"]." car il y existe déjà en base de données.<br />";
		}
	}
	else
	{
		$ResultMessage.= "Erreur : Le mode de frais de port n'a pas pu être dupliqué car vous n'avez pas choisi de pays de destination.<br />";
	}
	$_POST["do"] = "display_tarifs";
}
// Action de sauvegarder les nouveaux tarifs pour un mode de frais de port; ATTENTION, cela entraine normalement la modification du code PHP en conséquence !
if (isset($_POST["do"]) && $_POST["do"] == "Enregistrer" && isset($_POST["PAYS"]) && trim($_POST["PAYS"]) && isset($_POST["id_frais_port"]) && is_numeric($_POST["id_frais_port"]))
{
	$nbr_erreurs = 0;
	$ResultMessage = "";
	// On vérifie les champs date attendus, sinon, on les positionne à NULL :
	if (!isset($_POST["promo_begin"]) || !isset($_POST["promo_end"]) || !Is_UsDate($_POST["promo_begin"]) || !Is_UsDate($_POST["promo_end"]))
	{
		$_POST["promo_begin"] = "NULL";
		$_POST["promo_end"] = "NULL";
		// Cas où on insert NULL comme valeurs de date
		$sql_dates_promo = "`promo_begin`=".$_POST["promo_begin"].", `promo_end`=".$_POST["promo_end"]."";
		$ResultMessage.= "Information : Les dates attendues ne sont pas du bon format (AAAA-MM-JJ HH:MM:SS) ou n'ont pas été fournies volontairement.<br />";
	}
	else
	{
		// Cas où on insert une date valide en base : seule difference, les simple quotes qui entourentla valeur
		$sql_dates_promo = "`promo_begin`='".$_POST["promo_begin"]."', `promo_end`='".$_POST["promo_end"]."'";
	}
	// On vérifie la validité du format des prix soumis
	foreach ($_POST as $cle => $valeur)
	{
		if (preg_match('/^[0-9]{3,5}$/', $cle) && !Is_ValidePrixPort($valeur))
		{
			$ResultMessage.= "Erreur : Le prix indiqué pour un poids de ".$cle." Grammes n'est pas de format valide.<br />Format attendu : 1 à 3 chiffres suivis optionnellement d'un symbole \".\" et de 1 à 2 chiffres par exemple).<br />";
			$nbr_erreurs++;
		}
	}
	if (!$nbr_erreurs)
	{
		// Tout est ok, on enregistre les nouveaux tarifs en base
		$sql = "UPDATE `frais_port` SET `250`='".$_POST["250"]."', `500`='".$_POST["500"]."', `750`='".$_POST["750"]."', `1000`='".$_POST["1000"]."', `1500`='".$_POST["1500"]."', `2000`='".$_POST["2000"]."', `3000`='".$_POST["3000"]."', `4000`='".$_POST["4000"]."', `5000`='".$_POST["5000"]."', `6000`='".$_POST["6000"]."', `7000`='".$_POST["7000"]."', `8000`='".$_POST["8000"]."', `9000`='".$_POST["9000"]."', `10000`='".$_POST["10000"]."', `11000`='".$_POST["11000"]."', `12000`='".$_POST["12000"]."', `13000`='".$_POST["13000"]."', `14000`='".$_POST["14000"]."', `15000`='".$_POST["15000"]."', `16000`='".$_POST["16000"]."', `17000`='".$_POST["17000"]."', `18000`='".$_POST["18000"]."', `19000`='".$_POST["19000"]."', `20000`='".$_POST["20000"]."', `25000`='".$_POST["25000"]."', `30000`='".$_POST["30000"]."', ";
		$sql.=$sql_dates_promo;
		$sql.= " WHERE `id_frais_port`='".$_POST["id_frais_port"]."' LIMIT 1";
		$req = mysqli_query($link,$sql)  or die ("Erreur SQL : ".mysqli_error($link));
		if ($req)
		{
			$ResultMessage.= "Information : Les nouveaux prix ont bien été enregistrés en base de données.<br />";
		}
		else
		{
			$ResultMessage.= "Erreur : Les nouveaux prix n'ont pas pu être enregistrés en base de données.<br />";
		}
	}
	$_POST["do"] = "display_tarifs";
	echo "<div class='spacer'></div>";	
}
// DEBUT CHOIX DU PAYS
if (!isset($_POST["do"]) || !trim($_POST["do"]))
{
$sql = "SELECT frais_port.pays, pays.nom_fr
FROM frais_port, pays
WHERE frais_port.pays = pays.abrev
GROUP BY frais_port.pays
ORDER BY frais_port.pays ASC";
$req = mysqli_query($link,$sql)  or die ("Erreur SQL : ".mysqli_error($link));
echo "<div class='spacer'></div>";
//Formulaire du choix du pays des frais de port
?>
<center><span class="alerte">ATTENTION<br />Toute modification effectuée via ce formulaire est instantanément prise en compte sur le site.<br />Cette modification est une opération lourde qui doit être effectuée avec parcimonie !<br /><br />Vous devriez d'abord sauvegarder les anciens tarifs avant d'effectuer la moindre modification...<br /><br /></span></center>
<div id="formeditfrais_port">
<table border="0">
<form name="formchoixfrais_port" method="post" action="index2.php?page=frais_port">
	<tr>
		<td>
			Merci de choisir le pays pour lequel vous souhaitez modifier les frais de port dans la liste ci-dessous :<br />
			<select name="PAYS">
			<?php
			while ($data = mysqli_fetch_array($req))
			{
			?>
				<option name="PAYS" value="<?= $data["pays"] ?>"><?= $data["pays"] ?> - <?= $data["nom_fr"] ?></option>
			<?php
			}
			?>
			</select>
			<input type="hidden" name="do" value="display_tarifs">
			<input type="submit" name="choix" value="OK">
		</td>
	</tr>
</form>
</table>
</div>
<?php
}
// FIN CHOIX DU PAYS

// DEBUT AFFICHAGE DES TARIFS DU PAYS
if (isset($_POST["do"]) && $_POST["do"] == "display_tarifs")
{
$sql = "SELECT * FROM frais_port WHERE pays='".$_POST["PAYS"]."' ORDER BY id_frais_port asc";
$req = mysqli_query($link,$sql)  or die ("Erreur SQL : ".mysqli_error($link));
echo "<div class='spacer'></div>";
//Formulaire d'édition des frais de port
?>
<script>
function confirmRenommage()
{
	choix = confirm("Etes vous vraiment sur de vouloir renommer ce tarif ?\n\nATTENTION ! Renommer un tarif est une opération lourde qui impose que le developpeur du site modifie aussi le code PHP du site au préalable car les noms des tarifs sont inscrits en dur dans le code...\n\nSi vous cliquez sur le bouton Annuler, la modification ne sera pas prise ne compte.");
	if (choix == true)
	{
		document.formrenommerfrais_port.submit();
	}
	else
	{
		return false;
	}
}

function confirmSuppression()
{
	choix = confirm("Etes vous vraiment sur de vouloir supprimer ce tarif ?\n\nATTENTION ! Supprimer un tarif est une opération lourde qui impose que le developpeur du site modifie aussi le code PHP du site au préalable car les noms des tarifs sont inscrits en dur dans le code...\n\nSi vous cliquez sur le bouton Annuler, la modification ne sera pas prise ne compte.");
	if (choix == true)
	{
		document.formsupprimerfrais_port.submit();
	}
	else
	{
		return false;
	}
}

function confirmDuplication()
{
	choix = confirm("Etes vous vraiment sur de vouloir dupliquer ce tarif ?\n\nATTENTION ! Dupliquer un tarif est une opération lourde qui impose que le developpeur du site modifie aussi le code PHP du site au préalable car les noms des tarifs sont inscrits en dur dans le code...\n\nSi vous cliquez sur le bouton Annuler, la modification ne sera pas prise ne compte.");
	if (choix == true)
	{
		document.formdupliquerfrais_port.submit();
	}
	else
	{
		return false;
	}
}

function confirmMiseAJour()
{
	choix = confirm("Etes vous vraiment sur de vouloir sauvegarder ces nouveaux tarifs ?\n\nATTENTION ! Les nouveaux tarifs seront actifs immédiatement sur le site\n\nSi vous cliquez sur le bouton Annuler, la modification ne sera pas prise en compte.");
	if (choix == true)
	{
		document.formeditfrais_port.submit();
	}
	else
	{
		return false;
	}
}
</script>
<div id="formeditfrais_port">
<table border="0">
	<tr>
		<td>
		Voici les tarifs actuellement actifs pour le pays : <?= $_POST["PAYS"]." - ".abrev2lang($_POST["PAYS"]); ?> (<a href="index2.php?page=frais_port">changer de pays</a>)
		<?php
		// Affichage des résultats des actions précédemment effectuées
		if (isset($ResultMessage) && trim($ResultMessage))
		{
			?>
			<p><span class="alerte"><?= $ResultMessage ?></p>
			<?php
			echo "<div class='spacer'></div>";
		}
		?>
		</td>
	</tr>
	<?php
	while ($data = mysqli_fetch_array($req))
	{
	?>
	<tr>
		<td>
			<form name="formrenommerfrais_port" method="post" action="index2.php?page=frais_port" onSubmit="return confirmRenommage();"><b><input name="nom_frais_port" value="<?= $data["mode"] ?>"></b><input type="hidden" name="PAYS" value="<?= $_POST["PAYS"] ?>"><input type="hidden" name="id_frais_port" value="<?= $data["id_frais_port"] ?>"><input type="submit" name="do" value="Renommer"></form>
			<form name="formsupprimerfrais_port" method="post" action="index2.php?page=frais_port" onSubmit="return confirmSuppression();"><input type="hidden" name="PAYS" value="<?= $_POST["PAYS"] ?>"><input type="hidden" name="id_frais_port" value="<?= $data["id_frais_port"] ?>"><input type="submit" name="do" value="Supprimer" <?php if (frais_port_is_in_use($data["id_frais_port"])) { echo "disabled"; }?>></form>
			<form name="formdupliquerfrais_port" method="post" action="index2.php?page=frais_port" onSubmit="return confirmDuplication();">
			<input type="hidden" name="nom_frais_port" value="<?= $data["mode"] ?>">
			<input type="hidden" name="PAYS" value="<?= $_POST["PAYS"] ?>">
			<input type="hidden" name="id_frais_port" value="<?= $data["id_frais_port"] ?>">	
			<select name="VERS_PAYS">
			<option name="VERS_PAYS" value="choisissez">Choisissez le pays où créer une copie de ce tarif</option>
			<?php
			$sql_liste_pays = "SELECT frais_port.pays, pays.nom_fr
			FROM frais_port, pays
			WHERE frais_port.pays = pays.abrev
			GROUP BY frais_port.pays
			ORDER BY frais_port.pays ASC";
			$req_liste_pays = mysqli_query($link,$sql_liste_pays)  or die ("Erreur SQL : ".mysqli_error($link));
			while ($data_liste_pays = mysqli_fetch_array($req_liste_pays))
			{
				?>
				<option name="VERS_PAYS" value="<?= $data_liste_pays["pays"] ?>"><?= $data_liste_pays["pays"] ?> - <?= $data_liste_pays["nom_fr"] ?></option>
				<?php
			}			
			?>
			</select><input type="submit" name="do" value="Dupliquer">
			</form>
			<form name="formeditfrais_port" method="post" action="index2.php?page=frais_port" onSubmit="return confirmMiseAJour();">
			<input type="hidden" name="PAYS" value="<?= $_POST["PAYS"] ?>">
			<input type="hidden" name="id_frais_port" value="<?= $data["id_frais_port"] ?>">
			<b><input type="hidden" name="nom_frais_port" value="<?= $data["mode"] ?>"></b>
			<table border="0">
				<tr>
					<td class="titre_colonne">
						0
					</td>
					<td class="titre_colonne">
						250
					</td>
					<td class="titre_colonne">
						500
					</td>
					<td class="titre_colonne">
						750
					</td>
					<td class="titre_colonne">
						1000
					</td>
					<td class="titre_colonne">
						1500
					</td>
					<td class="titre_colonne">
						2000
					</td>
					<td class="titre_colonne">
						3000
					</td>
					<td class="titre_colonne">
						4000
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" class="tarif" name="250" maxlength="6" value="<?= $data["0"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="250" maxlength="6" value="<?= $data["250"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="500" maxlength="6" value="<?= $data["500"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="750" maxlength="6" value="<?= $data["750"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="1000" maxlength="6" value="<?= $data["1000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="1500" maxlength="6" value="<?= $data["1500"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="2000" maxlength="6" value="<?= $data["2000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="3000" maxlength="6" value="<?= $data["3000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="4000" maxlength="6" value="<?= $data["4000"] ?>">
					</td>
				</tr>

				<tr>
					<td class="titre_colonne">
						5000
					</td>
					<td class="titre_colonne">
						6000
					</td>
					<td class="titre_colonne">
						7000
					</td>
					<td class="titre_colonne">
						8000
					</td>
					<td class="titre_colonne">
						9000
					</td>
					<td class="titre_colonne">
						10000
					</td>
					<td class="titre_colonne">
						11000
					</td>
					<td class="titre_colonne">
						12000
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" class="tarif" name="5000" maxlength="6" value="<?= $data["5000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="6000" maxlength="6" value="<?= $data["6000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="7000" maxlength="6" value="<?= $data["7000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="8000" maxlength="6" value="<?= $data["8000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="9000" maxlength="6" value="<?= $data["9000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="10000" maxlength="6" value="<?= $data["10000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="11000" maxlength="6" value="<?= $data["11000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="12000" maxlength="6" value="<?= $data["12000"] ?>">
					</td>
				</tr>

				<tr>
					<td class="titre_colonne">
						13000
					</td>
					<td class="titre_colonne">
						14000
					</td>
					<td class="titre_colonne">
						15000
					</td>
					<td class="titre_colonne">
						16000
					</td>
					<td class="titre_colonne">
						17000
					</td>
					<td class="titre_colonne">
						18000
					</td>
					<td class="titre_colonne">
						19000
					</td>
					<td class="titre_colonne">
						20000
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" class="tarif" name="13000" maxlength="6" value="<?= $data["13000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="14000" maxlength="6" value="<?= $data["14000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="15000" maxlength="6" value="<?= $data["15000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="16000" maxlength="6" value="<?= $data["16000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="17000" maxlength="6" value="<?= $data["17000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="18000" maxlength="6" value="<?= $data["18000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="19000" maxlength="6" value="<?= $data["19000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="20000" maxlength="6" value="<?= $data["20000"] ?>">
					</td>
				</tr>

				<tr>
					<td class="titre_colonne">
						25000
					</td>
					<td class="titre_colonne">
						30000
					</td>
					<td class="titre_colonne" colspan="2">
						Date US Debut Promo
					</td>
					<td class="titre_colonne" colspan="2">
						Date US Fin Promo
					</td>
					<td colspan="2" rowspan="2">
						<input type="submit" name="do" value="Enregistrer">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" class="tarif" name="25000" maxlength="6" value="<?= $data["25000"] ?>">
					</td>
					<td>
						<input type="text" class="tarif" name="30000" maxlength="6" value="<?= $data["30000"] ?>">
					</td>
					<td colspan="2">
						<input type="text" class="tarif_date" name="promo_begin" maxlength="20" value="<?= $data["promo_begin"] ?>">
					</td>
					<td colspan="2">
						<input type="text" class="tarif_date" name="promo_end" maxlength="20" value="<?= $data["promo_end"] ?>">
					</td>
				</tr>			
			</table>
		</td>
	</tr>
	</form>
	<?php
	}
	?>
</table>
</div>
<?php
}
// FIN  AFFICHAGE DES TARIFS DU PAYS

echo "<div class='spacer'></div>";
?>
