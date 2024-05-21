<?php
session_start();
session_name("dicoland");

$filename = 'error/test.txt';
$logme="";

// Dans notre exemple, nous ouvrons le fichier $filename en mode d'ajout
// Le pointeur de fichier est placé à la fin du fichier
// c'est là que $somecontent sera placé
//$handle = fopen($filename, 'a');

 // Ecrivons quelque chose dans notre fichier.
$logme.="\n======== Begin ========\n";
/*****************************************************************************
 *
 * CM_CIC_Paiement "open source" kit for CyberMUT-P@iement(TM) and
 *                  P@iementCIC(TM).
 * Process CMCIC Payment. Sample RFC2104 compliant with PHP4 skeleton.
 *
 * File "aRenommerResultat.php":
 *
 * Author   : Euro-Information/e-Commerce (contact: centrecom@e-i.com)
 * Version  : 1.03
 * Date     : 18/12/2003
 *
 * Copyright: (c) 2003 Euro-Information. All rights reserved.
 * License  : see attached document "Licence.txt".
 *
 *----------------------------------------------------------------------------
 *
 * CM_CIC_Paiement: kit "open source" pour CyberMUT-P@iement(TM) et
 *                  P@iementCIC(TM).
 * Traitement Paiement CMCIC. Exemple compatible RFC2104, base en PHP4
 *
 * Fichier "aRenommerResultat.php" :
 *
 * Auteur   : Euro-Information/e-Commerce (contact: centrecom@e-i.com)
 * Version  : 1.03
 * Date     : 18/12/2003
 *
 * Copyright: (c) 2003 Euro-Information. Tous droits r?rv?
 * Consulter le document de licence "Licence.txt" joint.
 *
 *****************************************************************************/

// --- Nothing to customize below before a first successfull receipt test ---
// --- Rien ?hanger ci-dessous avant un premier A/R test correct ---

// --- PHP implementation of RFC2104 hmac sha1 ---
// --- Impl?ntation PHP du RFC2104 hmac sha1 ---
@require_once("CMCIC_HMAC.inc.php");
if (!function_exists('CMCIC_hmac'))
{
    $logme.="\n======== cant require hmac function ========\n";
	/*
	if (fwrite($handle, $logme) === FALSE) {
	     exit;
	}
	*/
	die ('cant require hmac function.');
}

// ----------------------------------------------------------------------------
// function CMCIC_getMyTpe
//
// IN: Code soci? / Company code
//     Code langue / Language code
//
// OUT: Param?es du Tpe / Tpe parameters
// Description: Get TPE Number, 2nd part of Key and other Merchant
//              Configuration Datas from merchant DataBase
//              Rechercher le num? de TPE, la 2nde partie crypt?de clef
//              et autres infos de configuration Marchand
// ----------------------------------------------------------------------------
function CMCIC_getMyTpe($soc="mysoc",$lang="")
{
     @require("MyTpeCMCIC.inc.php");
     if ( !is_array($MyTpe) ) {
	 $logme.="\n======== cant require Tpe config. ========\n";
	 /*if (fwrite($handle, $logme) === FALSE) {
	     exit;
	}*/
	die ('cant require Tpe config.');
	  }
     return $MyTpe;
}

// ----------------------------------------------------------------------------
// function TesterHmac
//
// IN: Param?es du Tpe / Tpe parameters
//     Champs du formulaire / Form fields
// OUT: R?ltat v?fication / Verification result
// description: V?fier le MAC et pr?rer la Reponse
//              Perform MAC verification and create Receipt
// ----------------------------------------------------------------------------
function TesterHmac($CMCIC_Tpe, $CMCIC_bruteVars )
{
   @$php2_fields = sprintf(CMCIC_PHP2_FIELDS, $CMCIC_bruteVars['retourPLUS'],
                                              $CMCIC_Tpe["tpe"],
                                              $CMCIC_bruteVars["date"],
                                              $CMCIC_bruteVars['montant'],
                                              $CMCIC_bruteVars['reference'],
                                              $CMCIC_bruteVars['texte-libre'],
                                               CMCIC_VERSION,
                                              $CMCIC_bruteVars['code-retour']);


    if ( strtolower($CMCIC_bruteVars['MAC'] ) == CMCIC_hmac($CMCIC_Tpe, $php2_fields) ):
        $result  = $CMCIC_bruteVars['code-retour'].$CMCIC_bruteVars['retourPLUS'];
        $receipt = CMCIC_PHP2_MACOK;
    else:
        $result  = 'None';
        $receipt = CMCIC_PHP2_MACNOTOK.$php2_fields;
    endif;

    $mnt_lth = strlen($CMCIC_bruteVars['montant'] ) - 3;
    if ($mnt_lth > 0):
        $currency = substr($CMCIC_bruteVars['montant'], $mnt_lth, 3 );
        $amount   = substr($CMCIC_bruteVars['montant'], 0, $mnt_lth );
    else:
        $currency = "";
        $amount   = $CMCIC_bruteVars['montant'];
    endif;

    return array( "resultatVerifie" => $result ,
                  "accuseReception" => $receipt ,
                  "tpe"             => $CMCIC_bruteVars['TPE'],
                  "reference"       => $CMCIC_bruteVars['reference'],
                  "texteLibre"      => $CMCIC_bruteVars['texte-libre'],
                  "devise"          => $currency,
                  "montant"         => $amount);
}

