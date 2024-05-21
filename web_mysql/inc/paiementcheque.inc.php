<?php
//on verifie que le panier n'est pas vide.
$sql_showpanier = "SELECT panier.id_produit, SUM(quantite) as quantite,
                  produit.nom_$applicationlang as nom, reference, prix_unitaire, tva, rabais,
                  produit.disponible, produit.delai_reapprovisionnement
                  FROM panier, utilisateur, produit, type
                  WHERE utilisateur.sessionid = '" . $_SESSION["sessionid"] . "'
                  AND panier.id_produit = produit.id_produit
                  AND panier.id_commande = '" . $_SESSION["id_commande"] . "'
                  AND produit.id_type = type.id_type
                  GROUP BY panier.id_produit
                  ;";
$sql_showpanier_result = mysql_query($sql_showpanier);
if (mysql_num_rows($sql_showpanier_result) > 0)
{
  if ($_GET["statut"] != 'ok')
  {
    $sql_validatecommande = "UPDATE `commande`
                             SET `mode_paiement` = 'cheque'
                             WHERE `id_commande` = '".$_SESSION["id_commande"]."'
                             LIMIT 1;";
    mysql_query($sql_validatecommande);
    
    $sql_produit = "SELECT 
                      produit.reference,
                      produit.nom_$applicationlang as nom,
                      categorie.nom_$applicationlang as categorie,
                      panier.prix_unitaire,
                      SUM(panier.quantite) as quantite,
                      livraison.civilite as client_civilite,
  										mode,
                      tva,
                      rabais
                    FROM
                      produit,
                      panier,
                      commande,
                      categorie,
                      livraison,
                      frais_port,
                      type
                     WHERE produit.id_produit = panier.id_produit
                     AND commande.id_commande = panier.id_commande
                     AND commande.id_commande = '" . $_SESSION["id_commande"] . "'
                     AND produit.id_categorie = categorie.id_categorie
                     AND livraison.id_livraison = commande.id_livraison
                     AND frais_port.id_frais_port = livraison.id_frais_port
                     AND produit.id_type = type.id_type
                     GROUP BY produit.id_produit;";
    $sql_produit_result = mysql_query($sql_produit);
    $sql_produit_result2 = mysql_query($sql_produit);
    $cout_produits = 0;

    if (mysql_fetch_row($sql_produit_result))
    {
      while($val_sql_produit = mysql_fetch_array($sql_produit_result2))
      {
        $nb_livres += $val_sql_produit["quantite"];
        if (typeprice($_SESSION["societe"],$_SESSION["intracommu"],$_SESSION["europe"]) == "ht")
        {
          $cout_produits += ($val_sql_produit["quantite"]
          * ht_livre($val_sql_produit["prix_unitaire"],
          $val_sql_produit["tva"]));
        }
        else
        {
          $cout_produits += ($val_sql_produit["quantite"]
          * $val_sql_produit["prix_unitaire"]);
        }
        $mode_frais = $val_sql_produit["mode"];
      }

      $poid_cmd = poid_commande($_SESSION['id_commande']);
      $frais_port = frais_port($poid_cmd, $_SESSION["id_livraison"]);
      
      foreach ($frais_port as $element => $mode)
      {
        if ($frais_port[$element]['mode'] == $mode_frais)
          $montant_frais =  $frais_port[$element]['prix'];
      }
      $frais_port = $montant_frais;
      $montant = $cout_produits + $frais_port;

      $smarty->assign("montant", $montant);
    }
  }
}
elseif($_GET["statut"] != 'ok' or !$_SESSION["id_membre"])
{
  //Si le panier est vide on renvoie sur le panier
  $redirection = "Location: index.php?page=showpanier";
  header($redirection);
}
?>
