<?php

$subject = "Votre commande a bien �t� enregistr�e";
$message = "Ch�re cliente, cher client,\r\n\r\n"
. "Nous confirmons la bonne r�ception de votre commande, r�f�renc�e "
. $oldcommande . ", sur le site Dicoland.com le " . date("d/m/Y") . " � "
. date("H:m") . ".\r\n\r\n"
. "Contenu de votre commande :\r\n"
. "---------------------------\r\n"
. $contenu_cmd . "\r\n"
. "Cette commande sera mise en pr�paration d�s r�c�ption de votre paiement.\r\n"
. "Veillez � bien mentionner, comme l�adresse de livraison, celle qui figure sur votre bo�te aux lettres (adresse professionnelle ou personnelle) sous peine que la Poste nous renvoie votre colis.\r\n\r\n"
. "Vous pouvez suivre l'�volution de votre commande directement sur "
. "Dicoland.com. Munissez vous de votre pseudo et de votre mot de passe. "
. "Rendez-vous sur votre espace client !\r\n\r\n"
. $urlsite . "index.php?page=myaccount\r\n\r\n"
. "Votre commande est maintenant en attente de paiement. Vous recevrez "
. "un email � chaque �tape du traitement de votre commande.\r\n\r\n"
. "Toute l'�quipe de Dicoland.com vous remercie de votre confiance.\r\n\r\n" 
. "A bient�t.\r\n\r\n";

?>