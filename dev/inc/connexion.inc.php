<?php

//parametres de connection pour la partie dev du site de test de dicoland
$host = "localhost";	//Serveur Mysql
$user = "c1_dico";		//utilisateur
$pass = "150576dico";		//pass
$bdd = "c1_dicodb";		//Nom Bdd Mysql
$namesite = "Site_test_Dicoland.com";
$urlsite = "http://dicotest.grufo.ovh/dev/";
$mysql_error_connect = '<link rel="stylesheet" href="../css/style.css" />'
. '<h1><img src="../css/logo.gif" alt="dicoland.com"></h1>'
. '<h2>Nous effectuons des travaux de maintenance sur le site Dicoland.com</h2>'
. "<hr />Veuillez nous excuser pour la gêne occasionnée.<br />"
. "<br />"
. "Si vous souhaitez nous contacter :<br />"
. "Du lundi au vendredi de 10h à 13h et de 14h à 18h et le samedi de 14h à 18h<br />"
. "Tél. : +33 (0) 1 43 22 12 93<br />"
. "Télécopie : +33 (0) 1 43 22 01 77"
. "<p>&copy;2013 Dicoland.com</p>";
//. "- <a href='mailto:$mailwebmaster'>contact</a></p>";

//connection après conversion à l'extension  mysqli
//@mysql_connect($host,$user,$pass)
//
$link=mysqli_connect($host,$user,$pass,$bdd)or die($mysql_error_connect);
?>
