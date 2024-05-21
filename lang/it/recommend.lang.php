<?php

	$subject = "Da vedere: Libro su Dicoland";
  $message = "Buongiorno,\n\n"
  ."Visitando il nostro sito, "
  .$_POST["yourname"]." ci ha chiesto di informarti "
  ."dell'esistenza di un'opera che potrebbe interessarti.\n\n"
  ."Per leggerla, è sufficiente andare su \r\n"
  ."http://www.dicoland.com/article-".$_GET["id"]."-1-1-1-ouvrage.html\r\n\r\n"
  ."NB: puoi contattare " . $_POST["yourname"] . " semplicemente rispondendo a questo messaggio e-mail.";

?>