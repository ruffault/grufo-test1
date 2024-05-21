<?php
session_start();
session_name("dicoland");

$filename = 'error/testmanu.txt';
$logme="";

// Dans notre exemple, nous ouvrons le fichier $filename en mode d'ajout
// Le pointeur de fichier est placé à la fin du fichier
// c'est là que $somecontent sera placé
//$handle = fopen($filename, 'a');

 // Ecrivons quelque chose dans notre fichier.
$logme.="<br>======== Begin ========<br>";


		    // Ecrivons quelque chose dans notre fichier.
		    $logme.="<br>======== TRANSACTION ========<br>";



		require 'inc/config.inc.php';
		require 'inc/connexion.inc.php';
		require 'inc/function.inc.php';
		require 'inc/session.inc.php';
		require 'inc/class.phpmailer.php';

		$_SESSION['applicationlang'] = $applicationlang;

		if (isset($_GET["reference"]))
		{
			$id_commande = give_id_commande(addcslashes($_GET["reference"]));
			$basket = give_basket($id_commande);

			if ($basket != false)
			{
				foreach ($basket as $key => $linebasket)
				{
					if ($linebasket['quantite'] > 1)
						$contenu_cmd .= "* " . $linebasket['nom'] . " | " . $linebasket['quantite'] . " exemplaires\r<br>";
					else
						$contenu_cmd .= "* " . $linebasket['nom'] . " | " . $linebasket['quantite'] . " exemplaire\r<br>";
				}

				$basket_summary = basket_summary($basket);
				$address = order_address($id_commande, $applicationlang);
				$poid_cmd = poid_commande($id_commande);
				$frais_port = frais_port($poid_cmd, $address['livraison_id_livraison']);
				$jours_livraison = temps_total_livraison($id_commande);
				//Mise a jour de la commande
				$sql = "UPDATE commande
									set statut = '3',
									`mode_paiement` = 'carte',
									`date_validation` = '" . date("Y-m-d H:i:s") . "',
									`prix_total_ht` = '" . twodecimal($basket_summary['total_ht']). "',
									`prix_total_ttc` = '" . twodecimal($basket_summary['total_ttc']) . "',
									`prix_port` = '" . twodecimal($frais_port[0]['prix']) . "',
									`delay` = '" . $jours_livraison . "'
									WHERE code = '" . $_GET["reference"] . "'
									;";
					// Ecrivons quelque chose dans notre fichier.
			    $logme.=$sql."<br>";

				mysqli_query($link,$sql);

				list($id_membre,$id_user)= split ("/", $_POST["texte-libre"], 2);

				$code_cmd = code_cmd();

				$sql_newcommande = "INSERT INTO commande(id_commande, id_utilisateur,date_creation,statut, code)
													VALUES('',
																	'" . $id_user . "',
																	'" . date("Y-m-d H:i:s") . "',
																	'0',
																	'".$code_cmd."'
																)
				;";
					// Ecrivons quelque chose dans notre fichier.
			    $logme.=$sql_newcommande."<br>";
				mysqli_query($link,$sql_newcommande);

				require 'lang/' . $_SESSION['applicationlang'] . '/paiement_ok.lang.php';

				// Mail au membre
				$to = $address['membre_email'];

				//$message .= $ps;
				$message .= $mailcoordonnee;

				$mail = new PHPMailer();
				$mail->From     = "service-client@dicoland.com";
				$mail->FromName = "Dicoland.com";
				$mail->Priority = 3;
				$mail->Subject  = $subject;
				$mail->Body    = $message;
				$mail->AddAddress($to);
				//$mail->Send();

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
				$mailtoadmin->AddAddress($mailadmin);
				//$mailtoadmin->Send();

				$logme.="<br> MAIL ENVOYE : ".$to."<br>".$message."<br><br>"."MAIL ENVOYE ADMIN : ".$mailadmin."<br>".$messageadmin;

			}
		}
$logme.="<br>======== end ========<br>";
/*
if (fwrite($handle, $logme) === FALSE) {
     exit;
}

fclose($handle);
*/
echo $logme;


?>
