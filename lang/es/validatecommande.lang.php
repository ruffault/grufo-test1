<?php

$subject = "Su pedido ha sido registrado correctamente";
$message = "Estimado cliente,\r\n\r\n"
. "Le confirmamos la recepci�n de su pedido, registrado "
. $oldcommande . ", en el sitio Dicoland.com el " . date("d/m/Y") . " "
. date("H:m") . ".\r\n\r\n"
. "Detalle de su pedido:\r\n"
. "---------------------------\r\n"
. $contenu_cmd . "\r\n"
. "Este pedido se preparar� a partir de la recepci�n de su pago. "
. "Puede consultar el estado de su pedido directamente en "
. "Dicoland.com. S�lo necesita su seud�nimo y su contrase�a. "
. "�Visite el espacio cliente!\r\n\r\n"
. $urlsite . "index.php?page=myaccount\r\n\r\n"
. "En este momento, su pedido est� en espera de pago. En cada etapa, "
. "recibir� un e-mail para informarle del estado de su pedido.\r\n\r\n"
. "El equipo de Dicoland.com le agradece su confianza.\r\n\r\n" 
. "�Esperamos volver a verle pronto!\r\n\r\n";

?>