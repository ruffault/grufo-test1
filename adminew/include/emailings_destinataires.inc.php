<?php
$ResultMessageOK = "";
$ResultMessageKO = "";
if(!isset($_GET['ID']) && !isset($_POST['ID']))
{
    echo "Impossible d'identifier le emailing";
    return;
}
if (isset($_GET['ID']) && is_numeric($_GET['ID']))
{
	$ID = $_GET['ID'];
}
if (isset($_POST['ID']) && is_numeric($_POST['ID']))
{
	$ID = $_POST['ID'];
}

if(isset($_POST["action"]) && trim($_POST["action"]) == "copy_emails_from_membres" && isset($ID) && is_numeric($ID) && isset($_POST["pays"]) && trim($_POST["pays"]))
{
		$sql_emails_a_importer = "SELECT `email` from membre WHERE `mailinglist`='1' AND `pays`='".$_POST["pays"]."'";
		$req_emails_a_importer = mysqli_query($link,$sql_emails_a_importer) or die ("Erreur SQL : ".mysqli_error($link));
		$compteur_email= 0;
    while ($data = mysqli_fetch_array($req_emails_a_importer))
    {
			if (!EmailDejaImportee($data["email"],$ID))
			{
				// Insertion en base de la ligne correspondante a l'adresse Email
				$sql_insert = "INSERT INTO emailings_destinataires(ID,ID_EMAILING,EMAIL_DESTINATAIRE) VALUES('','".$ID."','".$data["email"]."')";
				$req_insert = mysqli_query($link,$sql_insert) or die ("Erreur SQL : ".mysqli_error($link));
				$compteur_email++;
			}
		}
		if ($compteur_email)
		{
			$ResultMessageOK.= "Succes : ".$compteur_email." adresses Email ont été importées depuis la liste des membres ".$_POST["pays"]." abonnés à la mailinglist.<BR>";
		}
		else
		{
			$ResultMessageKO.= "Echec : Aucune adresse email non-existante n'a pas été importée depuis la liste des membres ".$_POST["pays"]." abonnés à la mailinglist.<BR>";
		}
}

if(isset($_POST["action"]) && trim($_POST["action"]) == "copy_emails_from_other_emailing" && isset($ID) && is_numeric($ID) && isset($_POST["ID_emailing_source"]) && is_numeric($_POST["ID_emailing_source"]))
{
		$sql_emails_a_importer = "SELECT EMAIL_DESTINATAIRE from emailings_destinataires WHERE emailings_destinataires.ID_EMAILING=".$_POST["ID_emailing_source"];
		$req_emails_a_importer = mysqli_query($link,$sql_emails_a_importer) or die ("Erreur SQL : ".mysqli_error($link));
		$compteur_email= 0;
    while ($data = mysqli_fetch_array($req_emails_a_importer))
    {
			if (!EmailDejaImportee($data["EMAIL_DESTINATAIRE"],$ID))
			{
				// Insertion en base de la ligne correspondante a l'adresse Email
				$sql_insert = "INSERT INTO emailings_destinataires(ID,ID_EMAILING,EMAIL_DESTINATAIRE) VALUES('','".$ID."','".$data["EMAIL_DESTINATAIRE"]."')";
				$req_insert = mysqli_query($link,$sql_insert) or die ("Erreur SQL : ".mysqli_error($link));
				$compteur_email++;
			}
		}
		if ($compteur_email)
		{
			$ResultMessageOK.= "Succes : ".$compteur_email." adresses Email ont été importées depuis l'autre Emailing.<BR>";
		}
		else
		{
			$ResultMessageKO.= "Echec : Aucune adresse email non-existante n'a pas été importée de l'autre Emailing.<BR>";
		}
}

