<?php

	$subject = "Recommended: Book at Dicoland";
  $message = "Hello,\n\n"
  ."While on the website, "
  .$_POST["yourname"]." asked us to tell you about "
  ."a book that might interest you.\n\n"
  ."To discover it, merely go to \r\n"
  ."http://www.dicoland.com/article-".$_GET["id"]."-1-1-1-ouvrage.html\r\n\r\n"
  ."N.B. You can contact " . $_POST["yourname"] . " simply by responding to this mail.";

?>
