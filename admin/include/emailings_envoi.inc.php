<?
require("include/class.phpmailer.php");
if (!isset($_GET['ID']) && !isset($_POST['ID']))
{
	header("Location: ".$_SERVER["HTTP_REFERER"]."");
	die;
}
?>
		<DIV>EMAILINGS : Envoi</DIV>
		<BR>

		<p><a href="index2.php?page=emailings"><= Retour à l'accueil</a></p>
<?php
if (isset($_POST['MAX']) && is_numeric($_POST['MAX']) && isset($_POST['ID']))
{
	// Envoi des $MAX mails d'affilé en evitant les gens blacklistés
	$sql_emails = "SELECT emailings_destinataires.* FROM emailings_destinataires LEFT JOIN emailings_blacklist ON emailings_destinataires.EMAIL_DESTINATAIRE=emailings_blacklist.EMAIL WHERE emailings_blacklist.EMAIL IS NULL AND emailings_destinataires.ID_EMAILING='".$_POST['ID']."' AND emailings_destinataires.DATETIME_ENVOI='0000-00-00 00:00:00' LIMIT ".$_POST['MAX'];
	$req_emails = mysql_query($sql_emails) or die ("Erreur SQL : ".mysql_error());
	$nbr_emails = mysql_numrows($req_emails);
	
	// Récupération des informations concernant l'emailing
	$emailing = new emailing();
	$emailing -> lire_emailing($_POST['ID']);
	$EMAIL_SENDER = $emailing->EMAIL_SENDER;
	$NOM_SENDER = $emailing->NOM_SENDER;
	$SUJET = $emailing->SUJET;
	$CONTENU = $emailing->CONTENU;
	$FORMAT = $emailing->FORMAT;

	$mail = new PHPMailer();
	$mail->From     = $EMAIL_SENDER;
	$mail->FromName = $NOM_SENDER;
	$mail->AddReplyTo  = $EMAIL_SENDER;
	$mail->Priority = 3;
	$mail->Host     = "localhost;smtp.dicoland.com";
	$mail->Mailer   = "smtp";
	$mail->Subject  = $SUJET;

	// HTML body
	$body = $CONTENU;

	// Plain text body (for mail clients that cannot read HTML)
	$text_body  = "Je vous informe que ceci est un message au format HTML.\n\n";
	
	$mail->Body    = $body;
	$mail->AltBody = $text_body;
	
	echo "<b><span>".$nbr_emails." Destinataires vont être traités :</span></b><br><br>";
	
	// On vérifie si il y a ou non des pieces jointes a attacher au mail
	$nbr_attachment = count(getArrayEmailingsPJFile($_POST['ID'],"".$PATH_PJ.""));
	if ($nbr_attachment)
	{
		// DEBUT BOUCLE sur chaque piece jointe a attacher au mail
		$array_pieces_jointes = getArrayEmailingsPJFile($_POST['ID'],"".$PATH_PJ."");
		foreach($array_pieces_jointes as $nom_fichier)
		{
			$file = $PATH_PJ.$nom_fichier;
			$mail->AddAttachment($file, substr($nom_fichier,strlen($_POST['ID'])+1));
		}		
		// FIN BOUCLE sur chaque piece jointe a attacher au mail
	}

	while ($data_emails = mysql_fetch_array($req_emails))
	{
		$now = "";
		echo "<span>Envoi du mail à : ".$data_emails["EMAIL_DESTINATAIRE"]."</span>";		
		$mail->AddAddress($data_emails["EMAIL_DESTINATAIRE"]);		
		if ($mail->Send())
		{
			echo " - <span class=\"succes\"><b>OK</b></span><br>";
			// On insere la date du jour dans la base pour indiqué que ce destinataire a déjà reçu le mail
			$now = date("Y-m-d H:i:s");
			$sql_done = "UPDATE emailings_destinataires SET DATETIME_ENVOI='".$now."' WHERE ID='".$data_emails["ID"]."' LIMIT 1";
			$req_done = mysql_query($sql_done) or die ("Erreur SQL : ".mysql_error());
		}
		else
		{
			echo " - <span class=\"echec\"><b>KO</b></span><br>";
		}
		// Clear all addresses
		$mail->ClearAddresses();
	}
	
	echo "<br><a href=\"index2.php?page=emailings&subpage=envoi&ID=".$_POST['ID']."\"><span><< Retour au choix du nombre d'envois simultannés</span></a>";
}
else
{
	// Formulaire de choix du nombre maximum d'envois d'affilé (pour éviter un timeout d'exécution de page PHP)
	?>
	<p>Limiter le nombre d'emails envoyés à la suite à :</p>
	<form name="formu_choix" method="POST">
	<input type="hidden" name="ID" value="<?= $_GET['ID'] ?>">
	<select name="MAX">
	<option name="MAX" value="10">10</option>
	<option name="MAX" value="50">50</option>
	<option name="MAX" value="100">100</option>
	<option name="MAX" value="200">200</option>
	<option name="MAX" value="500">500</option>
	<option name="MAX" value="1000">1000</option>
	</select>
	<span> maximum </span>
	<input type="submit" name="action" value="Envoyer l'emailing">
	</form>
	<?php
}
?>