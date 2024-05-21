<?php

mb_internal_encoding('UTF-8');

$sql_users = "SELECT *
              FROM membre
              WHERE id_membre = '" . $_GET["id_membre"] . "'
              LIMIT 1
							;";
$res = mysql_query($sql_users);
$val = mysql_fetch_array($res);

echo '<div>';
echo '<div id="col1"><h4>';

if ($val["civilite"] == 1)
	echo "<img src='css/user.png' alt='Utilisateur' />";
else
	echo "<img src='css/user_women.gif' alt='Utilisateur' />";

echo '<img src="css/flag_' . $val['aplan'] . '.gif" title="Parle ' . convert_lang($val_livraison['aplan']) . '" alt="" /> ';
echo utf8_decode($val['login']) . '</h4>';

echo "<p class='coord' id='name'>";
if ($val['civilite'] == 1)
  echo "M. ";
elseif ($val['civilite'] == 2)
  echo "Mme ";
else
  echo "Mlle ";

echo utf8_decode($val['prenom']) . ' ' . utf8_decode($val['nom']) . '<br />';

echo '</p>';
if ($val['nomsociete'])
{
	echo '<p class="coord" id="company">';
  echo 'Société ' . utf8_decode($val['nomsociete']);
  if ($val['intracommu'])
    echo "<br />(N° TVA : " . $val['intracommu'] . ")";
	echo '</p>';
}
echo "<p class='coord' id='address'>";
echo utf8_decode($val['adresse1']) . "<br />";
if ($val['adresse2'])
  echo utf8_decode($val['adresse2']) . "<br />";
if ($val['adresse3'])
  echo utf8_decode($val['adresse3']) . "<br />";
echo $val['cp'] . ' ' . utf8_decode($val['ville']) . "<br />";
echo abrev2lang($val['pays']) . ' ' . utf8_decode($val['etat']) . "";

echo '</p>';
echo '<p class="coord" id="phone">';
echo 'Tél : (' . $val['indicatif_tel'] . ') '. $val['tel'] . '<br />';
if ($val['fax'])
  echo 'Fax : (' . $val['indicatif_fax'] . ') ' . $val['fax'] . '<br />';
echo '</p>';

echo '<p class="coord" id="mailingDis">';
echo '  <a href="mailto:' . $val['email'] . '">' . $val['email'] . '</a><br />';
echo '</p>';


echo "<p class='coord' id='inscr'>Inscrit le " . endate2fr($val['inscr_date']) . "</p>";

echo '<h3>Commentaire</h3>';
echo '<form class="coord" action="chgcomment.php" method="get">';
echo '<textarea name="comment">' . htmlentities($val['comment']) . '</textarea>';
echo '<input type="hidden" value="' . $_GET["id_membre"] . '" name="id_membre" />';
echo '<input type="submit" value="enregistrer" name="save" />';
echo '</form>';

echo '<h3>Actions</h3>';
echo '<ul id="action">';
echo '<li><a href="mailto:' . $val['email'] . '">';
echo '<img src="css/enveloppe.gif" alt="" />';
echo 'Ecrire à cet utilisateur</a></li>';

if ($val['mailinglist'] == 1)
{
  echo '<li><a href="inscmail.php?email='
		. htmlentities($val['email']) . '&amp;type=remove">';
	echo '<img src="css/mailing-off.png" alt="" />';
	echo 'Désinscrire de la mailing list</a></li>';
}
else
{
  echo '<li><a href="inscmail.php?&email='
		. htmlentities($val['email']) . '&type=add">';
	echo '<img src="css/mailing.png" alt="" />';
  echo 'Inscrire à la mailing list</a></li>';
}

if ($val['enable'] == 1)
{
  echo '<li><a href="disableuser.php?&amp;id_user='
		. $val['id_membre'] . '&amp;type=remove">';
	echo '<img src="css/off.png" alt="" />';
	echo 'Désactiver le compte</a></li>';
}
else
{
  echo '<li><a href="disableuser.php?&id_user='
		. $val['id_membre'] . '&amp;type=add">';
	echo '<img src="css/on.png" alt="" />';
	echo 'Activer le compte</a></li>';
}

