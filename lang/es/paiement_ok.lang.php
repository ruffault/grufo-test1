<?php

$subject = "Su pedido ha sido registrado correctamente";
$message = "Estimado cliente,\r\n\r\nSu pedido, con referencia " . $_GET["reference"] . ", ha sido " .
           "registrado correctamente por el sitio Dicoland.com le" . date("d/m/Y") .
           . date ("H:m") . "\r\n\r\n" .
           "Detalle de su pedido\r\n-------------------------\r\n" .
           $contenu_cmd . "\r\n" .
					 "Este pedido est� en curso de preparaci�n. " .
           "Recuerde que en todo momento puede consultar " .
					 " el estado de su pedido en " .
					 "http://www.dicoland.com/index.php?page=oldcommande\n\n" .
					 "En caso de que no est� disponible, recibir� un " .
					 "mensaje con el plazo de aprovisionamiento. " .
					 "No dude en contactarnos si desea obtener m�s " .
					 "informaci�n.\n\nRecibir�" .
           "un e-mail en cada una de las etapas de procesado de su pedido. " .
					 "El equipo de Dicoland le agradece su confianza " .
					 "y le desea un buen d�a.\n\n" .
					 "�Esperamos volver a verle pronto!";

?>