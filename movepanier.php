<?php
session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';
require 'inc/class.phpmailer.php';
//on bascule l'ancien panier sur son nouveau compte
$sql_movepanier = "UPDATE `panier`
                   SET `id_commande` = '" . $_SESSION["id_commande"] . "'
                   WHERE `id_commande` = '" . $_SESSION["old_commande"] . "'
                  ;";
mysqli_query($link,$sql_movepanier);

$sql_movedecote = "UPDATE commande
               SET commande.id_utilisateur = '" . $_SESSION["id_user"] . "'
               WHERE commande.id_utilisateur = '" . $_SESSION["olddecote"] . "'
               AND (commande.statut = '9' OR commande.statut = '0')
              ;";

$_SESSION['olddecote'] = '';
mysqli_query($link,$sql_movedecote);

//on envoie un mail confirmant l'inscription
$to = $_SESSION["email"];
require 'lang/' . $_SESSION['applicationlang'] . '/movepanier.lang.php';

	$mail = new PHPMailer();
	$mail->From     = "service-client@dicoland.com";
	$mail->FromName = "Dicoland.com";
	$mail->Priority = 3;
	$mail->Subject  = $subject;
	$mail->Body    = $message;
	$mail->AddAddress($to);

if (!isset($_GET['alreadymember']))
{
	$mail->Send();
}

$_SESSION['old_commande'] = '';
$_SESSION['email'] = '';
$_SESSION['login'] = '';
$_SESSION['password'] = '';
$_SESSION['nom'] = '';
$_SESSION['prenom'] = '';

if (isset($_GET['alreadymember']))
{
	$redirection = "Location: verifmembre.php";
	header($redirection);
}
elseif (isset($_GET["newaccount"]) && $_GET["newaccount"] == 1)
{
  header('Location: index.php?page=inscriptionok');
}
else
{
  //on l'envoie sur la page permettant de choisir l'adresse de livraison
  header('Location: index.php?page=formlivraison');
}
?>