if(isset($_POST["action"]) && trim($_POST["action"]) == "ajout_manuel" && isset($ID) && is_numeric($ID))
{
		if (EmailIsValide($_POST["email_destinataire"]) && !EmailDejaImportee($_POST["email_destinataire"],$ID))
		{
			// Insertion en base de la ligne correspondante a l'adresse Email si non déjà existante
			$sql_insert = "INSERT INTO emailings_destinataires(ID,ID_EMAILING,EMAIL_DESTINATAIRE) VALUES('','".$ID."','".$_POST["email_destinataire"]."')";
			$req_insert = mysqli_query($link,$sql_insert) or die ("Erreur SQL : ".mysqli_error($link));
			$ResultMessageOK.= "Succes : ".$_POST["email_destinataire"]." a été importée.<BR>";
		}
		else
		{
			$ResultMessageKO.= "Echec : ".$_POST["email_destinataire"]." n'a pas été importée (email vide, invalide ou déjà insérée).<BR>";
		}
}

if(isset($_POST["action"]) && trim($_POST["action"]) == "cancel_envoi" && isset($_POST["ID_DEST"]) && is_numeric($_POST["ID_DEST"]) && EmailDejaEnvoye($_POST["ID_DEST"]))
{
		// Suppression en base de la date d'envoi existante
		$sql_update = "UPDATE emailings_destinataires SET DATETIME_ENVOI='0000-00-00 00:00:00' WHERE ID='".$_POST["ID_DEST"]."'";
		if (mysqli_query($link,$sql_update))
		{
			$ResultMessageOK.= "Succes : l'envoi précédent a été supprimé de la base.<BR>";
		}
		else
		{
			$ResultMessageKO.= "Echec : l'envoi précédent n'a pas été supprimé de la base.<BR>";
		}
}

// Blacklistage d'une adresse EMAIL
if(isset($_POST["action"]) && trim($_POST["action"]) == "blacklist" && isset($ID) && is_numeric($ID))
{
		if (EmailIsValide($_POST["EMAIL"]) && !EmailIsBlackListee($_POST["EMAIL"]) )
		{
			// Insertion en base de blacklistage de la ligne correspondante a l'adresse Email
			$sql_insert_bl = "INSERT INTO emailings_blacklist(ID,EMAIL) VALUES('','".$_POST["EMAIL"]."')";
			$req_insert_bl = mysqli_query($link,$sql_insert_bl) or die ("Erreur SQL : ".mysqli_error($link));
			if ($req_insert_bl)
			{
				$ResultMessageOK.= "Succes : ".$_POST["EMAIL"]." a été blacklistée.<BR>";
			}
			else
			{
				$ResultMessageKO.= "Echec : ".$_POST["EMAIL"]." n'a pas été blacklistée.<BR>";
			}
		}
}

// DéBlacklistage d'une adresse EMAIL
if(isset($_POST["action"]) && trim($_POST["action"]) == "unblacklist" && isset($ID) && is_numeric($ID))
{
		if (EmailIsValide($_POST["EMAIL"]) && EmailIsBlackListee($_POST["EMAIL"]) )
		{
			// Suppression de la base de blacklistage de la ligne correspondante a l'adresse Email
			$sql_del_bl = "DELETE FROM emailings_blacklist WHERE EMAIL='".$_POST["EMAIL"]."' LIMIT 1";
			$req_del_bl = mysqli_query($link,$sql_del_bl) or die ("Erreur SQL : ".mysqli_error($link));
			if ($req_del_bl)
			{
				$ResultMessageOK.= "Succes : ".$_POST["EMAIL"]." a été déblacklistée.<BR>";
			}
			else
			{
				$ResultMessageKO.= "Echec : ".$_POST["EMAIL"]." n'a pas été déblacklistée.<BR>";
			}
		}
}

