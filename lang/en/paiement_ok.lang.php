<?php

$subject = "Your order was correctly registered";
$message = "Dear customer,\r\n\r\nYour order, reference " . $_GET["reference"] . ", was ".
           " successfully recorded by the Dicoland.com website on " . date("d/m/Y") . " at "
           . date("H:m") . "\r\n\r\n" .
           "Summary of your order\r\n-------------------------\r\n" .
           $contenu_cmd . "\r\n" .
					 "Your order is being prepared. " .
           "Remember, at any moment you can follow up the progress " .
					 "of your order on " .
					 "http://www.dicoland.com/index.php?page=oldcommande\n\n" .
					 "A message will inform you of the supply time if the book is unavailable. " .
					 "Please feel free to contact us if you require any further " .
					 "information.\n\nYou will receive " .
           "an e-mail at each stage in the processing of your order.\n\n" .
					 "The entire team would like to thank you for the trust you " .
					 "have shown in Dicoland and wish you a pleasant " .
					 "day.\n\n\n" .
					 "We hope to see you again soon!";

?>
