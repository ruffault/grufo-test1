<?php
include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");
include ("include/function.inc.php");
require 'include/class.phpmailer.php';

if (isset($_POST['subject']) && isset($_POST['content'])
	&& isset($_POST['email']) && isset($_POST['sender'])
	&& $_POST['subject'] != '' && $_POST['content'] != '')
{
	$id_order = $_POST['id_order'];
	$subject = $_POST['subject'];
	$content = $_POST['content'];
	$recipient = $_POST['email'];
	$sender = $_POST['sender'];

	$mail = new PHPMailer();
	$mail->From     = $sender;
	$mail->FromName = "Dicoland.com";
	$mail->Priority = 3;
	$mail->Subject  = $subject;
	$mail->Body    = $content;
	$mail->AddAddress($recipient);
	$mail->Send();

	//On enregistre l'email dans la base
	add_correspondence($id_order, $sender, $recipient, $subject, $content);

	header('Location: index2.php?page=order&mail=1&id_order=' . $_POST['id_order']);
}
else
{
	echo "vous devez spécifier un sujet et un message !";
}

?>

