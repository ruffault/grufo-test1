<?php

	$subject = "Ver: Libro en Dicoland";
  $message = "Hola,\n\n"
  ."Durante su visita del sitio, "
  .$_POST["yourname"]." nos ha pedido que le informemos"
  ."de la existencia de una obra que puede ser de su interés.\n\n"
  ."Para leerlo, sólo tiene que consultar:\r\n"
  ."http://www.dicoland.com/article-".$_GET["id"]."-1-1-1-ouvrage.html\r\n\r\n"
  ."NB : Puede contactar " . $_POST["yourname"] . " respondiendo a este e-mail.";

?>
