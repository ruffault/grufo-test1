<?php

$subject = "Votre commande a bien été enregistrée";
$message = "Chère cliente, cher client,\r\n\r\n"
. "Nous confirmons la bonne réception de votre commande, référencée "
. $oldcommande . ", sur le site Dicoland.com le " . date("d/m/Y") . " à "
. date("H:m") . ".\r\n\r\n"
. "Contenu de votre commande :\r\n"
. "---------------------------\r\n"
. $contenu_cmd . "\r\n"
. "Cette commande sera mise en préparation dès récéption de votre paiement.\r\n"
. "Veillez à bien mentionner, comme l’adresse de livraison, celle qui figure sur votre boîte aux lettres (adresse professionnelle ou personnelle) sous peine que la Poste nous renvoie votre colis.\r\n\r\n"
. "Vous pouvez suivre l'évolution de votre commande directement sur "
. "Dicoland.com. Munissez vous de votre pseudo et de votre mot de passe. "
. "Rendez-vous sur votre espace client !\r\n\r\n"
. $urlsite . "index.php?page=myaccount\r\n\r\n"
. "Votre commande est maintenant en attente de paiement. Vous recevrez "
. "un email à chaque étape du traitement de votre commande.\r\n\r\n"
. "Toute l'équipe de Dicoland.com vous remercie de votre confiance.\r\n\r\n" 
. "A bientôt.\r\n\r\n";

?>