if(isset($_POST["action"]) && trim($_POST["action"]) == "ajout" && isset($ID) && is_numeric($ID))
{
	$MAX_FILE_SIZE = 500000;
	$TabloEmailsDestination = array();
	$tmp_dir = ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir();
	$FichierEmailsDestination = $tmp_dir."/destinataires.txt";
	//echo $FichierEmailsDestination;
	// Récupération de la liste des E-Mails de destination
	// Upload du fichier sélectionné contenant 1 adresse E-Mail par ligne
	if (trim($_FILES["fichier_destinataires"]["name"]))
	{
    	// On test si on doit uploader un fichier de taille valide ou non
    	if ($_FILES["fichier_destinataires"]["size"] > $MAX_FILE_SIZE || $_FILES["fichier_destinataires"]["size"] == 0)
    	{
				$ResultMessageKO.= "Erreur : La taille du fichier des adresses de destination à uploader est > à ".$MAX_FILE_SIZE." Ko.<BR>";
    	}
    	else
    	{
				$uploaded_destinataires_ok = move_uploaded_file($_FILES["fichier_destinataires"]["tmp_name"], "".$FichierEmailsDestination."");
    		// On verifie que l'upload se soit bien passé.
    		if ($uploaded_destinataires_ok)
    		{
	    		$fichier_destinataires = "".$FichierEmailsDestination."";
					$handle = fopen("".$FichierEmailsDestination."", "r");
					while (!feof($handle))
					{
						$Email = trim(fgets($handle, 4096));
						if (EmailIsValide($Email) && !EmailDejaImportee($Email,$ID))
						{
							// Insertion en base de la ligne correspondate a l'adresse Email si non déjà existante
							$sql_insert = "INSERT INTO emailings_destinataires(ID,ID_EMAILING,EMAIL_DESTINATAIRE) VALUES('','".$ID."','".$Email."')";
							$req_insert = mysqli_query($link,$sql_insert) or die ("Erreur SQL : ".mysqli_error($link));
							$TabloEmailsDestination[] = $Email;
						}
					}
					$nbr_emails_trouvees = count($TabloEmailsDestination);
					if (!$nbr_emails_trouvees)
					{
						$ResultMessageKO.= "Erreur : Aucune adresse email détectée ou adresses déjà importées.<BR>";
					}
					else
					{
						$ResultMessageOK.= "Succes : ".$nbr_emails_trouvees." adresses email ont été importées.<BR>";
					}
					// TODO Suppression du fichier uploadé
    		}
    		else
    		{
    			$ResultMessageKO.= "Erreur : Le fichier \"".$_FILES["fichier_destinataires"]["name"]."\" des adresses de destination n'a pas été uploadé correctement sur le serveur.<br>";
    		}
    	}
	}
	else
	{
		$ResultMessageKO.= "Erreur : Fichier contenant la liste des adresses de destination non-sélectionné.<br>";
	}
}
if(isset($_POST["action"]) && trim($_POST["action"]) == "Supprimer" && isset($ID) && is_numeric($ID) && isset($_POST["ID_TO_DEL"]) && is_numeric($_POST["ID_TO_DEL"]) )
{
	$sql_del_email = "DELETE FROM emailings_destinataires WHERE ID_EMAILING='".$ID."' AND ID='".$_POST["ID_TO_DEL"]."'";
	$req_del_email = mysqli_query($link,$sql_del_email) or die ("Erreur SQL : ".mysqli_error($link));
	if ($req_del_email)
	{
		$ResultMessageOK.= "Succès : Suppression de l'adresse Email de destination d'ID n°".$_POST["ID_TO_DEL"];
	}
	else
	{
		$ResultMessageKO.= "Erreur : Impossible de supprimer l'adresse Email de destination d'ID n°".$_POST["ID_TO_DEL"];
	}
}

if(isset($_POST["action"]) && trim($_POST["action"]) == "purger" && isset($ID) && is_numeric($ID))
{
	$sql_purge_email = "DELETE FROM emailings_destinataires WHERE ID_EMAILING='".$ID."'";
	$req_purge_email = mysqli_query($link,$sql_purge_email) or die ("Erreur SQL : ".mysqli_error($link));
	if ($req_purge_email)
	{
		$ResultMessageOK.= "Succès : Purge de toutes les adresses emails effectuée.";
	}
	else
	{
		$ResultMessageKO.= "Erreur : Impossible de purger les adresses Email.";
	}
}
?>
<DIV>EMAILINGS : Gestion des destinataires</DIV>
<BR>