echo '</ul>';
echo '</div>';

echo '<div id="col2">';


$sql = 'SELECT SUM(ca) as ca,
							 SUM(nbcommande) as nbcommande 
			  FROM statclient
				WHERE id_client = "' .  $_GET['id_membre'] . '"
				GROUP by id_client;';

$res = mysql_query($sql);
$i = 0;
while ($val = mysql_fetch_array($res))
{
	echo '<h3>Statistiques</h3>';
	echo '<ul>';
	echo '<li>';
	echo 'Commande Moyenne : ' . round($val['ca'] / $val['nbcommande']) . '&euro;';
	echo '</li>';
	echo '<li>';
	echo 'Nombre de commandes: ' . $val['nbcommande'];
	echo '</li>';
	echo '<li>';
	echo 'Dépense totale: ' . $val['ca'] . '&euro;';
	echo '</li>';
	echo '</ul>';
}

$sql_showpanier = "SELECT produit.nom_fr as nom, panier.id_produit,
										SUM(quantite) as quantite, produit.realname,
										produit.reference, produit.prix_unitaire, produit.tva,
										produit.rabais, produit.disponible,
										produit.delai_reapprovisionnement
									 FROM panier, utilisateur, produit, type, commande
									 WHERE utilisateur.id_membre = '" . $_GET["id_membre"] . "'
									 AND utilisateur.id_utilisateur = commande.id_utilisateur
									 AND commande.statut = 0
									 AND commande.id_commande = panier.id_commande
									 AND panier.id_produit = produit.id_produit
									 AND produit.id_type = type.id_type
									 GROUP BY panier.id_produit
									 ;";
$sql_showpanier_result = mysql_query($sql_showpanier);
mysql_query($sql_showpanier);

