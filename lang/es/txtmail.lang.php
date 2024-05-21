<?php

$subject2 = "Pedido rechazado?";
$message2 = "Estimado cliente,\n\n" .
	           "Lamentamos tenerle que comunicar que su pedido, no ha sido " . $code_cmd .
						 " aceptado por nuestros servicios. No podemos tratar su " .
						 "pedido por las razones siguientes:\r\n\r\n" . $motif . "\r\n\r\n" .
						 "No dude en ponerse en contacto con nosotros si desea obtener m�s informaci�n.\n\n" .
						 "El equipo de Dicoland le agradece su confianza " .
						 "y le desea un buen d�a.";

$subject3 = "Pago bien recibido";
$message3 = "Estimado cliente,\r\n\r\n" .
						"Le confirmamos la recepci�n del pago " .
						"para el pedido que hab�a realizado " . $code_cmd . ". " .
						"Su pedido es v�lido ".
						"Recibir� un e-mail de Dicoland donde se indicar� el " .
						"plazo de expedici�n de su pedido.\n\n" .
						"Recuerde que, en todo momento, puede consultar el estado " .
						"de su pedido en " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"No dude en ponerse en contacto con nosotros si desea obtener m�s informaci�n. \n\n" .
						"El equipo de Dicoland le agradece su confianza" .
						"y le desea un buen d�a.\n\n" .
						"�Esperamos volver a verle pronto!";

$subject4 = "Pedido aceptado";
$message4 = "Estimado cliente,\n\n" .
	         	"Le comunicamos que su pedido " .
						"con referencia " . $code_cmd . ", ha sido aceptado" .
						"Le mantendremos informado a partir del momento que su pedido" .
						"empiece a tratarse\n\n" .
						"Recuerde que, en todo momento, puede consultar el estado de su pedido en " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"No dude en ponerse en contacto con nosotros si desea obtener m�s informaci�n. \n\n" .
						"El equipo de Dicoland le agradece su confianza " .
						"y le desea un buen d�a.\n\n" .
						"�Esperamos volver a verle pronto!";

$subject5 = "Tratamiento de pedido en curso";
$message5 = "Estimado cliente,\n\n" .
						"Su pedido, con referencia " . $code_cmd . ", est� siendo " .
						"tratado por uno de nuestros operadores. Le informaremos " .
						"del momento del env�o de su pedido. Debe prever un plazo " .
						"de $delailivr d�as antes de recibir el pedido.\n\n" .
						"Recuerde que, en todo momento, puede consultar el estado " .
						"de su pedido en " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
				    "No dude en ponerse en contacto con nosotros si desea obtener m�s informaci�n.\n\n" .
						"El equipo de Dicoland le agradece su confianza " .
						"y le desea un buen d�a.\n\n" .
						"�Esperamos volver a verle pronto!";

$subject6 = "Pedido enviado";
$message6 = "Estimado cliente,\n\n" .
	           "Su pedido, con referencia " . $code_cmd . ", ha sido enviado " .
						 "por nuestros servicios. Recibir� sus art�culos " .
						 "en los pr�ximos d�as.\n\nNo dude en ponerse en contacto con nosotros " .
						 "si desea obtener m�s informaci�n.\n\n" .
						 "El equipo de Dicoland le agradece su confianza " .
						 "y le desea un buen d�a.\n\n" .
						 "Hasta pronto en http://www.dicoland.com";

?>
