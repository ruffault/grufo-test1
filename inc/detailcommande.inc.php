<?php
$sql_selectcmd = "SELECT commande.id_commande, code
                  FROM utilisateur, `type`, membre, commande
                  WHERE membre.id_membre = '".$_SESSION["id_membre"]."'
                  AND membre.id_membre = utilisateur.id_membre
                  AND utilisateur.id_utilisateur = commande.id_utilisateur
                  AND commande.statut > '0'
                  GROUP BY id_commande
                  ORDER BY date_validation DESC;";
$sql_selectcmd_result = mysqli_query($link,$sql_selectcmd);

while ($val = mysqli_fetch_array($sql_selectcmd_result))
{
  if ($val["code"] == $_GET["no"])
    $commande = $val["id_commande"];
}

$sql_showpanier = "SELECT panier.id_produit, SUM(quantite) as quantite,
                  produit.nom_$applicationlang as nom,
									reference, prix_unitaire,
									tva, rabais, auteur.nom as auteur
                  FROM panier, utilisateur, produit, type, auteur
                  WHERE utilisateur.sessionid = '".$_SESSION["sessionid"]."'
                  AND panier.id_produit = produit.id_produit
                  AND panier.id_commande = $commande
                  AND produit.id_type = type.id_type
                  AND produit.id_auteur = auteur.id_auteur
                  GROUP BY panier.id_produit;";
$sql_showpanier_result = mysqli_query($link,$sql_showpanier);

if ($sql_showpanier_result)
{
  if (mysqli_num_rows($sql_showpanier_result) > 0)
  {
    $quantite_totale = "";
    $montant_commande = "";
    $i=0;
    while ($val = mysqli_fetch_array($sql_showpanier_result))
    {
      $produit[$i] = array(
                        'id_produit' => $val["id_produit"],
                        'auteur' => $val["auteur"],
                        'nom' => $val["nom"],
                        'quantite' => $val["quantite"],
                        'prix_unitaire' => $val["prix_unitaire"],
                        'tva' => $val["tva"],
                        'rabais' => $val["rabais"],
                        'img_type' => img_type($val['id_produit'])
                      ); 
      $quantite_totale += $val["quantite"];
      $i++;
    }
  $smarty->assign("produit", $produit);
  }
}
elseif($_SESSION["id_membre"])
{
  //Si le panier est vide on renvoie sur le panier
  $redirection = "Location: index.php?page=oldcommande";
  header($redirection);
}
else
{
  //Si le panier est vide on renvoie sur le panier
  $redirection = "Location: index.php?page=myaccount";
  header($redirection);
}

?>
