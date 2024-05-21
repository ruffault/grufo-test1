<?php

function relance_from_day($day)
{
	$sql = "SELECT commande.id_commande as id,
								 commande.code,
								 lower(membre.email) as email,
								 membre.aplan as aplan
					from commande, utilisateur, membre
					where (commande.mode_paiement = 'vire' or commande.mode_paiement = 'cheque')
					AND commande.statut = 1
					AND commande.relance = 0
					AND commande.id_utilisateur = utilisateur.id_utilisateur
					AND utilisateur.id_membre = membre.id_membre
					AND commande.date_validation < DATE_ADD(NOW(), INTERVAL -$day DAY)
					;";
	$res = mysql_query($sql);
	$i = 0;
	while ($val = mysql_fetch_assoc($res))
	{
		$tab[$i]['id'] = $val['id'];
		$tab[$i]['code'] = $val['code'];
		$tab[$i]['email'] = $val['email'];
		$tab[$i]['aplan'] = $val['aplan'];
		$i++;
	}
	return $tab;
}

function enable_relance($id)
{
	$sql = "UPDATE `commande`
					SET `relance` = '1'
					WHERE `id_commande` = '$id'
					LIMIT 1;";
	mysql_query($sql);
}

function send_relance($email, $code, $aplan)
{
	global $urlsite;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/plain; charset=\"iso-8859-1\"\r\n";
	$headers .= "From: Dicoland.com <service-client@dicoland.com>\r\n";

	$to = $email;
	include "lang/$aplan/config.lang.php";
	include "lang/$aplan/relance.lang.php";
	$message = $message . $mailcoordonnee;
	
	//mail('willy.morin@at-lci.com', $subject, $message, $headers);
	mail($to, $subject, $message, $headers);
}

$tab = relance_from_day(5);

if (isset($tab))
{
	foreach($tab as $key => $value)
	{
		send_relance($tab[$key]['email'], $tab[$key]['code'], $tab[$key]['aplan']);
		enable_relance($tab[$key]['id']);
	}
}

?>