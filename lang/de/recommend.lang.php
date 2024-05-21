<?php

	$subject = "Lesenswert: Buch bei Dicoland";
  $message = "Guten Tag,\n\n"
  ."Bei seinem/ihrem Besuch auf unserer Website hat "
  .$_POST["yourname"]." uns gebeten, Sie über ein Buch, das für Sie von Interesse
  ist, zu informieren \n\n"
  ."Sie können sich das betreffende Buch bei \r\n"
  ."http://www.dicoland.com/article-".$_GET["id"]."-1-1-1-ouvrage.html\r\n\r\n ansehen."
  ."P.S.: Sie können " . $_POST["yourname"] . " ganz einfach per E-Mail ansprechen.";

?>