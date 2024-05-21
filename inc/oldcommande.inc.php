<?php
$sql_showpanier = "SELECT commande.id_commande, statut, motif_refus, date_validation, date_envoie, code
                  FROM utilisateur, `type`, membre, commande
                  WHERE membre.id_membre = '" . $_SESSION["id_membre"] . "'
                  AND membre.id_membre = utilisateur.id_membre
                  AND utilisateur.id_utilisateur = commande.id_utilisateur
                  AND commande.statut > '0'
                  AND commande.statut <> '9'
                  GROUP BY id_commande
                  ORDER BY date_validation DESC;";
$sql_showpanier_result = mysqli_query($link,$sql_showpanier);

if (mysqli_num_rows($sql_showpanier_result) > 0)
{
  $i = 0;
  while ($val = mysqli_fetch_array($sql_showpanier_result))
  {
    $date = date_fr(date_mysql_to_timestamp($val["date_validation"]));
    $date_envoie = date_fr(date_mysql_to_timestamp2($val["date_envoie"]));
    $oldcommande[$i] = array(
                        'date' => $date,
                        'date_envoie' => $date_envoie,
                        'idcommande' => $val["id_commande"],
                        'statut' => $val["statut"],
                        'code' => $val["code"],
                        'refus' => $val["motif_refus"]
                        );
    $i++;
  }
  $smarty->assign("oldcommande", $oldcommande);
}
?>

