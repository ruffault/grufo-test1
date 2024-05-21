<?php
//on verifie que le panier n'est pas vide.
$sql_showpanier = "SELECT panier.id_produit
									FROM panier
                  WHERE panier.id_commande = '" . $_SESSION["id_commande"] . "'
                  GROUP BY panier.id_produit
                  ;";
$sql_showpanier_result = mysqli_query($link,$sql_showpanier);
if (mysqli_num_rows($sql_showpanier_result) > 0)
{
  $poid_cmd = poid_commande($_SESSION['id_commande']);
$mode_calcul = 0; // GR 30/10/20 cas standard
$_SESSION['maison']=edi_maison($_SESSION['id_commande']);
if ($_SESSION['maison'])
	$mode_calcul = 1;
  $frais_port =  all_frais_port($poid_cmd, $_SESSION["id_livraison"]);
	$unique = 1;

	if (isset($frais_port[1]))
		$unique = 0;
$frais_port_new = frais_port_new($poid_cmd,$_SESSION['pays_livraison'],$mode_calcul);
if ($_SESSION['maison'] && !$frais_port_new){
		$frais_port_new = frais_port_new($poid_cmd,$_SESSION['pays_livraison'],0); // on relance si cas specifique ne donne rien
}
//if ($_SESSION['maison']) $unique +=2; //pour gérer messages promo editeur maison mais en fait géré directement dans tpl via smarty.session 

	$smarty->assign("unique", $unique);
	$smarty->assign("frais_port", $frais_port);

//  $smarty->assign("port_eco", $port_eco);
//  $smarty->assign("port_prio", $port_prio);

}
else
{
  //Si le panier est vide on renvoie sur le panier
  $redirection = "Location: index.php?page=showpanier";
  header($redirection);
}
?>
