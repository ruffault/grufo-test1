<?php

$subject = "Il tuo ordine è stato registrato con successo";
$message = "Cara cliente, caro cliente,\r\n\r\n"
. "Confermiamo la ricezione del tuo ordine, numero "
. $oldcommande . ", attraverso il sito Dicoland.com il " . date("Y/m/d") . " alle ore "
. date("h:i") . ".\r\n\r\n"
. "Contenuto del tuo ordine:\r\n"
. "---------------------------\r\n"
. $contenu_cmd . "\r\n"
. "Questo ordine sarà evaso alla ricezione del vostro pagamento. "
. "Potrai seguire lo stato di avanzamento del tuo ordine direttamente su "
. "Dicoland.com. E' sufficiente usare il tuo username e la tua password. "
. "Entra nel tuo spazio cliente!\r\n\r\n"
. $urlsite . "index.php?page=myaccount\r\n\r\n"
. "Il tuo ordine è ora in attesa di pagamento. Riceverai "
. "un messaggio e-mail per ogni fase del trattamento del tuo ordine.\r\n\r\n"
. "Tutto lo staff di Dicoland.com ti ringrazia per la fiducia che ci hai accordato.\r\n\r\n" 
. "Arrivederci a presto.\r\n\r\n";

?>
