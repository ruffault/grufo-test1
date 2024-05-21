<?php

function del_cmd($id_commande)
{
	$sql = "DELETE FROM commande where `id_commande` = '$id_commande' LIMIT 1";
	mysql_query($sql);
}

function del_user($id_user)
{
	$sql = "DELETE FROM utilisateur where id_utilisateur = '$id_user' LIMIT 1";
	mysql_query($sql);
}

function del_panier($id_panier)
{
	$sql = "DELETE FROM panier where `id_panier` = '$id_panier' LIMIT 1";
	mysql_query($sql);
}

function del_old_log()
{
	$datelimit = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d") - 2, date("Y")));
	$datelimit .= ' 00:00:00';
	$sql = "DELETE FROM `log` where `date` < '$datelimit'";
	mysql_query($sql);
}

$last2week = mktime(0, 0, 0, date("m"), date("d")-15, date("Y"));
$datelimit = date("Y-m-d h:i:s", $last2week);

$sql = "SELECT commande.id_commande, utilisateur.id_utilisateur
				FROM  `commande`, utilisateur
				WHERE utilisateur.id_membre = 0
				AND utilisateur.id_utilisateur = commande.id_utilisateur
				AND commande.statut =  '0'
				AND commande.archive =  '0'
				AND commande.motif_refus IS NULL
				AND commande.date_validation =  '0000-00-00 00:00:00'
				AND commande.date_creation < '$datelimit'
				";

$res = mysql_query($sql);
while($val = mysql_fetch_assoc($res))
{
	del_cmd($val['id_commande']);
	del_user($val['id_utilisateur']);
}
mysql_free_result($res);

$sql = 'SELECT panier.id_panier
				FROM panier
					LEFT  JOIN commande ON (panier.id_commande = commande.id_commande) 
				WHERE commande.id_commande IS NULL;';
$res = mysql_query($sql);
while($val = mysql_fetch_assoc($res))
{
	del_panier($val['id_panier']);
}
mysql_free_result($res);

$sql = 'SELECT commande.id_commande
				FROM commande
				LEFT JOIN panier
				ON (commande.id_commande = panier.id_commande) 
				WHERE panier.id_commande IS NULL;';

$res = mysql_query($sql);
while($val = mysql_fetch_assoc($res))
{
	del_cmd($val['id_commande']);
}
mysql_free_result($res);

$sql = "SELECT commande.id_commande
				FROM commande
				WHERE commande.date_creation < '$datelimit'
				AND (commande.statut is NULL or commande.statut = '');";
$res = mysql_query($sql);
while($val = mysql_fetch_assoc($res))
{
	del_cmd($val['id_commande']);
}
mysql_free_result($res);


$sql = 'SELECT panier.id_panier
				FROM panier
					LEFT  JOIN commande ON (panier.id_commande = commande.id_commande) 
				WHERE commande.id_commande IS  NULL;';
$res = mysql_query($sql);
while($val = mysql_fetch_assoc($res))
{
	del_panier($val['id_panier']);
}
mysql_free_result($res);

$sql = 'SELECT utilisateur.id_utilisateur
				FROM `utilisateur`
				LEFT JOIN commande
					ON (utilisateur.id_utilisateur = commande.id_utilisateur)
				WHERE commande.id_utilisateur IS NULL;';
$res = mysql_query($sql);
while($val = mysql_fetch_assoc($res))
{
	del_user($val['id_utilisateur']);
}
mysql_free_result($res);

del_old_log();

?>
