<?php
$query = "SELECT id_categorie,
					nom_$applicationlang as nom
					FROM categorie;";
$result = mysqli_query($link,$query);

$i = 0;
while ($val = mysqli_fetch_array($result))
{
  $theme[$i] = array(
                      'id_categorie' => $val['id_categorie'],
                      'nom' => $val['nom']
                      );
  $i++;
}
$smarty->assign("theme", $theme);
?>
