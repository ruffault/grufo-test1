<?php

	$subject = 'Est� registrado';

	$message = "Hola " . utf8_decode($_SESSION["prenom"]) . " " . utf8_decode($_SESSION["nom"]) . ",\r\n\r\n" .
	"y bienvenido a Dicoland.com. Nos complace contarle " . 
	"entre nuestros nuevos miembros. Ya est� inscrito en Dicoland.com.\n\n".
	"Aqu� debajo encontrar� un recordatorio de sus identificadores:\n".
	"Seud�nimo: " . utf8_decode($_SESSION["login"]) . "\n" .
	"Contrase�a: " . utf8_decode($_SESSION["password"]) . "\n\n" .
	"Gu�rdelos en un lugar seguro." . $mailcoordonnee;

?>