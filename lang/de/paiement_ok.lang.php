<?php

$subject = "Ihr Bestellung ist registriert";
$message = "Liebe Kundin, lieber Kunde,\r\n\r\nwir haben Ihre auf Dicoland.com 
            aufgegebene Bestellung Nr. " .$_GET["reference"] . 
            " vom " .  date("d/m/Y") . " " . date("H:m") . " registriert.\r\n\r\n" .
           "Ihre Bestellung in Kurzform\r\n-------------------------\r\n" .
           $contenu_cmd . "\r\n" .
					 "Bestellung wird derzeit bearbeitet. " .
           "Sie wissen ja schon, dass Sie den Bearbeitungsstand " .
					 "Ihrer Bestellung jederzeit unter " .
					 "http://www.dicoland.com/index.php?page=oldcommande\n\n" .
           "verfolgen können. ".
					 "Bei nicht vorrätigen Titeln werden Sie über den " .
					 "Terminverzug benachrichtigt. " .
					 "Auf Wunsch erteilen wir Ihnen gerne nähere Auskunft. ".
           "Sie werden über jeden Einzelschritt der Bearbeitung Ihrer Bestellung 
           von uns per E-Mail benachrichtigt. " . 
           "Das Dicoland.com-Team bedankt sich für Ihr Vertrauen und wünscht 
           Ihnen einen angenehmen Tag." .
           "Bis bald."
					
?>
