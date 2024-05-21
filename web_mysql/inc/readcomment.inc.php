<?php

function list_all_comment($id_product)
{
	$sql = 'SELECT membre.login,
									DATE_FORMAT(review.date, "%d/%m/%Y") as date,
									review.remarks
					FROM review, membre
					WHERE membre.id_membre = review.id_membre
					AND id_produit = "' . addslashes($id_product) . '"
					AND review.enable = 1
					ORDER BY date
					;';
	$res = mysql_query($sql);
	$i = 0;
	while ($val = mysql_fetch_assoc($res))
	{
		$tab[$i]['login'] = $val['login'];
		$tab[$i]['date'] = $val['date'];
		$tab[$i]['remarks'] = $val['remarks'];			
		$i++;
	}
	return $tab;
}


$remarks = list_all_comment($_GET['id']);
$smarty->assign("remarks", $remarks);

?>
