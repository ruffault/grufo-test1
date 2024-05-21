<?php
session_start();
session_name("dicoland");
/*****************************************************************************
 *
 * "Open source" kit for CM-CIC P@iement(TM).
 * Process CMCIC Payment. Sample RFC2104 compliant with PHP4 skeleton.
 *
 * File "Phase2Retour.php":
 *
 * Author   : Euro-Information/e-Commerce (contact: centrecom@e-i.com)
 * Version  : 1.04
 * Date     : 01/01/2009
 *
 * Copyright: (c) 2009 Euro-Information. All rights reserved.
 * License  : see attached document "Licence.txt".
 *
 *****************************************************************************/

header("Pragma: no-cache");
header("Content-type: text/plain");

// TPE Settings
// Warning !! CMCIC_Config contains the key, you have to protect this file with all the mechanism available in your development environment.
// You may for instance put this file in another directory and/or change its name. If so, don't forget to adapt the include path below.
require_once("CMCIC_Config.php");

// --- PHP implementation of RFC2104 hmac sha1 ---
require_once("CMCIC_Tpe.inc.php");


// Begin Main : Retrieve Variables posted by CMCIC Payment Server 
$CMCIC_bruteVars = getMethode();

// TPE init variables
$oTpe = new CMCIC_Tpe();
$oHmac = new CMCIC_Hmac($oTpe);

// Message Authentication
$cgi2_fields = sprintf(CMCIC_CGI2_FIELDS, $oTpe->sNumero,
					  $CMCIC_bruteVars["date"],
				          $CMCIC_bruteVars['montant'],
				          $CMCIC_bruteVars['reference'],
				          $CMCIC_bruteVars['texte-libre'],
				          $oTpe->sVersion,
				          $CMCIC_bruteVars['code-retour'],
					  $CMCIC_bruteVars['cvx'],
					  $CMCIC_bruteVars['vld'],
					  $CMCIC_bruteVars['brand'],
					  $CMCIC_bruteVars['status3ds'],
					  $CMCIC_bruteVars['numauto'],
					  (isset($CMCIC_bruteVars['motifrefus']) ? $CMCIC_bruteVars['motifrefus'] : '') ,
					  $CMCIC_bruteVars['originecb'],
					  $CMCIC_bruteVars['bincb'],
					  $CMCIC_bruteVars['hpancb'],
					  $CMCIC_bruteVars['ipclient'],
					  $CMCIC_bruteVars['originetr'],
					  $CMCIC_bruteVars['veres'], $CMCIC_bruteVars['pares']
					);


