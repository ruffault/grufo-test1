<?php

	$subject = 'Está registrado';

	$message = "Hola " . utf8_decode($_SESSION["prenom"]) . " " . utf8_decode($_SESSION["nom"]) . ",\r\n\r\n" .
	"y bienvenido a Dicoland.com. Nos complace contarle " . 
	"entre nuestros nuevos miembros. Ya está inscrito en Dicoland.com.\n\n".
	"Aquí debajo encontrará un recordatorio de sus identificadores:\n".
	"Seudónimo: " . utf8_decode($_SESSION["login"]) . "\n" .
	"Contraseña: " . utf8_decode($_SESSION["password"]) . "\n\n" .
	"Guárdelos en un lugar seguro." . $mailcoordonnee;

?>