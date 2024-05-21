<?php
$sql_archive = "SELECT membre.id_membre, panier.id_panier,
								commande.code, commande.archive, commande.id_commande,
								commande.date_validation, commande.id_livraison,
								commande.id_utilisateur, commande.mode_paiement,
								commande.statut, commande.motif_disable, membre.login, membre.nom,
								membre.prenom, membre.email
                FROM commande, panier, utilisateur,membre
                WHERE commande.id_commande = panier.id_commande
								AND commande.archive = '1'
								AND utilisateur.id_utilisateur = commande.id_utilisateur
								AND utilisateur.id_membre = membre.id_membre
								GROUP BY commande.id_commande
								";

if ($_GET['tri'] == "ref")
  $sql_archive .= "ORDER BY code ";
elseif ($_GET['tri'] == "date")
  $sql_archive .= "ORDER BY date_validation ";
elseif ($_GET['tri'] == "login")
  $sql_archive .= "ORDER BY login ";
elseif ($_GET['tri'] == "nom")
  $sql_archive .= "ORDER BY nom ";
elseif ($_GET['tri'] == "prenom")
  $sql_archive .= "ORDER BY prenom ";
elseif ($_GET['tri'] == "email")
  $sql_archive .= "ORDER BY email ";
else
  $sql_archive .= "ORDER BY date_validation DESC ";

if ($_GET['invert'] == 1)
  $sql_archive .= "DESC";

$sql_archive .= ";";
$sql_archive_result = mysql_query($sql_archive);

echo '<table id="archive">';
echo '<tr>';
echo '<th>&nbsp;</th>';
if ($_GET['tri'] == "ref" && $_GET['invert'] == 1)
  echo '<th><a href="index2.php?page=listarchive&tri=ref">Réf.</a></th>';
else
  echo '<th><a href="index2.php?page=listarchive&tri=ref&invert=1">Réf.</a></th>';

if ($_GET['tri'] == "date" && $_GET['invert'] == 1)
  echo '<th><a href="index2.php?page=listarchive&tri=date">Date</a></th>';
else
  echo '<th><a href="index2.php?page=listarchive&tri=date&invert=1">Date</a></th>';

echo '<th>Heure</th>';

if ($_GET['tri'] == "login" && $_GET['invert'] == 1)
  echo '<th><a href="index2.php?page=listarchive&tri=login">Login</a></th>';
else
  echo '<th><a href="index2.php?page=listarchive&tri=login&invert=1">Login</a></th>';

if ($_GET['tri'] == "prenom" && $_GET['invert'] == 1)
  echo '<th><a href="index2.php?page=listarchive&tri=prenom">Prénom</a></th>';
else
  echo '<th><a href="index2.php?page=listarchive&tri=prenom&invert=1">Prénom</a></th>';

if ($_GET['tri'] == "nom" && $_GET['invert'] == 1)
  echo '<th><a href="index2.php?page=listarchive&tri=nom">Nom</a></th>';
else
  echo '<th><a href="index2.php?page=listarchive&tri=nom&invert=1">Nom</a></th>';

echo '<th>&nbsp;</th>';
echo '</tr>';
$i=0;
while ($val_archive = mysql_fetch_array($sql_archive_result))
{
  $heure = substr($val_archive["date_validation"],11,2);
  $minute = substr($val_archive["date_validation"],14,2);
  $seconde = substr($val_archive["date_validation"],17,2);  
  $annee = substr($val_archive["date_validation"],0,4);
  $mois = substr($val_archive["date_validation"],5,2);
  $jour = substr($val_archive["date_validation"],8,2);
  if ($val_archive["statut"] == "1"){
    $statut = "En attente de paiement";
  }
  if ($val_archive["statut"] == "2"){
    $statut = "Commande refusée";
  }
  if ($val_archive["statut"] == "3"){
    $statut = " En cours d'acceptation";
  }
  if ($val_archive["statut"] == "4"){
    $statut = "Commande acceptée";
  }
  if ($val_archive["statut"] == "5"){
    $statut = "Commande en cours de traitement";
  }
  if ($val_archive["statut"] == "9"){
    $statut = "Commande annulée";
  }
  
  if ($i%2 == 0)
    echo "<tr class='selected'>";
  else
    echo '<tr>';
  echo "<td class='left'>";
	
	if ($val_archive["statut"] == '8')
	{
		echo '<img src="css/bad2.png" alt="Commande annulée" title="Commande annulée : '
			. htmlentities($val_archive['motif_disable']) . '" />';
	}
	else
		echo '<img src="css/good2.png" alt="Commande honorée" title="Commande honorée" />';

	echo '</td><td>' . $val_archive["code"] . "</td>";
  echo "<td>$jour/$mois/$annee</td>";
	echo "<td>$heure:$minute:$seconde</td>";
  echo "<td><a href='index2.php?page=detailuser&id_membre=" . $val_archive['id_membre'] . "'>" . utf8_decode($val_archive["login"]) . "</a></td>";
  echo "<td>" . utf8_decode($val_archive["prenom"]) . "</td>";
  if (strlen(utf8_decode($val_archive["nom"])) > 20)
		echo "<td>" . substr(utf8_decode($val_archive["nom"]),0,20) . "...</a></td>";
	else
		echo "<td>" . utf8_decode($val_archive["nom"]) . "</a></td>";
  echo "<td><a href='index2.php?page=order&id_order=" . $val_archive["id_commande"] . "'><img src='css/d.gif' alt='Détail' /></a></td></tr>";
  $i++;
}
echo '</table>';
?>
