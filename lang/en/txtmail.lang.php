<?php

$subject2 = "Order refused";
$message2 = "Dear Sir, Madame,\n\n" .
	           "We are sorry to announce that your order, reference " . $code_cmd . ", has " .
						 "been refused by our services. We cannot continue with this " .
						 "order and inform you that it will not be honoured for the " .
             "following reasons:\r\n\r\n" . $motif . "\r\n\r\n" .
						 "Please feel free to contact us for further " .
						 "information.\n\n" .
						 "The entire team would like to thank you for the " .
						 "trust you have shown in Dicoland and wish you a " .
						 "pleasant day";

$subject3 = "Payment received";
$message3 = "Dear Sir, Madame,\r\n\r\n" .
						"We confirm that we have received your payment " .
						"for order reference " . $code_cmd .
						". Your order is now validated. ".
						"You will receive an e-mail from Dicoland specifying the " .
						"leadtime for your order.\n\n".
						"Please remember, you can always follow the progress of the " .
						"order processing on " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"Please feel free to contact us for further " .
						"information.\n\n" .
						"The entire team would like to thank you for the " .
						"trust you have shown in Dicoland and wish you a " .
						"pleasant day\n\n" .
						"We hope to see you again soon!";

$subject4 = "Order accepted";
$message4 = "Dear Sir, Madame,\n\n" .
	         	"We are pleased to announce that your order, " .
						"reference " . $code_cmd . ", has been accepted. " .
						"You will be notified when we process this " .
						"order.\n\n" .
						"Please remember, you can always follow the progress of the " .
						"order processing on " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"Please feel free to contact us for further " .
						"information.\n\n" .
						"The entire team would like to thank you for the " .
						"trust you have shown in Dicoland and wish you a " .
						"pleasant day\n\n" .
						"We hope to see you again soon!";

$subject5 = "Order being processed";
$message5 = "Dear Sir, Madame,\n\n" .
						"Your order, reference " . $code_cmd . ", is now being " .
						"processed by one of our operators. You will be notified when " .
						"we dispatch this order. " .
						"You should allow for $delailivr days before your order reaches you\n\n." . 
						"Please remember, you can always follow the progress of the " .
						"order processing on ".
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"Please feel free to contact us for further " .
						"information.\n\n" .
						"The entire team would like to thank you for the " .
						"trust you have shown in Dicoland and wish you a " .
						"pleasant dayn\n" .
						"We hope to see you again soon!";

$subject6 = "Order dispatched";
$message6 = "Dear Sir, Madame,\n\n" .
	           "Your order, reference " . $code_cmd . ", has just been " .
						 "dispatched by our services. You will receive your items " .
						 "in the next few days.\n\nPlease feel free to " .
						 "contact us for further information.\n\n" .
						 "The entire team would like to thank you for the " .
						 "trust you have shown in Dicoland and wish you a " .
						 "pleasant dayn\n" .
						 "We hope to see you again very soon at http://www.dicoland.com";

?>