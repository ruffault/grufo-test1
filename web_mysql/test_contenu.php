<?php

session_start();
session_name("dicoland");

require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';
require 'inc/class.phpmailer.php';

function DisplayDynamiqueContent($nom_contenu)
{
	$sql_get_contenu = "SELECT * FROM contenus_dynamiques WHERE NOM_CONTENU_DYN='".$nom_contenu."' AND ETAT_CONTENU_DYN='1'";
	$req_get_contenu = mysql_query($sql_get_contenu) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	// on fait une boucle qui va faire un tour pour chaque enregistrement
	while($data_get_contenu = mysql_fetch_assoc($req_get_contenu))
    {
    	// on affiche les informations de l'enregistrement en cours
     	echo "ID_CONTENU_DYN : ".$data_get_contenu['ID_CONTENU_DYN']."<br />";
    	echo "NOM_CONTENU_DYN : ".$data_get_contenu['NOM_CONTENU_DYN']."<br />";
    	echo "DESC_CONTENU_DYN : ".$data_get_contenu['DESC_CONTENU_DYN']."<br />";
    	echo "TITRE_CONTENU_DYN : ".$data_get_contenu['TITRE_CONTENU_DYN']."<br />";
    	echo "TXT_CONTENU_DYN : ".$data_get_contenu['TXT_CONTENU_DYN']."<br />";
    	echo "ETAT_CONTENU_DYN : ".$data_get_contenu['ETAT_CONTENU_DYN']."<br />";
    	echo "CIBLE_CONTENU_DYN : ".$data_get_contenu['CIBLE_CONTENU_DYN']."<br />";
    	echo "DATE_DEBUT_CONTENU_DYN : ".$data_get_contenu['DATE_DEBUT_CONTENU_DYN']."<br />";
    	echo "DATE_FIN_CONTENU_DYN : ".$data_get_contenu['DATE_FIN_CONTENU_DYN']."<br />";
    	echo "IMAGE_CONTENU_DYN : ".$data_get_contenu['IMAGE_CONTENU_DYN']."<br />";
    }
}

DisplayDynamiqueContent("annonce_home");
/*
if(trim($_POST["email"]) != "" && trim($_POST["message"]) != "")
{
  $to = $mailadmin;
  $subject = "Question posée sur le site";
  $message = "Un utilisateur du site vous pose une question :\r\n\r\n"
. stripslashes(utf8_decode($_POST["message"])) . "\r\n"
. "\r\n\r\nAdresse de réponse : "
. stripslashes(utf8_decode(trim($_POST["email"])));

	$mail = new PHPMailer();
	$mail->From     = stripslashes(utf8_decode(trim($_POST["email"])));
	$mail->FromName = "Dicoland.com";
	$mail->Priority = 3;
	$mail->Subject  = $subject;
	$mail->Body    = $message;
	$mail->AddAddress($to);
	$mail->Send();

  $redirection =  "Location: index.php?page=contact&statut=ok";
}
else
{
  $redirection =  "Location: index.php?page=contact&statut=fail";
}

header($redirection);
*/
?>
