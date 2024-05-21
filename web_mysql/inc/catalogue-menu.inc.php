<?php
	$sql = "SELECT id_categorie,
									id_categorie_parent,
									nom_$applicationlang as nom
								FROM categorie ORDER BY nom
				;";
$res = mysql_query($sql);

$i = 0;
while($val = mysql_fetch_array($res))
{
	$test[$i] = give_cat($val['id_categorie_parent']);
	$i++;
}
/*//tri alhpabetique
sort($test);
//supprestion des doublons
  	$new = array();
    $exclude = array("");
     for ($i = 0; $i<=count($test)-1; $i++) {
         if (!in_array(trim($test[$i]["id_categorie"]) ,$exclude)) { $new[] = $test[$i]; $exclude[] = trim($test[$i]["id_categorie"]); }
      } 

*/

$smarty->assign("test", $test);


?>