<?php

//erreurs
$mysql_error_connect = $mysql_error_select = '<link rel="stylesheet" href="css/style.css" />'
. '<h1><img src="css/logo.gif" alt="dicoland.com"></h1>'
. '<h2>Nous effectuons des travaux de maintenance sur le site Dicoland.com</h2>'
. "<hr />Veuillez nous excuser pour la g�ne occasionn�e.<br />"
. "<br />"
. "Si vous souhaitez nous contacter :<br />"
. "Du lundi au vendredi de 10h � 13h et de 14h � 18h et le samedi de 14h � 18h<br />"
. "T�l. : +33 (0) 1 43 22 12 93<br />"
. "T�l�copie : +33 (0) 1 43 22 01 77"
. "<p>&copy;2013 Dicoland.com</p>";
//. "- <a href='mailto:$mailwebmaster'>contact</a></p>";

//connection
@mysql_connect($host,$user,$pass)
  or die($mysql_error_connect);
@mysql_select_db($bdd)
  or die($mysql_error_select);
  ?>
