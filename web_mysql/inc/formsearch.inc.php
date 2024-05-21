<?php
$query = "SELECT id_categorie,
					nom_$applicationlang as nom
					FROM categorie;";
$result = mysql_query($query);

$i = 0;
while ($val = mysql_fetch_array($result))
{
  $theme[$i] = array(
                      'id_categorie' => $val['id_categorie'],
                      'nom' => $val['nom']
                      );
  $i++;
}
$smarty->assign("theme", $theme);
?>