if ($oHmac->computeHmac($cgi2_fields) == strtolower($CMCIC_bruteVars['MAC']))
	{
	switch($CMCIC_bruteVars['code-retour']) {
		case "Annulation" :
			// Payment has been refused
			// put your code here (email sending / Database update)
			// Attention : an autorization may still be delivered for this payment
			//Echo "Annulation";
			break;

		case "payetest":
			// Payment has been accepeted on the test server
			// put your code here (email sending / Database update)
			//Echo "Ok Test";
			require 'inc/config.inc.php';
			require 'inc/connexion.inc.php';
			require 'inc/function.inc.php';
			require 'inc/session.inc.php';
			require 'inc/class.phpmailer.php';

			$_SESSION['applicationlang'] = $applicationlang;

			if (isset($_POST["reference"]))
			{
				$id_commande = give_id_commande($_POST["reference"]);
				$basket = give_basket($id_commande);
				$contenu_cmd = "";
				if ($basket != false)
				{
					foreach ($basket as $key => $linebasket)
					{
						if ($linebasket['quantite'] > 1)
							$contenu_cmd .= "* " . $linebasket['nom'] . " | " . $linebasket['quantite'] . " exemplaires\r\n";
						else
							$contenu_cmd .= "* " . $linebasket['nom'] . " | " . $linebasket['quantite'] . " exemplaire\r\n";
					}

					$basket_summary = basket_summary($basket);
						// j'introduis la spécificité des ebooks qui induit des traitements sépcifiques
	if ($basket_summary['total_ebook'] != 0 && $basket_summary['total_ebook'] == $basket_summary['total_produits'])
	{
		$address = order_address_ebook($_SESSION["id_commande"], $applicationlang);
		$frais_port = 0;
		$jours_livraison=0;
	}
	else {
$address = order_address($id_commande, $applicationlang);
					$poid_cmd = poid_commande($id_commande);
					$frais_port = frais_port($poid_cmd, $address['livraison_id_livraison']);
					$jours_livraison = temps_total_livraison($id_commande);
	}
					//Mise a jour de la commande
					$sql = "UPDATE commande
										set statut = '3',
										`mode_paiement` = 'carte',
										`date_validation` = '" . date("Y-m-d H:i:s") . "',
										`prix_total_ht` = '" . twodecimal($basket_summary['total_ht']). "',
										`prix_total_ttc` = '" . twodecimal($basket_summary['total_ttc']) . "',
										`prix_port` = '" . twodecimal($frais_port[0]['prix']) . "',
										`delay` = '" . $jours_livraison . "'
										WHERE code = '" . $_POST["reference"] . "'
										;";
						// Ecrivons quelque chose dans notre fichier.
					$logme = "";
					$logme.=$sql."\n";

					mysqli_query($link,$sql);

					list($id_membre,$id_user)= explode ("/", $_POST["texte-libre"], 2);

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
					$logme.=$sql_newcommande."\n";
					mysqli_query($link,$sql_newcommande);

					require 'lang/' . $_SESSION['applicationlang'] . '/paiement_ok.lang.php';

					// Mail au membre
					// si la commande est au moins en partie papier/physique
					if ($basket_summary['total_ebook'] != $basket_summary['total_produits'])
					{
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
					$mail->Send();
					}
					
					// Mail au membre
					// si la commande est au moins en partie numérique
					if ($basket_summary['total_ebook'] != 0)
					{
					$to = $address['membre_email'];
					$_SESSION['ebook'] = true;
					//$message .= $ps;
					$message_ebook .= $mailcoordonnee;

					$mail = new PHPMailer();
					$mail->From     = "service-client@dicoland.com";
					$mail->FromName = "Dicoland.com";
					$mail->Priority = 3;
					$mail->Subject  = $subject_ebook;
					$mail->Body    = $message_ebook;
					$mail->AddAddress($to);
					$mail->Send();
					}

					//Mail a l'admin pour lui indiquer la nouvelle commande
					$subjectadmin = "Commande reference " . $_POST["reference"] . " a traiter";
					$messageadmin = "Bonjour,\n\nLa commande, referencee " . $_POST["reference"]
					. ", vient d'etre validee le " . date("d/m/Y") . " a "
					. date("H:m") . ". Vous pouvez la traiter dans la partie "
					. "administration du site.\r\n\r\n"
					. "Contenu de la commande :\r\n"
					. "-------------------\r\n"
					. $contenu_cmd . "\r\n"
					. "IL S'AGIT D'UN TEST DE L'IMPLEMENTATION DES EBOOKS SUR LE SITE"
					. "VOUS N'AVEZ RIEN A FAIRE!! ET DONC PAS CE QUI SUIT: Rendez vous sur  "
					. "$urlsite/admin/index2.php?page=viewcommande";

					$mailtoadmin = new PHPMailer();
					$mailtoadmin->From     = "site@dicoland.com";
					$mailtoadmin->FromName = "Dicoland.com";
					$mailtoadmin->Priority = 3;
					$mailtoadmin->Subject  = $subjectadmin;
					$mailtoadmin->Body    = $messageadmin;
					$mailtoadmin->AddAddress($mailadmin);
					$mailtoadmin->Send();

					$logme.="\n MAIL ENVOYE : ".$to."\n".$message."\n\n"."MAIL ENVOYE ADMIN : ".$mailadmin."\n".$messageadmin;

				}
			}
			break;

		case "paiement":
			// Payment has been accepted on the productive server
			// put your code here (email sending / Database update)
			//Echo "Ok Prod";
			require 'inc/config.inc.php';
			require 'inc/connexion.inc.php';
			require 'inc/function.inc.php';
			require 'inc/session.inc.php';
			require 'inc/class.phpmailer.php';

			$_SESSION['applicationlang'] = $applicationlang;

			if (isset($_POST["reference"]))
			{
				$id_commande = give_id_commande($_POST["reference"]);
				$basket = give_basket($id_commande);

				if ($basket != false)
				{
					foreach ($basket as $key => $linebasket)
					{
						if ($linebasket['quantite'] > 1)
							$contenu_cmd .= "* " . $linebasket['nom'] . " | " . $linebasket['quantite'] . " exemplaires\r\n";
						else
							$contenu_cmd .= "* " . $linebasket['nom'] . " | " . $linebasket['quantite'] . " exemplaire\r\n";
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
										WHERE code = '" . $_POST["reference"] . "'
										;";
						// Ecrivons quelque chose dans notre fichier.
					$logme.=$sql."\n";

					mysqli_query($link,$sql);

					list($id_membre,$id_user)= explode ("/", $_POST["texte-libre"], 2);

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
					$logme.=$sql_newcommande."\n";
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
					$mail->Send();

					//Mail a l'admin pour lui indiquer la nouvelle commande
					$subjectadmin = "Commande reference " . $_POST["reference"] . " a traiter";
					$messageadmin = "Bonjour,\n\nLa commande, referencee " . $_POST["reference"]
					. ", vient d'etre validee le " . date("d/m/Y") . " a "
					. date("H:m") . ". Vous pouvez la traiter dans la partie "
					. "administration du site.\r\n\r\n"
					. "Contenu de la commande :\r\n"
					. "-------------------\r\n"
					. $contenu_cmd . "\r\n"
					. "Rendez vous sur  "
					. "$urlsite/admin/index2.php?page=viewcommande";

					$mailtoadmin = new PHPMailer();
					$mailtoadmin->From     = "site@dicoland.com";
					$mailtoadmin->FromName = "Dicoland.com";
					$mailtoadmin->Priority = 3;
					$mailtoadmin->Subject  = $subjectadmin;
					$mailtoadmin->Body    = $messageadmin;
					$mailtoadmin->AddAddress($mailadmin);
					$mailtoadmin->Send();

					$logme.="\n MAIL ENVOYE : ".$to."\n".$message."\n\n"."MAIL ENVOYE ADMIN : ".$mailadmin."\n".$messageadmin;

				}
			}
			break;
		/*** ONLY FOR MULTIPART PAYMENT ***/
		case "paiement_pf2":
		case "paiement_pf3":
		case "paiement_pf4":
			// Payment has been accepted on the productive server for the part #N
			// return code is like paiement_pf[#N]
			// put your code here (email sending / Database update)
			// You have the amount of the payment part in $CMCIC_bruteVars['montantech']
			break;

		case "Annulation_pf2":
		case "Annulation_pf3":
		case "Annulation_pf4":
			// Payment has been refused on the productive server for the part #N
			// return code is like Annulation_pf[#N]
			// put your code here (email sending / Database update)
			// You have the amount of the payment part in $CMCIC_bruteVars['montantech']
			break;
			
	}

	$receipt = CMCIC_CGI2_MACOK;

}
else
{
	// your code if the HMAC doesn't match
	$receipt = CMCIC_CGI2_MACNOTOK.$cgi2_fields;
}

//-----------------------------------------------------------------------------
// Send receipt to CMCIC server
//-----------------------------------------------------------------------------
printf (CMCIC_CGI2_RECEIPT, $receipt);

// Copyright (c) 2009 Euro-Information ( mailto:centrecom@e-i.com )
// All rights reserved. ---
?>