<p><a href="index2.php?page=emailings"><= Retour à l'accueil</a></p>

<?php
setlocale (LC_TIME, "fr_FR.utf8");
if (isset($ResultMessageOK) && trim($ResultMessageOK))
{
	echo "<div id=\"succes\"><b>".$ResultMessageOK."</b></div><br>";
}
if (isset($ResultMessageKO) && trim($ResultMessageKO))
{
	echo "<div id=\"echec\"><b>".$ResultMessageKO."</b></div><br>";
}
$mailing = new emailing();
$mailing->lire_emailing($ID);
$sujet = $mailing->SUJET;
$date = $mailing->DATETIME_CREATION;
$date_ec = date('d/m/y',strtotime($date));
echo "<center><p><b>Vous avez sélectionné la liste N°".$ID." nommée <i>".$sujet."</i> datant du <i>".$date_ec."</i> .</center></b></p>";
?>

<FORM NAME="form_ajout" ACTION="index2.php?page=emailings&subpage=destinataires" METHOD="post" enctype="multipart/form-data">
  <INPUT TYPE="hidden" NAME="action" VALUE="ajout">
  <INPUT TYPE="hidden" NAME="ID" VALUE="<?= $ID ?>">
<TABLE class="table table-bordered"  BORDER="0" CELLSPACING="5">
<TR>
    <TD VALIGN="top" COLSPAN="2" align="left">
    	<b>IMPORTER UNE LISTE DE DESTINATAIRES DEPUIS UN FICHIER TEXTE (1 adresse E-Mail par ligne)</b>
    	<br>
    	<br>
    	Merci de sélectionner le fichier contenant la liste des E-Mails de destination à ajouter pour cet emailing :
    </TD>
</TR>
<TR>
    <TD COLSPAN="2" align="left">
    	<input type="file" name="fichier_destinataires" value=""> <INPUT TYPE="submit" VALUE="ENREGISTRER">
    </TD>
</TR>
</TABLE>
</FORM>

<FORM NAME="form_copy_emails_from_other_emailing" ACTION="index2.php?page=emailings&subpage=destinataires" METHOD="post">
  <INPUT TYPE="hidden" NAME="action" VALUE="copy_emails_from_other_emailing">
  <INPUT TYPE="hidden" NAME="ID" VALUE="<?= $ID ?>">
<TABLE class="table table-bordered" BORDER="0" CELLSPACING="5">
<TR>
    <TD VALIGN="top" COLSPAN="2" align="left">
    	<b>IMPORTER UNE LISTE DE DESTINATAIRES DEPUIS UN AUTRE EMAILING EXISTANT</b>
    	<br>
    	<br>
	Merci de sélectionner l'Emailing existant contenant la liste des E-Mails de destination à récupérer
    </TD>
</TR>
<TR>
    <TD COLSPAN="2" align="left">
    	<select name="ID_emailing_source">
