<?php

	$subject = 'Sie sind jetzt angemeldet';

	$message = "Guten Tag " . utf8_decode($_SESSION["prenom"]) . " " . utf8_decode($_SESSION["nom"]) . ",\r\n\r\n" .
	"und herzlich willkommen bei Dicoland.com. Wir freuen uns, Sie zu unseren neuen" .
  "Mitgliedern z�hlen zu d�rfen. Sie sind jetzt bei Dicoland.com angemeldet.\n\n" .
  "Zur Erinnerung hier noch einmal Ihre pers�nlichen Daten:\n" .
	"Pseudonym: " . utf8_decode($_SESSION["login"]) . "\n" .
	"Passwort: " . utf8_decode($_SESSION["password"]) . "\n\n" .
	"Heben Sie diese Daten bitte sorgf�ltig auf." . $mailcoordonnee;

?>
