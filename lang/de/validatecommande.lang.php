<?php

$subject = "Ihre Bestellung wurde registriert";
$message = "Liebe Kundin, lieber Kunde,\r\n\r\n"
. "wir bestätigen Ihnen hiermit, dass wir Ihre Bestellung auf Dicoland.com Nr. "
. $oldcommande . " vom " . date("d/m/Y") . " "
. date("H:m") ." erhalten haben.\r\n\r\n"
. "Inhalt Ihrer Bestellung :\r\n"
. "---------------------------\r\n"
. $contenu_cmd . "\r\n"
. "Bei Erhalt Ihrer Zahlung wird die Bestellung für den "
. "Versand fertig gemacht. "
. "Sie können den Bearbeitungsstand Ihrer Bestellung online auf "
. "Dicoland.com verfolgen. Dazu benötigen Sie Ihr Pseudonym und Ihr Passwort. "
. "Auf Wiedersehen in der Kundenrubrik!\r\n\r\n"
. $urlsite . "index.php?page=myaccount\r\n\r\n"
. "Wir warten auf die Zahlung für Ihre Bestellung. Sie werden von uns per E-Mail"
. "über jeden einzelnen Bearbeitungsschritt informiert.\r\n\r\n"
. "Das Dicoland.com-Team bedankt sich für Ihr Vertrauen.\r\n\r\n" 
. "Bis bald.\r\n\r\n";

?>