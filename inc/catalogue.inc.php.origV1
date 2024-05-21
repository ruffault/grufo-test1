<?php
$sql_allcateg = "SELECT id_categorie,
									id_categorie_parent,
									nom_$applicationlang as nom
								FROM categorie ORDER BY nom;";
$res = mysqli_query($link,$sql_allcateg);

while($val = mysqli_fetch_array($res)) {
	$tab[$val['id_categorie']] = array(
	                  'id' => $val['id_categorie'],
                    'parent' => $val['id_categorie_parent'],
                    'nom' => $val["nom"]
                                    );
}

if ($_GET['idcat']) {
  $var = sub_level($tab,$_GET['idcat']);
  $smarty->assign("uppercat", up_level($tab,$_GET['idcat']));
  $smarty->assign("categorie_total", count($var));
  $smarty->assign("categorie_precise", $var);

  require("inc/samecateg.inc.php");
}
else {
  //on purge le tableau des categories des indices different de 0
  $i = 0;
  while (list ($key, $value) = each ($tab)) {
    if ($value["parent"] == 0) {
      $categorie[$i] = array(
                              'id' => $value['id'],
                              'nom' => $value['nom']
                              );
      $i++;
    }
  }
  $smarty->assign("subcateg", $tab);
  $smarty->assign("categorie", $categorie);
}

debug(up_level($tab,184));
debug(sub_level($tab,285));

// DEBUT AJOUT FGI POUR AFFICHAGE CATALOGUE PAR EDITEUR
// Definit si on affiche ou non la liste des editeurs dans la page catalogue
$show_liste_editeurs_dans_catalogue = 0;
$smarty->assign("show_liste_editeurs_dans_catalogue", $show_liste_editeurs_dans_catalogue);
// Définit si on affiche a cote du no mde l editeur, le nombre de produits associes
// ATTENTION - nuit a la rapidite de la page catalogue de maniere significative
$show_details = 0;
$sql_editeurs = "SELECT id_editeur, nom
		FROM editeur 
         	ORDER BY nom;";
$res_editeurs = mysqli_query($link,$sql_editeurs);

$i = 0;
while($val_editeurs = mysqli_fetch_array($res_editeurs))
{
	$tab_editeurs[$i] = array(
                              'id_editeur' => $val_editeurs['id_editeur'],
                              'nom' => $val_editeurs['nom'],
                              );
	if ($show_details)
	{
		$nbr_online_products = get_editeur_nbr_produits_online($val_editeurs['id_editeur']);
		$tab_editeurs[$i]['nbr_online_products'] = $nbr_online_products;
	}
	$i++;
}
  $smarty->assign("tab_editeurs", $tab_editeurs);
  $smarty->assign('show_details', $show_details);
// FIN AJOUT FGI POUR AFFICHAGE CATALOGUE PAR EDITEUR
?>
