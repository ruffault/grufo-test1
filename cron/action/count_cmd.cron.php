<?php

function nb_commande()
{
	$sql = 'SELECT membre.id_membre, count(id_commande) as total
					FROM membre, utilisateur, commande
					WHERE membre.id_membre = utilisateur.id_membre
					AND utilisateur.id_utilisateur = commande.id_utilisateur
					AND commande.statut = 6
					group by id_membre;';
	$res = mysql_query($sql);
	while ($val = mysql_fetch_assoc($res))
	{
		$sql = "UPDATE membre
						SET totalcmd = '" . $val['total'] . "'
						WHERE `id_membre` = '" . $val['id_membre'] . "'
						LIMIT 1 ;";
		mysql_query($sql);
	}
}

nb_commande();

?>
