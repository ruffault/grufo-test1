<?php

	$subject = "Lesenswert: Buch bei Dicoland";
  $message = "Guten Tag,\n\n"
  ."Bei seinem/ihrem Besuch auf unserer Website hat "
  .$_POST["yourname"]." uns gebeten, Sie �ber ein Buch, das f�r Sie von Interesse
  ist, zu informieren \n\n"
  ."Sie k�nnen sich das betreffende Buch bei \r\n"
  ."http://www.dicoland.com/article-".$_GET["id"]."-1-1-1-ouvrage.html\r\n\r\n ansehen."
  ."P.S.: Sie k�nnen " . $_POST["yourname"] . " ganz einfach per E-Mail ansprechen.";

?>