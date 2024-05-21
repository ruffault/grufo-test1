<?php

//On récupére les numéros les commandes à traiter

if (isset($_GET["traite"]) && $_GET["traite"] == 1) {
  $sql_viewcommande = "SELECT id_panier, code, archive, commande.id_commande, date_validation, id_livraison, id_utilisateur, mode_paiement, commande.statut, commande.prix_total_ht, commande.mode_paiement
                       FROM commande, panier
                       WHERE commande.id_commande = panier.id_commande
                       AND commande.statut = '6'
                       AND commande.archive <> '1'
                       GROUP BY commande.id_commande
                       ORDER BY date_validation DESC
                       ;";
}
else
{
  $sql_viewcommande = "SELECT id_panier, code, commande.id_commande, date_validation, id_livraison, id_utilisateur, mode_paiement, commande.statut, commande.prix_total_ht, commande.mode_paiement
                       FROM commande, panier
                       WHERE commande.id_commande = panier.id_commande
                       AND commande.statut <> '0'
                       AND commande.statut < '6'
                       AND commande.statut <> '2'
                       GROUP BY commande.id_commande
                       ORDER BY date_validation DESC
                       ;";
}
$sql_viewcommande_result = mysql_query($sql_viewcommande);
$total_cmd = mysql_num_rows($sql_viewcommande_result);
//echo '<p class="pack">' . $total_cmd . '</p>';

echo '<table id="commande">';
echo '<tr>';
echo '<th>Réf.</th>';
echo '<th>Langue</th>';
echo '<th>Date</th>';
echo '<th>Heure</th>';
//echo '<th>Paiement</th>';
echo '<th>Nom</th>';
echo '<th>Prix HT</th>';
if (!isset($_GET["traite"]) && !$_GET["traite"] == 1)
	echo '<th colspan="2">Statut</th>';
