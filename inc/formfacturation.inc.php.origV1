<?php
//on verifie que le panier n'est pas vide.
$sql_showpanier = "SELECT panier.id_produit
									FROM panier
                  WHERE panier.id_commande = '" . $_SESSION["id_commande"] . "'
                  GROUP BY panier.id_produit
                  ;";
$sql_showpanier_result = mysqli_query($link,$sql_showpanier);

if (mysqli_num_rows($sql_showpanier_result) > 0)
{
//  require("tablepays");
  $sql_infomembre = "SELECT membre.civilite, membre.nom, membre.prenom, membre.nomsociete, membre.adresse1, membre.adresse2,
                     membre.adresse3, membre.cp, membre.ville, membre.etat, membre.pays, pays.nom_$applicationlang as paysnom
                     FROM membre, pays
                     WHERE membre.id_membre = '" . $_SESSION["id_membre"] . "'
										 AND pays.abrev = membre.pays;";
  $sql_infomembre_result = mysqli_query($link,$sql_infomembre);
  $val_infomembre = mysqli_fetch_array($sql_infomembre_result);
  
  $pays_membre = $val_infomembre["paysnom"];
  
  $infomembre = array(
    'civilite' => $val_infomembre['civilite'],
    'nom' => $val_infomembre['nom'],
    'prenom' => $val_infomembre['prenom'],
    'nomsociete' => $val_infomembre['nomsociete'],
    'adresse1' => $val_infomembre['adresse1'],
    'adresse2' => $val_infomembre['adresse2'],
    'adresse3' => $val_infomembre['adresse3'],
    'cp' => $val_infomembre['cp'],
    'ville' => $val_infomembre['ville'],
    'pays_membre' => utf8_encode($pays_membre),
    'etat' => $val_infomembre['etat']
    );
  
  $facturation = array(
    'civilite' => $_SESSION['facturation_civilite'],
    'nom' => $_SESSION['facturation_nom'],
    'prenom' => $_SESSION['facturation_prenom'],
    'adresse1' => $_SESSION['facturation_adresse1'],
    'adresse2' => $_SESSION['facturation_adresse2'],
    'adresse3' => $_SESSION['facturation_adresse3'],
    'cp' => $_SESSION['facturation_cp'],
    'ville' => $_SESSION['facturation_ville'],
    'etat' => $_SESSION['facturation_etat']
  );
  
  $sql_allcountry = "SELECT abrev, nom_$applicationlang as nom FROM pays ORDER BY nom_$applicationlang;";
  $sql_allcountry_result = mysqli_query($link,$sql_allcountry);
  $i = 0;
  while($valcountry = mysqli_fetch_array($sql_allcountry_result))
  {
    $tabpays[$i] = array(
                        'abrev' => $valcountry["abrev"],
                        'nom' => $valcountry["nom"]
                        );
    $i++;
  }
  
  $smarty->assign("tabpays", $tabpays);
  $smarty->assign("infomembre", $infomembre);
  $smarty->assign("facturation", $facturation);
}
else
{
  //Si le panier est vide on renvoie sur le panier
  $redirection = "Location: index.php?page=showpanier";
  header($redirection);
}

?>
