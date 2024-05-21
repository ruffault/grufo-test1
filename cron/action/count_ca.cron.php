<?php

function count_ca()
{
	$sql = 'SELECT utilisateur.id_membre, ROUND(SUM(prix_total_ht)) as total
					FROM utilisateur, commande
					WHERE utilisateur.id_utilisateur = commande.id_utilisateur
					AND commande.statut = 6
					GROUP BY id_membre
					;';
	$res = mysql_query($sql);
	while ($val = mysql_fetch_assoc($res))
	{
		$sql = "UPDATE membre
						SET ca_ht = '" . $val['total'] . "'
						WHERE `id_membre` = '" . $val['id_membre'] . "'
						LIMIT 1 ;";
		mysql_query($sql);
	}
}

count_ca();

?>
