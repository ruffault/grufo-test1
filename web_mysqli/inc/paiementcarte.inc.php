<?php

$basket = give_basket($_SESSION["id_commande"]);

if ($basket != false)
{

	$basket_summary = basket_summary($basket);
	$poid_cmd = poid_commande($_SESSION['id_commande']);
	$frais_port = frais_port($poid_cmd, $_SESSION["id_livraison"]);

	if ($_SESSION['ht'] == 'ht')
	{
	  $soustotal = twodecimal($basket_summary['total_ht'] + $frais_port[0]['prix']);
	}
	else
	{
	  $soustotal = twodecimal($basket_summary['total_ttc'] + $frais_port[0]['prix']);
	}

  @require("CMCIC_Config.php");
  @require_once("CMCIC_Tpe.inc.php");
 
 // if ( !function_exists('CMCIC_hmac') ) { die ('cant require hmac function.'); }
  
function CreerFormulaireHmac($CMCIC_Tpe,
                                 $Amount,
                                 $Currency,
                                 $Order_Reference,
                                 $Order_Comment,
                                 $Language_Code,
                                 $Merchant_Code,
                                 $Button_Text)
  {
  
      $Return_Context = "?order_ref=".$Order_Reference;
  
      if ($Order_Comment == "") { $Order_Comment .= "-"; }
  
		$Order_Date = date("d/m/Y:H:i:s");
		$Language_2 = substr($Language_Code, 0, 2);
		$oTpe = new CMCIC_Tpe($Language_2);     		
		$oHmac = new CMCIC_Hmac($oTpe);

		// Control String for support
		$CtlHmac = sprintf(CMCIC_CTLHMAC, $oTpe->sVersion, $oTpe->sNumero, $oHmac->computeHmac(sprintf(CMCIC_CTLHMACSTR, $oTpe->sVersion, $oTpe->sNumero)));
		
		// Data to certify
		$PHP1_FIELDS = sprintf(CMCIC_CGI1_FIELDS, $oTpe->sNumero, 
												$Order_Date, 
												$Amount, 
												$Currency, 
												$Order_Reference, 
												$Order_Comment, 
												$oTpe->sVersion, 
												$oTpe->sLangue, 
												$oTpe->sCodeSociete,
												$sEmail,
												$sNbrEch,
												$sDateEcheance1,
												$sMontantEcheance1,
												$sDateEcheance2,
												$sMontantEcheance2,
												$sDateEcheance3,
												$sMontantEcheance3,
												$sDateEcheance4,
												$sMontantEcheance4,
												$sOptions);

		//var_dump($PHP1_FIELDS);
		// MAC computation
		$sMAC = $oHmac->computeHmac($PHP1_FIELDS);
	
        
      return sprintf(CMCIC_PHP1_FORM, $oTpe->sUrlPaiement,
                                      $oTpe->sVersion, 
                                      $oTpe->sNumero,
                                      $Order_Date,
                                      $Amount,
                                      $Currency,
                                      $Order_Reference,
                                      $sMAC,
                                      $oTpe->sUrlKO,
                                      $Return_Context,
                                      $oTpe->sUrlOK,
                                      $Return_Context,
                                      $oTpe->sUrlKO,
                                      $Return_Context,
                                      $oTpe->sLangue,
                                      $oTpe->sCodeSociete,
                                      HtmlEncode($Order_Comment),
                                      HtmlEncode( $Button_Text ));
  }
  
  // ----------------------------------------------------------------------------
  // Begin Main : Build payment variables from order context and format
  //              CMCIC-compliant Payment form.
  //                           ********************
  //              Cr? les variables du paiement ?artir du contexte commande
  //              et cr? le formulaire de paiement CMCIC.
  // ----------------------------------------------------------------------------
  //$CMCIC_Tpe = CMCIC_getMyTpe();               // TPE init variables
  //$CtlHmac   = CMCIC_CtlHmac($CMCIC_Tpe);      // TPE ok feedback
  
  // ----------------------------------------------------------------------------
  //  CheckOut Stub setting fictious Merchant and Order datas.
  //  That's your job to set actual order fields. Here is a stub.
  //                           ********************
  //  Valorisation arbitraire des donn? commandes pour faire tourner un
  //  exemple. Il vous appartient de donner les valeurs r?les associ? ?ne
  //  commande.
  // -----------------------------------------------------------------------------
  
  $stub_method = $_SERVER["REQUEST_METHOD"];
  if (($stub_method == "GET") or ($stub_method == "POST")) {
      $wstub_order  = "HTTP_" . $stub_method . "_VARS";
      $stub_order  = ${$wstub_order};
  }
  else
      die ('Invalid REQUEST_METHOD (not GET, not POST).');
  
  // R?rence: unique, alphaNum (A-Z a-z 0-9), longueur maxi 12 caract?s
  $stub_order['reference'] = $_SESSION["code_cmd"];
  @$Reference_12 = $stub_order['reference']."";
  $Reference_Cde = urlencode(substr($Reference_12, 0, 12));
  
  // Langue: page de paiement "FR","EN","DE","IT","ES" selon options souscrites
  @$Language_2   = $stub_order['language']."FR";   
  $Code_Langue   = urlencode(substr($Language_2 , 0, 2));
  
  // Code soci?: fourni par CM-CIC
  $Code_Societe     = CMCIC_CODESOCIETE;
  
  // Montant: format  "xxxxx.yy" (pas de blancs))
  $Montant          = $soustotal;
  
  // Devise: norme ISO 4217 
  $Devise           = "EUR";
  
  // texte libre: une r?rence longue, des contextes de session pour le retour .
  $Texte_Libre      = $_SESSION["id_membre"] . "/" . $_SESSION["id_user"];
  
	require ("lang/$cfglan/paiement.lang.php");

	// Texte du bouton pour acc?r au serveur CM-CIC
  $Texte_Bouton     = $buttontxt;

	$paiementlangue = selectlang($_SESSION['applicationlang']);
	
  $Formulaire_Paiement = CreerFormulaireHmac(CMCIC_TPE,
                                               $Montant,
                                               $Devise,
                                               $Reference_Cde,
                                               $Texte_Libre,
												$paiementlangue,
                                               $Code_Societe,
                                               $Texte_Bouton);


  // ----------------------------------------------------------------------------
  // Your Page displaying payment button to be customized  
  //                           ********************
  // Votre page ?ersonnaliser affichant le bouton
  // ----------------------------------------------------------------------------
  
  $smarty->assign("Formulaire_Paiement", $Formulaire_Paiement);
  $smarty->assign("CtlHmac", $CtlHmac);
}
else
{
  //Si le panier est vide on renvoie sur le panier
  $redirection = "Location: index.php?page=showpanier";
  header($redirection);
}
?>