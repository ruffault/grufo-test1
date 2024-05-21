<?php

	$subject = 'Sei ora registrato';

	$message = "Buongiorno " . utf8_decode($_SESSION["prenom"]) . " " . utf8_decode($_SESSION["nom"]) . ",\r\n\r\n" .
	"e benvenuto su Dicoland.com. Siamo molto felici di averti " .
	"tra i nostri nuovi membri. Sei ora registrato su Dicoland.com.\n\n" .
	"Ecco un promemoria dei tuoi dati identificativi:\n" .
	"Username: " . utf8_decode($_SESSION["login"]) . "\n" .
	"Password: " . utf8_decode($_SESSION["password"]) . "\n\n" .
	"Conservali con cura." . $mailcoordonnee;

?>