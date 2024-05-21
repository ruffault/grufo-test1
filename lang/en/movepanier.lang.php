<?php

	$subject = 'You are now registered';

	$message = "Hello " . utf8_decode($_SESSION["prenom"]) . " " . utf8_decode($_SESSION["nom"]) .
	",\r\n\r\nand welcome to Dicoland.com. We are extremely pleased to count you ".
	"among our new members.\nYou are now registered with Dicoland.com.\n\n" .
	"Below is a reminder of your identifiers:\n" .
	"Alias: " . utf8_decode($_SESSION['login']) . "\n" .
	"Password: " . utf8_decode($_SESSION['password']) . "\n\n" .
	"Please keep them in a safe place." . $mailcoordonnee;

?>
