<?php
//echo $_SESSION["id_user"];
if($_SESSION['id_membre'])
{
  $sql_showfuture = "SELECT panier.id_produit,
										produit.nom_$applicationlang as nom,
										reference,
                    prix_unitaire, tva, rabais, produit.disponible,
                    produit.delai_reapprovisionnement
                    FROM commande, utilisateur, panier, produit, type
                    WHERE utilisateur.id_membre = '" . $_SESSION["id_membre"] . "'
                    AND commande.id_utilisateur = utilisateur.id_utilisateur
                    AND panier.id_commande = commande.id_commande
                    AND panier.id_produit = produit.id_produit
                    AND produit.id_type = type.id_type
                    AND commande.statut = '9'
                    GROUP BY panier.id_produit
                    ORDER BY produit.nom_$applicationlang;";
}
else
{
  $sql_showfuture = "SELECT panier.id_produit,
										produit.nom_$applicationlang as nom,
										reference,
                    prix_unitaire, tva, rabais, produit.disponible,
                    produit.delai_reapprovisionnement
                    FROM commande, utilisateur, panier, produit, type
                    WHERE utilisateur.id_utilisateur = '" . $_SESSION["id_user"] . "'
                    AND commande.id_utilisateur = utilisateur.id_utilisateur
                    AND panier.id_commande = commande.id_commande
                    AND panier.id_produit = produit.id_produit
                    AND produit.id_type = type.id_type
                    AND commande.statut = '9'
                    GROUP BY panier.id_produit
                    ORDER BY produit.nom_$applicationlang;";
}
$sql_showfuture_result = mysql_query($sql_showfuture);

if (mysql_num_rows($sql_showfuture_result))
{
  $i = 0;
  while ($val = mysql_fetch_array($sql_showfuture_result))
  {
    $future[$i] = array(
        "id_produit" => $val['id_produit'],
        "nom" => $val['nom'],
        "delai_reapprovisionnement" => $val['delai_reapprovisionnement'],
        "disponible" => $val['disponible']
        );
    $i++;
  }
    $smarty->assign("future", $future);
}
?>
