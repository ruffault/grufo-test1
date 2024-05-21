<?php
//phpinfo();
/*
require 'inc/config.inc.php';
		require 'inc/connexion.inc.php';
		require 'inc/function.inc.php';
		require 'inc/session.inc.php';
		require 'inc/class.phpmailer.php';

$message .= $mailcoordonnee;

				$mail = new PHPMailer();
				$mail->From     = "service-client@dicoland.com";
				$mail->FromName = "Dicoland.com";
				$mail->Priority = 3;
				$mail->Subject  = $subject;
				$mail->Body    = $message;
				$mail->AddAddress("nabil.eddahmany@at-lci.com");
				$mail->Send();

//Mail a l'admin pour lui indiquer la nouvelle commande
				$subjectadmin = "Commande reference " . $_POST["reference"] . " a traiter";
				$messageadmin = "Bonjour,<br><br>La commande, referencee " . $_POST["reference"]
				. ", vient d'etre validee le " . date("d/m/Y") . " a "
				. date("H:m") . ". Vous pouvez la traiter dans la partie "
				. "administration du site.\r<br>\r<br>"
				. "Contenu de la commande :\r<br>"
				. "-------------------\r<br>"
				. $contenu_cmd . "\r<br>"
				. "Rendez vous sur  "
				. "$urlsite/admin/index2.php?page=viewcommande";

				$mailtoadmin = new PHPMailer();
				$mailtoadmin->From     = "site@dicoland.com";
				$mailtoadmin->FromName = "Dicoland.com";
				$mailtoadmin->Priority = 3;
				$mailtoadmin->Subject  = $subjectadmin;
				$mailtoadmin->Body    = $messageadmin;
				$mailtoadmin->AddAddress("webmaster@lci-europe.com");
				$mailtoadmin->Send();
*/
				echo "Ovh Marie";
?>
