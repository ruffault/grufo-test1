<?php

$subject2 = "Bestellung abgelehnt";
$message2 = "Sehr geehrte Damen und Herren,\n\n" .
	           "wir m�ssen Ihnen leider mitteilen, dass Ihre Bestellung Nr. " . $code_cmd . " abgelehnt" .
						 "wurde. Wir k�nnen Ihre Bestellung aus folgenden Gr�nden nicht bearbeiten: " .
             "\r\n\r\n" . $motif . "\r\n\r\n" .
						 "Auf Anfrage erteilen wir Ihnen gern n�here Auskunft. \n\n" .
						 "Das Dicoland.com-Team bedankt sich f�r Ihr Vertrauen und w�nscht " .
						 "Ihnen einen angenehmen Tag";

$subject3 = "Zahlung erhalten";
$message3 = "Liebe Kundin, lieber Kunden,\r\n\r\n" .
						"Wir best�tigen hiermit den Erhalt Ihrer Zahlung f�r die " .
						"Bestellung Nr." . $code_cmd . ". " .
						"Damit ist Ihre Bestellung freigegeben. ".
						"Dicoland benachrichtigt Sie per E-Mail �ber die " .
						"Lieferfrist Ihrer Bestellung.\n\n" .
						"Sie wissen ja schon, dass Sie den Bearbeitungsstand Ihrer Bestellung " .
						"jederzeit unter " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\nverfolgen k�nnen. ".
						"Auf Anfrage erteilen wir Ihnen gern n�here Auskunft\n\n" .
						"Das Dicoland.com-Team bedankt sich f�r Ihr Vertrauen und w�nschte " .
						"Ihnen einen angenehmen Tag.\n\n" .
						"Bis bald!";

$subject4 = "Bestellung angenommen";
$message4 = "Liebe Kundin, lieber Kunde,\n\n" .
	         	"Wir freuen uns, Ihnen mitteilen zu k�nnen, dass Ihre Bestellung " .
						"Nr." . $code_cmd . ", angenommen wurde" .
						"�ber die weitere Bearbeitung Ihrer Bestellung werden Sie von uns " .
						"benachrichtigt\n\n" .
						"Sie wissen ja schon, dass Sie den Berabteitungsstand Ihrer Bestellung " .
						"jederzeit unter " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n". 
            "verfolgen k�nnen.".
						"Auf Anfrage erteilen wir Ihnen gern weitere Auskunft.\n\n" .
						"Das Dicoland.com-Team bedankt sich f�r Ihr Vertrauen und " .
						"w�nscht Ihnen einen angenehmen Tag.\n\n" .
						"Bis bald!";

$subject5 = "Bestellung in Bearbeitung";
$message5 = "Liebe Kundin, lieber Kunde,\n\n" .
						"Ihre Bestellung Nr. " . $code_cmd . " wird " .
						"derzeit bei uns bearbeitet. Sie erhalten eine Nachricht von uns, " .
						"sobald Ihre Bestellung bei uns abgeschickt wird. " .
						"Durchschnittlich ist mit einer Lieferfrist von $delailivr " .
						"Tagen zu rechnen.\n\n" .						
						"Sie wissen ja schon, dass Sie den Bearbeitungsstand Ihrer Bestellung " .
						"jederzeit unter ".
						"http://www.dicoland.com/index.php?page=oldcommande\n\n". 
            "verfolgen k�nnen. ".
						"Auf Anfrage erteilen wir Ihnen gern weitere Auskunft.\n\n".
						"Das Dicoland.com-Team bedankt sich f�r Ihr Vertrauen und " .
						"w�nscht Ihnen einen angenehmen Tag.\n\n" .
						"Bis bald!";

$subject6 = "Bestellung abgeschickt";
$message6 = "Liebe Kundin, lieber Kunde,\n\n" .
	           "Wir haben Ihre Bestellung Nr." . $code_cmd . " soeben abgeschickt" .
						 "Sie werden Ihre Lieferung in den " .
						 "kommenden Tagen erhalten.\n\nAuf Anfrage erteilen wir Ihnen gern ".
             "n�here Auskunft.\n\n" .
						 "Das Dicoland.com-Team bedankt sich f�r Ihr Vertrauen und ".
						 "w�nscht Ihnen einen angenehmen Tagn\n" .
						 "Bis bald bei http://www.dicoland.com";

?>