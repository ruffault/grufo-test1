<?php

$subject = "Il tuo ordine � stato registrato con successo";
$message = "Gentile cliente, \r\n\r\nIl tuo ordine, numero " . $_GET["reference"] . ", � stato ".
           "registrato sul sito Dicoland.com il" . date("Y/m/d") . " alle ore "
           . date("h:i") . "\r\n\r\n" .
           "Riepilogo del tuo ordine\r\n-------------------------\r\n" .
           $contenu_cmd . "\r\n" .
					 "Questo ordine � in corso di preparazione. " .
           "Ricordati che puoi seguire in qualsiasi momento lo stato di avanzamento" .
					 "del tuo ordine su " .
					 "http://www.dicoland.com/index.php?page=oldcommande\n\n" .
					 "In caso di non disponibilit� degli articoli, un messaggio " .
					 "vi indicher� i tempi di fornitura. ".
					 "Non esitare a contattarci se desideri avere maggiori " .
					 "informazioni.\n\nRiceverai " .
           "un messaggio e-mail per ogni fase del trattamento del tuo ordine" .
					 "Tutto lo staff ti ringrazia per la fiducia " .
					 "che stai accordando a Dicoland e ti augura una " .
					 "piacevole giornata\n\n" .
					 "Arrivederci a presto!";

?>