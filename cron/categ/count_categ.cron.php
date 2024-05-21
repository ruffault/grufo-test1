<?php

function update_nb($id, $total)
{
	$sql = 'UPDATE categorie
					SET nb_product = "' . $total . '"
					WHERE id_categorie = "' . $id. '"
					LIMIT 1 ;';
	$res = mysql_query($sql);
}

function subcateg_count($id)
{
	$sql = 'SELECT sum(nb_product) as total
					FROM `categorie`
					WHERE categorie.id_categorie_parent = ' . $id . '
					OR categorie.id_categorie = ' . $id .';';
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	if ($val['total'] > 0)
		return $val['total'];
	else
		return 0;
}


$sql = 'SELECT produit.id_categorie as id,
							 count(produit.id_categorie) as total
				FROM produit
				GROUP BY id_categorie;';
$res = mysql_query($sql);

while($val = mysql_fetch_assoc($res))
	$tab[$val['id']] = $val['total'];


$sql = 'SELECT id_categorie as id
				FROM categorie;';
$res = mysql_query($sql);
while($val = mysql_fetch_assoc($res))
{
	if ($tab[$val['id']] > 0)
		update_nb($val['id'], $tab[$val['id']]);
	else
		update_nb($val['id'], 0);
}

$sql = 'SELECT categorie.id_categorie as id
				FROM `categorie`';
$res = mysql_query($sql);
while ($val = mysql_fetch_assoc($res))
{
	if (subcateg_count($val['id']))
		update_nb($val['id'], subcateg_count($val['id']));
	else
		update_nb($val['id'], 0);
}

?>