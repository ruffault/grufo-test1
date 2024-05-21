<?php

session_start();
session_name("dicoland");
require 'Smarty.class.php';
$smarty = new Smarty;
require 'inc/class.phpmailer.php';
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';
if(isset($_GET["id"]) && isset($_POST["yourname"]) && isset($_POST["youremail"]) && isset($_POST["friendemail"]) && $_POST["friendemail"] != '' && $_POST["youremail"] != '' &&
$_POST["yourname"] != '')
{
	$allok = 1;
	require 'lang/' . $_SESSION['applicationlang'] . '/recommend.lang.php';

	$mail = new PHPMailer();
	$mail->From     = $_POST["youremail"];
	$mail->FromName = $_POST["yourname"];
	$mail->Priority = 3;
	$mail->Subject  = $subject;
	$message.= $mailcoordonnee;
	$mail->Body    = $message;
	$mail->AddAddress($_POST["friendemail"]);
	$mail->Send();
	$_POST["friendemail"] = "";
}
else if((isset($_POST["yourname"]) && $_POST["yourname"] == '')
				or (isset($_POST["youremail"]) && $_POST["youremail"] == '')
				or (isset($_POST["friendemail"]) && $_POST["friendemail"] == ''))
{
	$notfull = 1;
}
else if(isset($_SESSION["email"]))
{
  $_POST["youremail"] = $_SESSION["email"];
}

$smarty->assign("allok", $allok);
$smarty->assign("notfull", $notfull);

if (!$applicationlang)
{
	$applicationlang = $_SESSION['applicationlang'];
}
$smarty->assign("applicationlang", $applicationlang);
$smarty->display($applicationlang . "/recommend.tpl");

?>
