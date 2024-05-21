<?php

$subject2 = "Commande refusée";
$message2 = "Chère Madame, cher Monsieur,\n\n" .
	           "Nous sommes au regret de vous annoncer que votre commande, référencée " . $code_cmd . ", a " .
						 "été refusée par nos services. Nous ne pouvons donner suite à " .
						 "celle-ci et vous informons qu'elle ne sera pas honorée pour les " .
             "raisons suivantes :\r\n\r\n" . $motif . "\r\n\r\n" .
						 "N'hésitez pas à nous contacter si vous désirez de plus amples " .
						 "informations.\n\n" .
						 "Toute l'équipe vous remercie pour la confiance " .
						 "que vous avez accordée à dicoland et vous souhaite une " .
						 "agréable journée.";

$subject3 = "Paiement bien reçu";
$message3 = "Chère cliente, cher client,\r\n\r\n" .
						"Nous vous confirmons que nous avons bien reçu votre paiement " .
						"pour la commande référencée " . $code_cmd . ". " .
						"Veillez à vérifier que l’adresse de livraison que vous avez demandée est celle qui figure sur la boîte aux lettres (professionnelle ou personnelle) faute de quoi la Poste nous renvoie votre colis. ".
						"Vous recevrez un mail de Dicoland qui vous indiquera les délais ".
						"d'expédition de votre commande.\n\n" .
						"Souvenez-vous, vous pouvez toujours suivre l'avancement du " .
						"traitement de votre commande sur " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"N'hésitez pas à nous contacter si vous désirez de plus amples " .
						"informations.\n\n" .
						"Toute l'équipe vous remercie pour la confiance " .
						"que vous accordez à Dicoland et vous souhaite une " .
						"agréable journée\n\n" .
						"A bientôt !";

$subject4 = "Commande acceptée";
$message4 = "Chère cliente, cher client,\n\n" .
	         	"Nous avons le plaisir de vous annoncer que votre " .
						"commande, référencée " . $code_cmd . ", a été acceptée. " .
						"Veillez à vérifier que l’adresse de livraison que vous avez demandée est celle qui figure sur la boîte aux lettres (professionnelle ou personnelle) faute de quoi la Poste nous renvoie votre colis. ".
						"Vous serez averti lorsque nous procéderons au traitement de " .
						"celle-ci.\n\n" .
						"Souvenez-vous, vous pouvez toujours suivre l'avancement du " .
						"traitement de votre commande sur " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"N'hésitez pas à nous contacter si vous désirez de plus amples " .
						"informations.\n\n" .
						"Toute l'équipe vous remercie pour la confiance " .
						"que vous accordez à Dicoland et vous souhaite une " .
						"agréable journée\n\n" .
						"A bientôt !";

$subject5 = "Commande en cours de traitement";
$message5 = "Chère cliente, cher client,\n\n" .
						"Votre commande, référencée " . $code_cmd . ", est maintenant " .
						"traitée par l'un de nos opérateurs.". 
						"Veillez à vérifier que l’adresse de livraison que vous avez demandée est celle qui figure sur la boîte aux lettres (professionnelle ou personnelle) faute de quoi la Poste nous renvoie votre colis. ".
						"Vous serez averti lorsque " .
						"nous procéderons à l'expédition de celle-ci. " .
						"Il y a lieu de prévoir un délai de $delailivr jours pour que " .
						"celle-ci vous parvienne.\n\n".
						"Souvenez-vous, vous pouvez toujours suivre l'avancement du " .
						"traitement de votre commande sur ".
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"N'hésitez pas à nous contacter si vous désirez de plus amples " .
						"informations.\n\n" .
						"Toute l'équipe vous remercie pour la confiance " .
						"que vous accordez à Dicoland et vous souhaite une " .
						"agréable journée\n\n" .
						"A bientôt !";

$subject6 = "Commande expediée";
$message6 = "Chère cliente, cher client,\n\n" .
	           "Votre commande, référencée " . $code_cmd . ", vient d'être " .
						 "expediée par nos services. Vous allez recevoir vos articles " .
						 "dans les prochains jours.\n\nN'hésitez pas à nous contacter si vous " .
						 "désirez de plus amples informations.\n\n" .
						 "Toute l'équipe vous remercie pour la confiance " .
						 "que vous avez accordée à Dicoland et vous souhaite une " .
						 "agréable journée\n\n" .
						 "A très bientôt sur http://www.dicoland.com";

?>