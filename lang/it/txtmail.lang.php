<?php

$subject2 = "Ordine rifiutato";
$message2 = "Gentile cliente,\n\n" .
	           "Siamo spiacenti di annunciare che il tuo ordine, numero " . $code_cmd . ", è " .
						 "stato rifiutato dal nostro servizio. Ci è impossibile evadere " .
						 "tale ordine, per i " .
             "seguenti motivi:\r\n\r\n" . $motif . "\r\n\r\n" .
						 "Non esitare a contattarci se desideri avere maggiori " .
						 "informazioni.\n\n" .
						 "Tutto lo staff ti ringrazia per la fiducia  " .
						 "che hai accordato a Dicoland e ti augura una " .
						 "piacevole giornata.";

$subject3 = "Pagamento ricevuto";
$message3 = "Gentile cliente,\r\n\r\n" .
						"Confermiamo l'avvenuta ricezione del pagamento " .
						"del tuo ordine numero " . $code_cmd . ". " .
						"Il tuo ordine è ora confermato. ".
						"Riceverete un messaggio e-mail da Dicoland che vi " .
						"indicherà i tempi di spedizione del vostro ordine.\n\n" .
						"Ricorda che puoi seguire passo dopo passo lo stato di " .
						"avanzamento del tuo ordine su " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"Non esitare a contattarci se desideri avere maggiori " .
						"informazioni.\n\n" .
						"Tutto lo staff ti ringrazia per la fiducia " .
						"che hai accordato a Dicoland e ti augura una " .
						"piacevole giornata\n\n" .
						"Arrivederci a presto!";

$subject4 = "Ordine accettato";
$message4 = "Gentile cliente,\n\n" .
	         	"Siamo lieti di annunciare che il tuo " .
						"ordine, numero " . $code_cmd . ", è stato accettato. " .
						"Sarai avvertito quando procederemo all'esecuzione " .
						"dell'ordine.\n\n" .
						"Ricorda che puoi seguire passo dopo passo lo stato di " .
						"avanzamento del tuo ordine su " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"Non esitare a contattarci se desideri avere maggiori " .
						"informazioni.\n\n" .
						"Tutto lo staff ti ringrazia per la fiducia " .
						"che hai accordato a Dicoland e ti augura una " .
						"piacevole giornata\n\n" .
						"Arrivederci a presto!";

$subject5 = "Ordine in corso di evasione";
$message5 = "Gentile cliente,\n\n" .
						"Il tuo ordine, numero " . $code_cmd . ", sarà ora evaso " .
						"da uno dei nostri operatori. Sarai avvertito quando " .
						"procederemo alla spedizione. " .
						"Lo riceverete entro $delailivr giorni circa.\n\n" .
						"Ricorda che puoi seguire passo dopo passo lo stato di " .
						"avanzamento del tuo ordine su ".
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"Non esitare a contattarci se desideri avere maggiori " .
						"informazioni.\n\n" .
						"Tutto lo staff ti ringrazia per la fiducia " .
						"che hai accordato a Dicoland e ti augura una " .
						"piacevole giornata\n\n" .
						"Arrivederci a presto!";

$subject6 = "Ordine spedito";
$message6 = "Gentile cliente,\n\n" .
	           "Il tuo ordine, numero " . $code_cmd . ", è stato " .
						 "spedito dal nostro servizio. Riceverai i tuoi articoli " .
						 "nei prossimi giorni.\n\nNon esitare a contattarci se  " .
						 "desideri avere maggiori informazioni.\n\n" .
						 "Tutto lo staff ti ringrazia per la fiducia " .
						 "che hai accordato a Dicoland e ti augura una " .
						 "piacevole giornata\n\n" .
						 "Arrivederci a presto su http://www.dicoland.com";

?>