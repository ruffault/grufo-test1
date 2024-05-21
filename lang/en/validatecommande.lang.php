<?php

$subject = "You order has been recorded successfully";
$message = "Dear Sir, Madame,\r\n\r\n"
. "We confirm that your order, reference "
. $oldcommande . ", was correctly recorded on the Dicoland.com website on " . date("d/m/Y") . " at "
. date("H:m") . ".\r\n\r\n"
. "Contents of your order:\r\n"
. "---------------------------\r\n"
. $contenu_cmd . "\r\n"
. "We will start preparing the order as soon as your payment is received. "
. "You can monitor the progress of your order in real time on "
. "Dicoland.com. Enter your alias and password. "
. "Go to the customer area!\r\n\r\n"
. $urlsite . "index.php?page=myaccount\r\n\r\n"
. "Your order is now awaiting payment. You will receive "
. "an e-mail at each stage in the processing of your order.\r\n\r\n"
. "The entire Dicoland.com team wishes to thank you for your trust in us.\r\n\r\n" 
. "We hope to see you again soon.\r\n\r\n";

?>
