<?php

	$subject = 'Vous �tes maintenant inscrit';
	
	$message = "Bonjour " . utf8_decode($_SESSION["prenom"]) . " " . utf8_decode($_SESSION["nom"]) . ",\r\n\r\n" .
	"et bienvenue sur Dicoland.com. Nous avons l'immense joie de vous compter " .
	"parmi nos nouveaux membres. Vous �tes maintenant inscrit sur Dicoland.com.\n\n" .
	"Voici un rappel de vos identifiants :\n" .
	"Pseudo : " . utf8_decode($_SESSION["login"]) . "\n" .
	"Mot de passe : " . utf8_decode($_SESSION["password"]) . "\n\n" .
	"Veuillez les conserver pr�cieusement." . $mailcoordonnee;
?>