// Begin Main : Retrieve Variables posted by CMCIC Payment Server
//              Recevoir les variables post? par le serveur bancaire

$CMCIC_reqMethod  = $HTTP_SERVER_VARS["REQUEST_METHOD"];
if (($CMCIC_reqMethod == "GET") or ($CMCIC_reqMethod == "POST")) {
    $wCMCIC_bruteVars = "HTTP_".$CMCIC_reqMethod."_VARS";
    $CMCIC_bruteVars  = ${$wCMCIC_bruteVars};
}
else{
	$logme.="\n======== Invalid REQUEST_METHOD (not GET, not POST). ========\n";
	/*if (fwrite($handle, $logme) === FALSE) {
     exit;
	}*/
	die ('Invalid REQUEST_METHOD (not GET, not POST).');
}


@$isVariableEmpty  = $CMCIC_bruteVars['TPE'];

// empty variables ?
if (!($isVariableEmpty > " "))
{
    // You should do your best to write your scripts so that they do not
    // require register_globals to be on. Using form variables as globals
    // can easily lead to possible security problems, if the code is not
    // very well thought of.
    // Il est recommand?e ne pas ?ire de scripts qui exige de param?er
    // register_globals ?n. Utiliser les variables du formulaire comme
    // globales peut amener des probl?s de s?rit?i votre script n'est
    // pas tr?bien con?

    // var_dump($CMCIC_bruteVars);
    echo "\r\nTrying PHP<=3 old style ! "."\r\n";

    settype($CMCIC_bruteVars , "array");

    @$CMCIC_bruteVars['MAC']         = $MAC;
    @$CMCIC_bruteVars['TPE']         = $TPE;
    @$CMCIC_bruteVars['date']        = $date;
    @$CMCIC_bruteVars['montant']     = $montant;
    @$CMCIC_bruteVars['reference']   = $reference;
    $URL_texte_libre                 = "texte-libre";
    @$CMCIC_bruteVars['texte-libre'] = $$URL_texte_libre;
    $URL_code_retour                 = "code-retour";
    @$CMCIC_bruteVars['code-retour'] = $$URL_code_retour;
    @$CMCIC_bruteVars['retourPLUS']   = $retourPLUS;

    // var_dump($CMCIC_bruteVars);
    echo "\r\n Is it Better ? "."\r\n";
}

// TPE init variables
// variables initiales TPE
@$CMCIC_Tpe = CMCIC_getMyTpe();

// Message Authentication
// Test d'authentification
@$CMCIC_authVars   = TesterHmac($CMCIC_Tpe, $CMCIC_bruteVars );

@$Verified_Result  = $CMCIC_authVars['resultatVerifie'];

if ($Verified_Result == 'paiement--cvxoui--3DveN--3DpaN' or $Verified_Result == 'paiement--cvxoui--3DveY--3DpaY')
  $Verified_Result = "paiement--cvxoui";
$logme.="\n======== ".$Verified_Result." ========\n";
switch($Verified_Result)
{
  case "None--cvxoui":
  break;
  case "Annulation--cvxoui":
  break;
  case "payetest--cvxoui" :
  break;
  case "paiement--cvxoui" :


		    // Ecrivons quelque chose dans notre fichier.
		    $logme.="\n======== TRANSACTION ========\n";



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
}

// <<<--- code <<<---
// (Cas / Case : "None" , "Annulation" , "Payetest", "Paiement")
//-----------------------------------------------------------------------------
// Dump variables may give you an idea about what to do
//                           ********************
// Vider ces variables peut vous aider ?oir ce qui est ?oder
//-----------------------------------------------------------------------------
// var_dump($Verified_Result_Array);
// var_dump($CMCIC_bruteVars);
// var_dump($CMCIC_authVars);

//-----------------------------------------------------------------------------
// Send receipt to CMCIC server
// Envoyer un A/R au serveur bancaire
//-----------------------------------------------------------------------------
$logme.="\n======== end ========\n";
/*
if (fwrite($handle, $logme) === FALSE) {
     exit;
}

fclose($handle);
*/
@printf (CMCIC_PHP2_RECEIPT, $CMCIC_authVars['accuseReception']);

// Copyright (c) 2003 Euro-Information ( mailto:centrecom@e-i.com )
// All rights reserved. ---
 // Ecrivons quelque chose dans notre fichier.


?>
