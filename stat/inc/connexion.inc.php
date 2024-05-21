<?php

//erreurs
$mysql_error_connect = $mysql_error_select = '<link rel="stylesheet" href="css/style.css" />'
. '<h1><img src="css/logo.gif" alt="dicoland.com"></h1>'
. '<h2>Nous effectuons des travaux de maintenance, veuillez repasser plus tard.</h2>'
. "<hr /><p>&copy;2003-2004 Dicoland.com - <a href='mailto:$mailwebmaster'>contact</a></p>"
;

//connection
mysql_connect($host,$user,$pass)
  or die($mysql_error_connect);
@mysql_select_db($bdd)
  or die($mysql_error_select);
?>
