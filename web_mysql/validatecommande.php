<?php
session_start();
session_name("dicoland");
require 'inc/class.phpmailer.php';
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

$sql_recup = "SELECT produit.nom_$applicationlang as nom, sum(quantite) as quantite
             FROM produit, panier
             WHERE produit.id_produit = panier.id_produit
             AND panier.id_commande = '".$_SESSION["id_commande"]."'
             GROUP BY produit.nom_$applicationlang
             ORDER BY produit.nom_$applicationlang
             ;";

$sql_recup_result = mysql_query($sql_recup);
while($val_recup = mysql_fetch_array($sql_recup_result))
{
  if ($val_recup["quantite"] > 1)
    $contenu_cmd .= "* " . $val_recup["nom"] . " (" . $val_recup["quantite"] . " exemplaires)\r\n";
  else
    $contenu_cmd .= "* " . $val_recup["nom"] . " (" . $val_recup["quantite"] . " exemplaire)\r\n";
}


//--------------------------------------------------------------
$sql_produit = "SELECT
                  produit.reference,
                  produit.nom_$applicationlang as nom,
                  categorie.nom_$applicationlang as categorie,
                  panier.prix_unitaire,
                  SUM(panier.quantite) as quantite,
                  livraison.civilite as client_civilite,
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
                 AND commande.id_commande = '" . $_SESSION["id_commande"] . "'
                 AND produit.id_categorie = categorie.id_categorie
                 AND livraison.id_livraison = commande.id_livraison
                 AND frais_port.id_frais_port = livraison.id_frais_port
                 AND produit.id_type = type.id_type
                 GROUP BY produit.id_produit;";
$sql_produit_result = mysql_query($sql_produit);
$sql_produit_result2 = mysql_query($sql_produit);
$cout_produits = 0;
if (mysql_fetch_row($sql_produit_result))
{
  while($val_sql_produit = mysql_fetch_array($sql_produit_result2))
  {
    $cout_produits += ($val_sql_produit["quantite"] * $val_sql_produit["prix_unitaire"]);
    $cout_produits_ht += ($val_sql_produit["quantite"] * ht_livre($val_sql_produit["prix_unitaire"],$val_sql_produit["tva"]));

    $prix1 = $val_sql_produit["prix1"];
    $prix2 = $val_sql_produit["prix2"];
    $prix3 = $val_sql_produit["prix3"];
    $prix4 = $val_sql_produit["prix4"];
    $prix5 = $val_sql_produit["prix5"];
    $mode_frais = $val_sql_produit["mode"];
  }

  $poid_cmd = poid_commande($_SESSION['id_commande']);
  $frais_port = frais_port($poid_cmd, $_SESSION["id_livraison"]);

  foreach ($frais_port as $element => $mode)
  {
    if ($frais_port[$element]['mode'] == $mode_frais)
      $montant_frais =  $frais_port[$element]['prix'];
  }
  $frais_port = $montant_frais;
  $montant = $cout_produits;
}

//--------------------------------------------------------
$temps_total_livraison = temps_total_livraison($_SESSION['id_commande']);

$sql_validatecommande = "UPDATE `commande`
                         SET `statut`='1',
                         `date_validation`='".date("Y-m-d H:i:s")."',
                         `prix_total_ht` = '" . $cout_produits_ht . "',
                         `prix_total_ttc` = '" . $montant . "',
                         `prix_port` = '" . $frais_port . "'
                         WHERE `id_commande`='".$_SESSION["id_commande"]."'
                         LIMIT 1
                        ;";
mysql_query($sql_validatecommande);
$oldcommande = $_SESSION["code_cmd"];

$code_cmd = code_cmd();

//on crÈe une nouvelle commande non validÈe
$sql_newcommande = "INSERT INTO commande(id_commande,
                                         id_utilisateur,
                                         date_creation,
                                         statut,
                                         code)
                   VALUES('',
                          '" . $_SESSION["id_user"] . "',
                          '" . date("Y-m-d H:i:s") . "',
                          '0',
                          '" . $code_cmd . "'
                          );";
mysql_query($sql_newcommande);

//et on rÈcupÈre son id
$id_commande = mysql_insert_id();
$_SESSION["id_commande"] = $id_commande;


//Mail disant que la commande est prise en compte
require 'lang/' . $_SESSION['applicationlang'] . '/validatecommande.lang.php';
$to = $_SESSION["email"];
$message .= $mailcoordonnee;
	$mail = new PHPMailer();
	$mail->From     = "service-client@dicoland.com";
	$mail->FromName = "Dicoland.com";
	$mail->Priority = 3;
	$mail->Subject  = $subject;
	$mail->Body    = $message;
	$mail->AddAddress($to);
	$mail->Send();

//Mail de l'admin pour lui indiquer la nouvelle commande
$subjectadmin = "Commande rÈfÈrence " . $oldcommande . " ‡ traiter";
$messageadmin = "Bonjour,\n\nLa commande rÈfÈrencÈ " . $oldcommande
. " viens d'Ítre validÈe le " . date("Y/m/d") . " ‡ "
. date("H:m:s") . ". Vous pouvez la traiter dans la partie "
. "administration du site.\r\n\r\n"
. "Contenu de la commande :\r\n"
. "------------------------\r\n"
. $contenu_cmd . "\r\n"
. "Rendez vous sur  "
. "$urlsite/admin/index2.php?page=viewcommande\n\n"
. "A bientÙt";
$messageadmin .= $ps;

$mailtoadmin = new PHPMailer();
$mailtoadmin->From     = "site@dicoland.com";
$mailtoadmin->FromName = "Dicoland.com";
$mailtoadmin->Priority = 3;
$mailtoadmin->Subject  = $subjectadmin;
$mailtoadmin->Body    = $messageadmin;
$mailtoadmin->AddAddress($mailadmin);
$mailtoadmin->Send();

$redirection =  "Location: index.php?page=paiementcheque&statut=ok"
. "&commande=$oldcommande";

header($redirection);
?>