<?php
    		$sql_emailings_existant = "SELECT * FROM emailings_contenus, emailings_destinataires WHERE emailings_contenus.ID <> ".$ID." AND emailings_contenus.ID=emailings_destinataires.ID_EMAILING GROUP BY emailings_destinataires.ID_EMAILING";
    		$req_emailings_existant = mysqli_query($link,$sql_emailings_existant) or die ("Erreur SQL : ".mysqli_error($link));
		while ($data = mysqli_fetch_array($req_emailings_existant))
		    {
    			$nbr_of_destinataires = 0;
			$nbr_of_destinataires = getTotalEmailNumberOfEmailing($data["ID_EMAILING"]);
		?>	

    			<option name="ID_emailing_source" value="<?= $data["ID_EMAILING"] ?>">ID <?= $data["ID_EMAILING"] ?> - <?= $data["SUJET"] ?> du <?= getDateFR($data["DATETIME_CREATION"]) ?> - <?= $nbr_of_destinataires ?> adresse(s) à copier</option>
<?php
/* modif faite le 23/10/20 par GR pour corriger ce qu'il pensait être un problème sur l'utilisation du <?= en php . En fait ç amarche. le pb était ailleurs
			<option name="ID_emailing_source" value="<?php echo $data["ID_EMAILING"]; ?>">ID <?php echo $data["ID_EMAILING"]; ?> - <?php echo $data["SUJET"]; ?> du <?php echo getDateFR($data["DATETIME_CREATION"]); ?> - <?php echo $nbr_of_destinataires; ?> adresse(s) à copier</option>
 */
?>			
<?php
    		}
?> 
    	</select>
    	<INPUT TYPE="submit" VALUE="COPIER">
    </TD>
</TR>
</TABLE>
</FORM>

<FORM NAME="form_copy_emails_from_other_emailing" ACTION="index2.php?page=emailings&subpage=destinataires" METHOD="post">
  <INPUT TYPE="hidden" NAME="action" VALUE="copy_emails_from_membres">
  <INPUT TYPE="hidden" NAME="ID" VALUE="<?= $ID ?>">
<TABLE class="table table-bordered" BORDER="0" CELLSPACING="5">
<TR>
    <TD VALIGN="top" COLSPAN="2" align="left">
    	<b>IMPORTER UNE LISTE DE DESTINATAIRES DEPUIS LES MEMBRES INSCRITS A LA MAILING LIST</b>
    	<br>
    	<br>
    	Merci de sélectionner la cible des membres à récupérer :
    </TD>
</TR>
<TR>
    <TD COLSPAN="2" align="left">
    	<select name="pays">
    		<option name="pays" value="FR">Francais</option>
    		<option name="pays" value="EN">Anglais</option>
    		<option name="pays" value="DE">Allemands</option>
    		<option name="pays" value="ES">Espagnols</option>
    		<option name="pays" value="IT">Italiens</option>
    	</select>
    	<INPUT TYPE="submit" VALUE="IMPORTER">
    </TD>
</TR>
</TABLE>
</FORM>

<FORM NAME="form_purger_emails" ACTION="index2.php?page=emailings&subpage=destinataires" METHOD="post">
  <INPUT TYPE="hidden" NAME="action" VALUE="purger">
  <INPUT TYPE="hidden" NAME="ID" VALUE="<?= $ID ?>">
<TABLE class="table table-bordered" BORDER="0" CELLSPACING="5">
<TR>
    <TD VALIGN="top" COLSPAN="2" align="left">
    	<b>PURGER CETTE LISTE D'ADRESSES EMAIL</b>
    	<br>
    	<br>
    	Cliquer sur le bouton ci-dessous pour vider la liste des destinataires de cet emailing :
    </TD>
</TR>
<TR>
    <TD COLSPAN="2" align="left">
    	<INPUT TYPE="submit" VALUE="PURGER CETTE LISTE DE DESTINATAIRES" onclick="if(window.confirm('Voulez-vous vraiment purger ?')){return true;}else{return false;}">
    </TD>
</TR>
</TABLE>
</FORM>

<FORM NAME="form_ajout_manuel" ACTION="index2.php?page=emailings&subpage=destinataires" METHOD="post">
  <INPUT TYPE="hidden" NAME="action" VALUE="ajout_manuel">
  <INPUT TYPE="hidden" NAME="ID" VALUE="<?= $ID ?>">
<TABLE class="table table-bordered" BORDER="0" CELLSPACING="5">
<TR>
    <TD VALIGN="top" COLSPAN="2" align="left">
    	<b>AJOUT RAPIDE D'UNE ADRESSE EMAIL</b>
    	<br>
    	<br>
    	Merci d'indiquer l'adresse E-Mail de destination à ajouter pour cet emailing :
    </TD>
