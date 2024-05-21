<?php
session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';
require 'inc/class.phpmailer.php';
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

?>