// Recuperation des id des ouvrages dans un tableau
if ($sql_showpanier_result)
{
  if (mysql_num_rows($sql_showpanier_result) > 0)
  {
	  $i=0;
    while ($val = mysql_fetch_array($sql_showpanier_result))
    {
    	$panier[$i] = array(
					"id_produit" => $val['id_produit'],
          "nom" => $val['nom'],
          "reference" => $val['reference'],
          "quantite" => $val['quantite'],
          "tva" => $val['tva'],
          "rabais" => $val['rabais'],
          "prix" => ($val['prix_unitaire'] * $val['quantite']),
          "prix_ht" => ht_livre(($val['prix_unitaire'] * $val['quantite']),$val['tva']),
          "prix_unitaire" => $val['prix_unitaire'],
          "prix_unitaire_ht" => ht_livre($val['prix_unitaire'],$val['tva']),
          "delai_reapprovisionnement" => $val['delai_reapprovisionnement'],
          "disponible" => $val['disponible'],
          "type" => $val['type']
					);
			$quantite_totale += $val["quantite"];

			$tva_totale += (($val['prix_unitaire'] - ht_livre($val['prix_unitaire'],$val['tva'])) * $val['quantite']); 
			$tva_totale_rabais += rabais((($val['prix_unitaire'] - ht_livre($val['prix_unitaire'],$val['tva'])) * $val['quantite']),$val['rabais']); 

			$prix_ht_total += ht_livre(($val['prix_unitaire'] * $val['quantite']),$val['tva']); 
			$prix_ht_total_rabais += ht_livre((rabais($val['prix_unitaire'],$val["rabais"]) * $val['quantite']),$val['tva']); 

			$prix_total += ($val['prix_unitaire'] * $val['quantite']); 
			$prix_total_rabais += (rabais($val['prix_unitaire'],$val["rabais"]) * $val['quantite']); 

			//si le produit est indisponible...
      if(!isset($val["disponible"]) or ($val["disponible"] == '0') or ($val["disponible"] == ''))
      {
     		//delai maximum pour avoir les produits de la commande
				if ($delai_max < $val["delai_reapprovisionnement"])
				{
      		$delai_max = $val["delai_reapprovisionnement"];
				}
      }
			$i++;
		}

		echo '<h3>Panier en cours</h3>';		
		echo '<table id="users">';
		echo '<tr>';
		echo '<th>Nom</th>';
		echo '<th>Prix HT</th>';
		echo '<th>Qté</th>';
		echo '<th>Total</th>';
		echo '</tr>';
		foreach ($panier as $key => $value)
		{
			echo '<tr>';
			echo '<td><a href="">' . $panier[$key]['nom'] . '</a></td>';
			echo '<td>' . $panier[$key]['prix_unitaire_ht'] . '</td>';
			echo '<td>' . $panier[$key]['quantite'] . '</td>';
			echo '<td>' . $panier[$key]['prix_ht'] . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
}

$sql_archive = "SELECT panier.id_panier,
                   commande.prix_total_ttc,
                   commande.prix_total_ht,
                   commande.code,
                   commande.archive,
                   commande.id_commande,
                   commande.date_validation,
                   commande.id_livraison,
                   commande.id_utilisateur,
                   commande.mode_paiement,
                   commande.statut,
                   membre.login,
                   membre.nom,
                   membre.prenom,
                   membre.email
								FROM commande, panier, utilisateur,membre
								WHERE membre.id_membre = '" . $_GET["id_membre"] . "'
								AND membre.id_membre = utilisateur.id_membre
								AND utilisateur.id_utilisateur = commande.id_utilisateur
								AND commande.statut >0
								AND commande.statut <6
								AND commande.id_commande = panier.id_commande
								GROUP BY commande.id_commande
                 ";
if ($_GET['tri'] == "ref")
  $sql_archive .= "ORDER BY code ";
elseif ($_GET['tri'] == "date")
  $sql_archive .= "ORDER BY date_validation ";

if ($_GET['invert'] == 1)
  $sql_archive .= "DESC";

$sql_archive .= ";";
$sql_archive_result = mysql_query($sql_archive);

if (mysql_num_rows($sql_archive_result) != 0)
{
	echo '<h3>Commande en traitement</h3>';
	echo '<table id="users">';
	echo '<tr>';
	echo '<th>&nbsp;</th>';
	if ($_GET['tri'] == "ref" && $_GET['invert'] == 1)
		echo '<th>Réf</th>';
	else
		echo '<th>Réf</th>';
	
	if ($_GET['tri'] == "date" && $_GET['invert'] == 1)
		echo '<th><a href="index2.php?page=detailuser&amp;tri=date&amp;id_membre=' . $val[id_membre] . '">Date</a></th>';
	else
		echo '<th><a href="index2.php?page=detailuser&amp;tri=date&amp;invert=1&amp;id_membre=' . $val[id_membre] . '">Date</a></th>';
	
	echo '<th>Heure</th>';
	echo '<th>Montant</th>';
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
	
		if ($i%2 == 0)
			echo "<tr class='selected'>";
		else
			echo '<tr>';
		switch($val_archive["statut"])
		{
			case 1:
				echo "<td><img src='css/4.gif' alt='En attente de paiement' title='En attente de paiement' /></td>";
				break;
			case 2:
				echo "<td><img src='css/1.gif' alt='refusé' title='refusé' /></td>";
				break;
			case 3:
				echo "<td><img src='css/2.gif' alt='Règlé' title='Règlé' /></td>";
				break;
			case 4:
				echo "<td><img src='css/5.gif' alt='' /></td>";
				break;
			case 5:
				echo "<td><img src='css/6.gif' alt='En traitement' title='En traitement' /></td>";
				break;
			case 6:
				echo "<td><img src='css/3.gif' alt='Expédié' title='Expédié' /></td>";
				break;
			case 8:
				echo "<td><img src='css/8.gif' alt='Masquée' title='Masquée' /></td>";
				break;
		}
		echo "<td>" . $val_archive["code"] . "</td>";
		echo "<td>$jour/$mois/$annee</td>";
		echo "<td>$heure:$minute:$seconde</td>";
		echo "<td>" . $val_archive["prix_total_ht"] . " &euro;</td>";
		echo "<td><a href='index2.php?page=order&id_order=" . $val_archive["id_commande"] . "' class='lienarchive'>Détail</a></td></tr>";

		$i++;
	}
	echo '</table>';
}

$sql_archive = "SELECT panier.id_panier,
                   commande.prix_total_ttc,
                   commande.prix_total_ht,
                   commande.code,
                   commande.archive,
                   commande.id_commande,
                   commande.date_validation,
                   commande.id_livraison,
                   commande.id_utilisateur,
                   commande.mode_paiement,
                   commande.statut,
                   membre.login,
                   membre.nom,
                   membre.prenom,
                   membre.email
                 FROM commande, panier, utilisateur,membre
                 WHERE membre.id_membre = '" . $_GET["id_membre"] . "'
								 AND membre.id_membre = utilisateur.id_membre
                 AND utilisateur.id_utilisateur = commande.id_utilisateur
								 AND commande.statut > 5
								 AND commande.id_commande = panier.id_commande
								 GROUP BY commande.id_commande
                 ";
if ($_GET['tri'] == "ref")
  $sql_archive .= "ORDER BY code ";
elseif ($_GET['tri'] == "date")
  $sql_archive .= "ORDER BY date_validation ";

if ($_GET['invert'] == 1)
  $sql_archive .= "DESC";

$sql_archive .= ";";
$sql_archive_result = mysql_query($sql_archive);

if (mysql_num_rows($sql_archive_result) != 0)
{
	echo '<h3>Commandes archivés</h3>';
	echo '<table id="users">';
	echo '<th>&nbsp;</th>';
	if ($_GET['tri'] == "ref" && $_GET['invert'] == 1)
		echo '<th>Réf</th>';
	else
		echo '<th>Réf</th>';
	
	if ($_GET['tri'] == "date" && $_GET['invert'] == 1)
		echo '<th>Date</th>';
	else
		echo '<th>Date</th>';
	
	echo '<th>Heure</th>';
	echo '<th>Montant</th>';
	echo '<th></th>';
	
	$i=0;
	while ($val_archive = mysql_fetch_array($sql_archive_result))
	{
		$heure = substr($val_archive["date_validation"],11,2);
		$minute = substr($val_archive["date_validation"],14,2);
		$seconde = substr($val_archive["date_validation"],17,2);  
		$annee = substr($val_archive["date_validation"],0,4);
		$mois = substr($val_archive["date_validation"],5,2);
		$jour = substr($val_archive["date_validation"],8,2);
	
		if ($i%2 == 0)
			echo "<tr class='selected'>";
		else
			echo '<tr>';
		switch($val_archive["statut"])
		{
			case 1:
				echo "<td><img src='css/4.gif' alt='En attente de paiement' title='En attente de paiement' /></td>";
				break;
			case 2:
				echo "<td><img src='css/1.gif' alt='refusé' title='refusé' /></td>";
				break;
			case 3:
				echo "<td><img src='css/2.gif' alt='Règlé' title='Règlé' /></td>";
				break;
			case 4:
				echo "<td><img src='css/5.gif' alt='' /></td>";
				break;
			case 5:
				echo "<td><img src='css/6.gif' alt='En traitement' title='En traitement' /></td>";
				break;
			case 6:
				echo "<td><img src='css/3.gif' alt='Expédié' title='Expédié' /></td>";
				break;
			case 8:
				echo "<td><img src='css/8.gif' alt='Masquée' title='Masquée' /></td>";
				break;
		}
		echo "<td>" . $val_archive["code"] . "</td>";
		echo "<td>$jour/$mois/$annee</td>";
		echo "<td>$heure:$minute:$seconde</td>";
		echo "<td>" . $val_archive["prix_total_ht"] . " &euro;</td>";
		echo "<td><a href='index2.php?page=order&id_order=" . $val_archive["id_commande"] . "' class='lienarchive'>Détail</a></td></tr>";
		$i++;
	}
	echo '</table>';
}
echo '</div>';
echo '<div class="spacer" />';
echo '</div>';

?>
