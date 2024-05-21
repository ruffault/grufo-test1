<?php
session_start();

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
     if ( !is_array($MyTpe) ) { die ('cant require Tpe config.'); }
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
else
    die ('Invalid REQUEST_METHOD (not GET, not POST).');

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

if ($Verified_Result == 'paiement--cvxoui--3DveN--3DpaN')
	$Verified_Result = "paiement--cvxoui";

switch($Verified_Result)
{
  case "None--cvxoui":
  break;
  case "Annulation--cvxoui":
  break;
  case "payetest--cvxoui" :
  break;
  case "paiement--cvxoui" :

require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

$sql_recup = "SELECT produit.nom_$applicationlang as nom, sum(quantite) as quantite
             FROM produit, panier, commande
             WHERE produit.id_produit = panier.id_produit
             AND panier.id_commande = commande.id_commande
             AND commande.code = '" . $_GET["reference"] . "'
             GROUP BY produit.nom_$applicationlang
             ORDER BY produit.nom_$applicationlang
             ;";

$sql_recup_result = mysqli_query($link,$sql_recup);
while($val_recup = mysqli_fetch_array($sql_recup_result))
{
  if ($val_recup["quantite"] > 1)
    $contenu_cmd .= "* " . $val_recup["nom"] . " | " . $val_recup["quantite"] . " exemplaires\r\n";
  else
    $contenu_cmd .= "* " . $val_recup["nom"] . " | " . $val_recup["quantite"] . " exemplaire\r\n";
}

//--------------------------------------------------------------
$sql_produit = "SELECT 
                  produit.reference,
                  produit.nom_$applicationlang as nom,
                  categorie.nom_$applicationlang as categorie,
                  panier.prix_unitaire,
                  SUM(panier.quantite) as quantite,
                  livraison.civilite as client_civilite,
                  livraison.id_livraison,
                  commande.id_commande,
									mode,
                  tva,
                  rabais
                FROM
                  produit,
                  panier,
                  commande,
                  categorie,
                  livraison,
                  frais_port,
                  type
                 WHERE produit.id_produit = panier.id_produit
                 AND commande.id_commande = panier.id_commande
                 AND commande.code = '" . $_GET["reference"] . "'
                 AND produit.id_categorie = categorie.id_categorie
                 AND livraison.id_livraison = commande.id_livraison
                 AND frais_port.id_frais_port = livraison.id_frais_port
                 AND produit.id_type = type.id_type
                 GROUP BY produit.id_produit;";
$sql_produit_result = mysqli_query($link,$sql_produit);
$sql_produit_result2 = mysqli_query($link,$sql_produit);
$cout_produits = 0;

$cout_produits_ht = 0;
if (mysqli_fetch_row($sql_produit_result))
{
  while($val_sql_produit = mysqli_fetch_array($sql_produit_result2))
  {
    $cout_produits += ($val_sql_produit["quantite"] * $val_sql_produit["prix_unitaire"]);
    $cout_produits_ht += ($val_sql_produit["quantite"] * ht_livre($val_sql_produit["prix_unitaire"],$val_sql_produit["tva"]));
    $mode_frais = $val_sql_produit["mode"];
    $id_livraison = $val_sql_produit['id_livraison'];
    $id_commande = $val_sql_produit['id_commande'];
  }
  $prix = "prix" . $num_prix;

  $poid_cmd = poid_commande($id_commande);
  $frais_port = frais_port($poid_cmd, $id_livraison);
  
  foreach ($frais_port as $element => $mode)
  {
    if ($frais_port[$element]['mode'] == $mode_frais)
      $montant_frais =  $frais_port[$element]['prix'];
  }
  $frais_port = $montant_frais;
  $montant = $cout_produits;  
}

//--------------------------------------------------------


$query = "UPDATE commande
          set statut = '3',
   	      `mode_paiement` = 'carte',
          `date_validation` = '" . date("Y-m-d H:i:s") . "',
          `prix_total_ht` = '" . $cout_produits_ht . "',
          `prix_total_ttc` = '" . $montant . "',
          `prix_port` = '" . $frais_port . "'
          WHERE code = '" . $_GET["reference"] . "'
          ;";
mysqli_query($link,$query);



list($id_membre,$id_user)= split ("/", $_GET["texte-libre"], 2);
$code_cmd = code_cmd();
$sql_newcommande = "INSERT INTO commande(id_commande, id_utilisateur,date_creation,statut, code)
                   VALUES('',
                          '" . $id_user . "',
                          '" . date("Y-m-d H:i:s") . "',
                          '0',
                          '".$code_cmd."'
                         )  
;";
mysqli_query($link,$sql_newcommande);



$temps_total_livraison = temps_total_livraison($id_commande);

require 'lang/' . $_SESSION['applicationlang'] . '/paiement_ok.lang.php';
require 'inc/class.phpmailer.php';
$sql_mail = "SELECT email
             FROM membre
             WHERE id_membre = '" . $id_membre . "'
             ;";
$sql_mail_result = mysqli_query($link,$sql_mail);
$val_mail = mysqli_fetch_array($sql_mail_result);

$to = $val_mail["email"];

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

//Mail à l'admin pour lui indiquer la nouvelle commande
$subjectadmin = "Commande référencée " . $_GET["reference"] . " à traiter";
$messageadmin = "Bonjour,\n\nLa commande, réferencée " . $_GET["reference"]
. ", vient d'être validée le " . date("d/m/Y") . " à "
. date("H:m") . ". Vous pouvez la traiter dans la partie "
. "administration du site.\r\n\r\n"
. "Contenu de la commande :\r\n"
. "-------------------\r\n"
. $contenu_cmd . "\r\n"
. "Rendez vous sur  "
. "$urlsite/admin/index2.php?page=viewcommande\n\n"
. "A bientôt";

$messageadmin .= $ps;
$headersadmin = "From: site@dicoland.com\n";

/*
$mail = new PHPMailer();
$mail->From     = "service-client@dicoland.com";
$mail->FromName = "Dicoland.com";
$mail->Priority = 3;
$mail->Subject  = $subject;
$mail->Body    = $message;
$mail->AddAddress($to);
$mail->Send();
*/
//mail($mailadmin,$subjectadmin,$messageadmin,$headersadmin);


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
@printf (CMCIC_PHP2_RECEIPT, $CMCIC_authVars['accuseReception']);

// Copyright (c) 2003 Euro-Information ( mailto:centrecom@e-i.com )
// All rights reserved. ---
?>