echo '<th>Infos</th>';
echo '<th>Action</th>';
echo '</tr>';
$key = 0;
while ($val_viewcommande = mysql_fetch_array($sql_viewcommande_result))
{
  if ($key%2 == 0)
    echo "<tr class='selected'>";
  else
    echo '<tr>';
  $heure = substr($val_viewcommande["date_validation"],11,2);
  $minute = substr($val_viewcommande["date_validation"],14,2);
  $seconde = substr($val_viewcommande["date_validation"],17,2);  
  $annee = substr($val_viewcommande["date_validation"],0,4);
  $mois = substr($val_viewcommande["date_validation"],5,2);
  $jour = substr($val_viewcommande["date_validation"],8,2);
  if ($val_viewcommande["statut"] == "1"){
    $statut = "Attente du paiement";
  }
  if ($val_viewcommande["statut"] == "2"){
    $statut = "Refusée";
  }
  if ($val_viewcommande["statut"] == "3"){
    $statut = "A accepter";
  }
  if ($val_viewcommande["statut"] == "4"){
    $statut = "Acceptée";
  }
  if ($val_viewcommande["statut"] == "5"){
    $statut = "Traitement";
  }
  if ($val_viewcommande["statut"] == "9"){
    $statut = "Annulée";
  }
  
  //Récéption du nom du membre et de son email
  $sql_membre = "SELECT membre.id_membre, membre.login, membre.nom, membre.prenom, membre.email, membre.tel, membre.aplan
                 FROM membre, utilisateur, commande
                 WHERE membre.id_membre = utilisateur.id_membre
                 AND commande.id_utilisateur = utilisateur.id_utilisateur
                 AND commande.id_commande = '".$val_viewcommande["id_commande"]."'
                 ;";
  $sql_membre_result = mysql_query($sql_membre);
  $val_membre = mysql_fetch_array($sql_membre_result);

  if (isset($_GET["traite"]) && $_GET["traite"] == 1) {
    echo '<td>' . utf8_decode($val_viewcommande['code']) . '</td>';
		echo '<td><img src="css/flag_' . $val_membre['aplan'] . '.gif" ';
		echo 'title="Parle ' . convert_lang($val_membre['aplan']) . '" alt="" /></td>';
		echo "<td>$jour/$mois/$annee</td>";
		echo "<td>$heure:$minute:$seconde</td>";

		echo '<td>';
		echo ucfirst(strtolower(substr(utf8_decode($val_membre['prenom']),0,10)))
			. ' ' . ucfirst(strtolower(substr(utf8_decode($val_membre['nom']),0,10)));
		echo '</td>';

		/*
		if ($val_viewcommande['mode_paiement'] == 'cheque')
			echo '<td>chèque</td>';
		else
			echo '<td>' . $val_viewcommande['mode_paiement'] . '</td>';
		*/

		echo '<td style="text-align: right;">' . $val_viewcommande['prix_total_ht'] . ' &euro;</td>';
		echo "<td><a href='index2.php?page=detailuser&amp;id_membre=" . $val_membre["id_membre"] . "' title=\"Fiche détaillé de " . utf8_decode($val_membre["prenom"]) . " " . utf8_decode($val_membre["nom"]) . "\">";
		echo "<img src='css/user2.gif' alt=\"" . utf8_decode($val_membre["prenom"]) . " " . utf8_decode($val_membre["nom"]) . "\" /></a></td>"; 
		
		echo '<td>';
    echo "<a href='index2.php?page=order&id_order="
			. $val_viewcommande["id_commande"] . "'>";
		echo "<img src='css/d.gif' alt='' /></a>&nbsp;&nbsp;";
// 		echo "<a href='index2.php?page=order&id_order="
// 			. $val_viewcommande["id_commande"] . "'>New</a>";

		if (isset($_GET["traite"]) && $_GET["traite"] == 1)
    {
      echo "<a href='archive.php?id_commande=" . $val_viewcommande["id_commande"] . "'
				onclick='return window.confirm(\"Etes vous sur de vouloir archiver cette commande ?\")'>";
			echo "<img src='css/archiver.gif' alt='' /></a>";
		}
		echo '</td>';
  }
  else
  {
    echo '<td>' . utf8_decode($val_viewcommande['code']) . '</td>';
		if (isset($val_membre['aplan']))
			echo '<td><img src="css/flag_' . $val_membre['aplan'] . '.gif" ';
		else
			echo '<td><img src="css/flag_fr.gif" ';
		echo 'title="Parle ' . convert_lang($val_membre['aplan']) . '" alt="" /></td>';
		echo "<td>$jour/$mois/$annee</td>";
		echo "<td>$heure:$minute:$seconde</td>";

		echo '<td>';
		echo ucfirst(strtolower(substr(utf8_decode($val_membre['prenom']),0,10)))
			. ' ' . ucfirst(strtolower(substr(utf8_decode($val_membre['nom']),0,10)));
		echo '</td>';

		/*
		if ($val_viewcommande['mode_paiement'] == 'cheque')
			echo '<td>chèque</td>';
		else
			echo '<td>' . $val_viewcommande['mode_paiement'] . '</td>';
		*/

		echo '<td style="text-align: right;">' . $val_viewcommande['prix_total_ht'] . ' &euro;</td>';
		echo '<td><div class="statuttxt">' . $statut . '</div></td>';
		echo '<td>';
		echo '<div class="statutbarre">';
		if ($val_viewcommande["statut"] == 1)
    {
      echo "<div class='statut1'>";
    }
    if ($val_viewcommande["statut"] == 2)
    {
      echo "<div class='statut2'>";
    }
    if ($val_viewcommande["statut"] == 3)
    {
      echo "<div class='statut3'>";
    }
    if ($val_viewcommande["statut"] == 4)
    {
      echo "<div class='statut4'>";
    }
    if ($val_viewcommande["statut"] == 5)
    {
      echo "<div class='statut5'>";
    }
    if ($val_viewcommande["statut"] == 6)
    {
      echo "<div class='statut6'>";
    }
		echo "</div></div>";
		echo '</td>';
		echo "<td><a href='index2.php?page=detailuser&amp;id_membre=" . $val_membre["id_membre"] . "' title=\"Fiche détaillé de " . utf8_decode($val_membre["prenom"]) . " " . utf8_decode($val_membre["nom"]) . "\">";
		echo "<img src='css/user2.gif' alt=\"" . utf8_decode($val_membre["prenom"]) . " " . utf8_decode($val_membre["nom"]) . "\" /></a></td>"; 

		echo "<td><a href='index2.php?page=order&id_order="
			. $val_viewcommande["id_commande"] . "'><img src='css/d.gif' alt='Détail' /></a>";

/*		echo "<a href='index2.php?page=order&id_order="
			. $val_viewcommande["id_commande"] . "'>New</a>";*/
		
		echo "&nbsp;&nbsp;&nbsp;<a href='index2.php?page=disable&amp;id_commande=" . $val_viewcommande["id_commande"] . "'
			onclick='return window.confirm(\"Etes vous sur de vouloir masquer cette commande ?\")'><img src='css/trash.gif' alt='Masquer' /></a></td>";
  }
	echo '</tr>';
	$key++;
}
echo '</table>';
?>
