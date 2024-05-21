<?php
/*
Auteur : Willy Morin
Description : passe la commande validee au statut "en cours de traitement"
Date creation : 06/01/2004
Date modification : 15/04/2004
*/
include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");
include ("../inc/config.inc.php");

$delailivr = $_POST['delai'];

//on recupere le code commande qui correspond a id_commande
$sql_code = "SELECT code
             FROM commande
             where id_commande = '" . $_POST["id_commande"] . "'
             ;";
$sql_code_result = mysqli_query($link,$sql_code);
$val_code = mysqli_fetch_array($sql_code_result);
$code_cmd = $val_code["code"];

$sql_lang = "SELECT membre.aplan
						 FROM membre, utilisateur, commande
						 WHERE commande.id_commande = '" . $_POST["id_commande"] . "'
						 AND commande.id_utilisateur = utilisateur.id_utilisateur
						 AND utilisateur.id_membre = membre.id_membre;";
$res = mysqli_query($link,$sql_lang);
$applicationlang = mysqli_fetch_array($res);

$motif = utf8_encode($_POST["motif"]);

require '../lang/' . $applicationlang['aplan'] . '/txtmail.lang.php';
require 'include/class.phpmailer.php';
if($_POST["statut"] == "2")
{
//  $motif = $_POST["motif"];
  $statut = "2";
  $subject = $subject2;
  $message = $message2;
	$motif = addslashes($motif);
	$sql_motif = "UPDATE commande
                SET motif_refus = '$motif'
                WHERE id_commande = '" . $_POST["id_commande"] . "'
                LIMIT 1;";
  mysqli_query($link,$sql_motif);
}

if($_POST["choix"] == "3")
{
  $statut = "3";
  $subject = $subject3;
  $message = $message3;
}

if($_POST["choix"] == "4")
{
  $statut = "3";
  /*
  $statut = "4";
  $subject = $subject4;
  $message = $message4;
	*/
}

if($_POST['choix'] == "5" && isset($_POST['delai']) && is_numeric($_POST['delai']) && $_POST['delai'] != '')
{
  $statut = "5";
  $subject = $subject5;
	$message = $message5;
}
elseif($_POST["choix"] == "5")
{
	$redirection =  "Location: index2.php?page=order&id_order=" . $_POST["id_commande"] . "&nodelai=1";
	header($redirection);
	die();
}
if($_POST["choix"] == "6")
{
  $statut = "6";
  $subject = $subject6;
  $message = $message6;
}

//on recupere l'email du client correspondant … la commande.
$query = "SELECT membre.email
          FROM membre, utilisateur, commande
          WHERE commande.id_commande = '" . $_POST["id_commande"] . "'
          AND utilisateur.id_utilisateur = commande.id_utilisateur
          AND membre.id_membre = utilisateur.id_membre
         ;";  
$result = mysqli_query($link,$query); 
$val = mysqli_fetch_array($result);

//On envoie un mail au client pour lui indiquer le statut de sa commande.
$to = $val["email"];

//$message .= $ps;
$message .= $mailcoordonnee;

if($_POST["choix"] != "4")
{
	$mail = new PHPMailer();
	$mail->From     = "service-client@dicoland.com";
	$mail->FromName = "Dicoland.com";
	$mail->Priority = 3;
	$mail->Subject  = $subject;
	$mail->Body    = $message;
	$mail->AddAddress($to);
	$mail->Send();
}

//on modifie le statut
if ($statut == 6)
{
	$query = "UPDATE commande
						set statut = '$statut',
								date_envoie = '" . date("Y-m-d") . "'
						WHERE id_commande = '" . $_POST["id_commande"] . "'
						;";
}
else
{
	$query = "UPDATE commande
						set statut = '$statut'
						WHERE id_commande = '" . $_POST["id_commande"] . "'
						;";
}
mysqli_query($link,$query);

//on redirige
$redirection =  "Location: index2.php?page=order&id_order=" . $_POST["id_commande"];
header($redirection);
?>
