<?php
session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';
require 'inc/class.phpmailer.php';

if($_POST["lastemail"])
{
  $searchmail = "SELECT login
                 FROM membre
                 WHERE email = '" . $_POST["lastemail"] . "'
                ;";
  $searchmail_result = mysql_query($searchmail);
  if(mysql_num_rows($searchmail_result))
  {
    $val_login = mysql_fetch_array($searchmail_result);
    $login = $val_login["login"];
		$newpass = mdp();
    $query = "UPDATE membre
              SET password = '" . md5(utf8_encode($newpass)) . "'
              WHERE email = '" . $_POST["lastemail"] . "'
              LIMIT 1
             ;";
    mysql_query($query);

    $to = $_POST["lastemail"];
		require 'lang/' . $_SESSION['applicationlang'] . '/sendpass.lang.php';
    //$message .= $ps;


	$mail = new PHPMailer();
	$mail->From     = "service-client@dicoland.com";
	$mail->FromName = "Dicoland.com";
	$mail->Priority = 3;
	$mail->Subject  = $subject;
	$message.= $mailcoordonnee;
	$mail->Body    = $message;
	$mail->AddAddress($to);
	$mail->Send();

/*
    $message .= $mailcoordonnee;

		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/plain; charset=\"iso-8859-1\"\r\n";
		$headers .= "From: " . $mailwebmaster;
    mail($to, $subject, $message, $headers);
*/
  }
  $redirection =  "Location: index.php?page=lastpass&statut=ok";
  header($redirection);
}

?>
