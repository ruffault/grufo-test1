<?php
if(stripos($_SERVER['HTTP_USER_AGENT'],'bot') === false){
require 'inc/header.inc.php';

$promo_today = date("YmdHis");
$promo_begin = '20041201000000';
$promo_end = '20041231235959';

if($promo_today >= $promo_begin && $promo_today <= $promo_end)
	$smarty->assign("showpub", 1);

switch ($_GET['page']) {
  case "myaccount":
    break;
  case "showpanier":
    require 'inc/showpanier.inc.php';
    require 'inc/showfuture.inc.php';
    break;
  case "auteurs":
    break;
  case "contact":
    break;
  case "advancedsearch":
    require 'inc/formsearch.inc.php';
    break;
  case "catalogue":
    require 'inc/catalogue.inc.php';
    break;
  case "showresult":
    require 'inc/showresult.inc.php';
    break;
  case "showproduct":
    require 'inc/showproduct.inc.php';
    require 'inc/readcomment.inc.php';
		include 'inc/buysame.inc.php';
		include 'inc/sameauteur.inc.php';
		include 'inc/samecateg2.inc.php';
    break;
	case "addcomment":
    require 'inc/addcomment.inc.php';
    break;
	case "oldcommande":
    require 'inc/oldcommande.inc.php';
    break;
  case "formlivraison":
    require 'inc/formlivraison.inc.php';
    break;
  case "livraisonprecise":
    require 'inc/livraisonprecise.inc.php';
    break;
  case "formfacturation":
    require 'inc/formfacturation.inc.php';
    break;
  case "facturationprecise":
    require 'inc/livraisonprecise.inc.php';
    break;
  case "formfraisport":
    require 'inc/formfraisport.inc.php';
    break;
  case "formmodepaiement":
    require 'inc/formmodepaiement.inc.php';
    break;
  case "paiementcarte":
    require 'inc/paiementcarte.inc.php';
    break;
  case "paiementcheque":
    require 'inc/paiementcheque.inc.php';
    break;
  case "paiementvirement":
    require 'inc/paiementvirement.inc.php';
    break;
  case "modifpref":
    require 'inc/modifpref.inc.php';
    break;
  case "detailcommande":
    require 'inc/detailcommande.inc.php';
    break;
  case "catediteur":
    require 'inc/catalogue-editeur.inc.php';
    require 'inc/catalogue-editeur-menu.inc.php';
    break;
  case "forminscription":
    require 'inc/forminscription.inc.php';
    break;
  default:
    require 'inc/messages.inc.php';
    require 'inc/vitrine.inc.php';
    break;
  case "occasion":
    require 'inc/occasion.php';
    require 'inc/occasion-menu.inc.php';
    break;
}
require 'inc/minipanier.inc.php';
require 'inc/monthproduct.inc.php';
require 'inc/carrousel.inc.php';
require 'inc/footer.inc.php';
echo "test3";

require 'inc/end.inc.php';
}
?>
