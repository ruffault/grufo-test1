<?php

$subject2 = "Commande refus�e";
$message2 = "Ch�re Madame, cher Monsieur,\n\n" .
	           "Nous sommes au regret de vous annoncer que votre commande, r�f�renc�e " . $code_cmd . ", a " .
						 "�t� refus�e par nos services. Nous ne pouvons donner suite � " .
						 "celle-ci et vous informons qu'elle ne sera pas honor�e pour les " .
             "raisons suivantes :\r\n\r\n" . $motif . "\r\n\r\n" .
						 "N'h�sitez pas � nous contacter si vous d�sirez de plus amples " .
						 "informations.\n\n" .
						 "Toute l'�quipe vous remercie pour la confiance " .
						 "que vous avez accord�e � dicoland et vous souhaite une " .
						 "agr�able journ�e.";

$subject3 = "Paiement bien re�u";
$message3 = "Ch�re cliente, cher client,\r\n\r\n" .
						"Nous vous confirmons que nous avons bien re�u votre paiement " .
						"pour la commande r�f�renc�e " . $code_cmd . ". " .
						"Veillez � v�rifier que l�adresse de livraison que vous avez demand�e est celle qui figure sur la bo�te aux lettres (professionnelle ou personnelle) faute de quoi la Poste nous renvoie votre colis. ".
						"Vous recevrez un mail de Dicoland qui vous indiquera les d�lais ".
						"d'exp�dition de votre commande.\n\n" .
						"Souvenez-vous, vous pouvez toujours suivre l'avancement du " .
						"traitement de votre commande sur " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"N'h�sitez pas � nous contacter si vous d�sirez de plus amples " .
						"informations.\n\n" .
						"Toute l'�quipe vous remercie pour la confiance " .
						"que vous accordez � Dicoland et vous souhaite une " .
						"agr�able journ�e\n\n" .
						"A bient�t !";

$subject4 = "Commande accept�e";
$message4 = "Ch�re cliente, cher client,\n\n" .
	         	"Nous avons le plaisir de vous annoncer que votre " .
						"commande, r�f�renc�e " . $code_cmd . ", a �t� accept�e. " .
						"Veillez � v�rifier que l�adresse de livraison que vous avez demand�e est celle qui figure sur la bo�te aux lettres (professionnelle ou personnelle) faute de quoi la Poste nous renvoie votre colis. ".
						"Vous serez averti lorsque nous proc�derons au traitement de " .
						"celle-ci.\n\n" .
						"Souvenez-vous, vous pouvez toujours suivre l'avancement du " .
						"traitement de votre commande sur " .
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"N'h�sitez pas � nous contacter si vous d�sirez de plus amples " .
						"informations.\n\n" .
						"Toute l'�quipe vous remercie pour la confiance " .
						"que vous accordez � Dicoland et vous souhaite une " .
						"agr�able journ�e\n\n" .
						"A bient�t !";

$subject5 = "Commande en cours de traitement";
$message5 = "Ch�re cliente, cher client,\n\n" .
						"Votre commande, r�f�renc�e " . $code_cmd . ", est maintenant " .
						"trait�e par l'un de nos op�rateurs.". 
						"Veillez � v�rifier que l�adresse de livraison que vous avez demand�e est celle qui figure sur la bo�te aux lettres (professionnelle ou personnelle) faute de quoi la Poste nous renvoie votre colis. ".
						"Vous serez averti lorsque " .
						"nous proc�derons � l'exp�dition de celle-ci. " .
						"Il y a lieu de pr�voir un d�lai de $delailivr jours pour que " .
						"celle-ci vous parvienne.\n\n".
						"Souvenez-vous, vous pouvez toujours suivre l'avancement du " .
						"traitement de votre commande sur ".
						"http://www.dicoland.com/index.php?page=oldcommande\n\n" .
						"N'h�sitez pas � nous contacter si vous d�sirez de plus amples " .
						"informations.\n\n" .
						"Toute l'�quipe vous remercie pour la confiance " .
						"que vous accordez � Dicoland et vous souhaite une " .
						"agr�able journ�e\n\n" .
						"A bient�t !";

$subject6 = "Commande expedi�e";
$message6 = "Ch�re cliente, cher client,\n\n" .
	           "Votre commande, r�f�renc�e " . $code_cmd . ", vient d'�tre " .
						 "expedi�e par nos services. Vous allez recevoir vos articles " .
						 "dans les prochains jours.\n\nN'h�sitez pas � nous contacter si vous " .
						 "d�sirez de plus amples informations.\n\n" .
						 "Toute l'�quipe vous remercie pour la confiance " .
						 "que vous avez accord�e � Dicoland et vous souhaite une " .
						 "agr�able journ�e\n\n" .
						 "A tr�s bient�t sur http://www.dicoland.com";

?>