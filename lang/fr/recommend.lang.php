<?php

	$subject = "A voir : Livre sur Dicoland";
  $message = "Bonjour,\n\n"
  ."Lors de son passage sur le site, "
  .$_POST["yourname"]." nous a demand� de vous informer "
  ."de l'existence d'un ouvrage susceptible de vous int�resser.\n\n"
  ."Pour le lire, il suffit de vous rendre sur \r\n"
  ."http://www.dicoland.com/article-".$_GET["id"]."-1-1-1-ouvrage.html\r\n\r\n"
  ."NB : Vous pouvez contacter " . $_POST["yourname"] . " en r�pondant simplement � ce mail.";

?>