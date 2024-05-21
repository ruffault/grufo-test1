<?php
	$sql = "SELECT produit.id_produit, editeur.nom
				FROM `produit`, `editeur`
				WHERE produit.id_editeur = editeur.id_editeur
				AND editeur.id_editeur = '".$_GET["idedit"]."'
				AND produit.sommeil <> 1
				ORDER BY produit.date_parution DESC
				;";
$res = mysqli_query($link,$sql);

$i = 0;
while($val = mysqli_fetch_array($res))
{
	$test[$i] = give_cat($val['id_produit']);
	$i++;
}
//tri alhpabetique
sort($test);
//supprestion des doublons
  	$new = array();
    $exclude = array("");
     for ($i = 0; $i<=count($test)-1; $i++) {
         if (!in_array(trim($test[$i]["id_categorie"]) ,$exclude)) { $new[] = $test[$i]; $exclude[] = trim($test[$i]["id_categorie"]); }
      } 



$smarty->assign("test", $new);


?>
