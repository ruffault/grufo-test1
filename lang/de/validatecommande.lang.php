<?php

$subject = "Ihre Bestellung wurde registriert";
$message = "Liebe Kundin, lieber Kunde,\r\n\r\n"
. "wir best�tigen Ihnen hiermit, dass wir Ihre Bestellung auf Dicoland.com Nr. "
. $oldcommande . " vom " . date("d/m/Y") . " "
. date("H:m") ." erhalten haben.\r\n\r\n"
. "Inhalt Ihrer Bestellung :\r\n"
. "---------------------------\r\n"
. $contenu_cmd . "\r\n"
. "Bei Erhalt Ihrer Zahlung wird die Bestellung f�r den "
. "Versand fertig gemacht. "
. "Sie k�nnen den Bearbeitungsstand Ihrer Bestellung online auf "
. "Dicoland.com verfolgen. Dazu ben�tigen Sie Ihr Pseudonym und Ihr Passwort. "
. "Auf Wiedersehen in der Kundenrubrik!\r\n\r\n"
. $urlsite . "index.php?page=myaccount\r\n\r\n"
. "Wir warten auf die Zahlung f�r Ihre Bestellung. Sie werden von uns per E-Mail"
. "�ber jeden einzelnen Bearbeitungsschritt informiert.\r\n\r\n"
. "Das Dicoland.com-Team bedankt sich f�r Ihr Vertrauen.\r\n\r\n" 
. "Bis bald.\r\n\r\n";

?>