</TR>
<TR>
    <TD COLSPAN="2" align="left">
    	<input type="text" name="email_destinataire" value=""> <INPUT TYPE="submit" VALUE="AJOUTER">
    </TD>
</TR>
</TABLE>
</FORM>
<?php
// Liste des adresses actuellement enregistrées
$sql_liste = "SELECT * FROM emailings_destinataires WHERE ID_EMAILING='".$ID."'";
$req_liste = mysqli_query($link,$sql_liste) or die ("Erreur SQL : ".mysqli_error($link));
$nbr_liste = mysqli_num_rows($req_liste);
echo "<p><b>".$nbr_liste." adresses de destination actuellement enregistrées pour cet Emailing (Adresses Black-Listée incluses).</b></p>";
$i = 0;
while ($data_liste = mysqli_fetch_array($req_liste))
{
	// On créé l'entete du tableau uniquement la premiere fois
	if ($i == 0)
	{
		?>
		<table class="table table-bordered" border="0">
			<tr>
				<td>
					Adresse Email
				</td>
				<td>
					Etat
				</td>
				<td>
					BlackListe
				</td>
				<td>
					Actions
				</td>
			</tr>
		<?php
	}
	?>
	<tr>
		<td>
			<?= $data_liste["EMAIL_DESTINATAIRE"]; ?>
		</td>
		<form name="formu_cancel_envoi_<?= $data_liste["ID"] ?>" method="post">
		<td>
			<?php
			if ($data_liste["DATETIME_ENVOI"] == "0000-00-00 00:00:00")
			{
				echo "<input type=\"submit\" disabled=\"on\" name=\"submit\" value=\"Pas encore Envoyé\">";
			}
			else
			{
				echo "<input type=\"submit\" name=\"submit\" value=\"Déjà Envoyé\">";
				echo "<input type=\"hidden\" name=\"action\" value=\"cancel_envoi\">";
				echo "<input type=\"hidden\" name=\"ID_DEST\" value=\"".$data_liste["ID"]."\">";
				echo "<input type=\"hidden\" name=\"ID\" value=\"".$ID."\">";
			}
			?>
		</td>
		</form>
		<form name="formu_unblacklist_<?= $data_liste["ID"] ?>" method="post">
		<td align="center">
			<?php
			if (EmailIsBlackListee($data_liste["EMAIL_DESTINATAIRE"]))
			{
				?>
				<input type="hidden" name="ID" value="<?= $ID ?>">
				<input type="hidden" name="action" value="unblacklist">
				<input type="hidden" name="EMAIL" value="<?= $data_liste["EMAIL_DESTINATAIRE"] ?>">
				<input type="image" src="css/picto_blacklist.gif" name="bouton_unblacklist" value="unblacklist" title="Cette adresse Email est blacklistée. Cliquez pour annuler son blacklistage">
				<?php
			}
			else
			{
				?>
				<input type="hidden" name="ID" value="<?= $ID ?>">
				<input type="hidden" name="action" value="blacklist">
				<input type="hidden" name="EMAIL" value="<?= $data_liste["EMAIL_DESTINATAIRE"] ?>">
				<input type="image" src="css/picto_noblacklist.gif" name="bouton_blacklist" value="blacklist" title="Cette adresse Email n'est pas blacklistée. Cliquez pour activer son blacklistage">
				<?php
			}
			?>
		</td>
		</form>
		<form name="formu_del_<?= $data_liste["ID"] ?>" method="post">
		<td>
			<input type="submit" name="action" value="Supprimer">
			<input type="hidden" name="ID" value="<?= $ID ?>">
			<input type="hidden" name="ID_TO_DEL" value="<?= $data_liste["ID"] ?>">
		</td>
		</form>
	</tr>
	<?php
	$i++;
}
?>
</table>
