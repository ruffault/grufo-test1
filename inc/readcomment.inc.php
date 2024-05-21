<?php

function list_all_comment($id_product)
{
	global $link;
	$sql = 'SELECT membre.login,
									DATE_FORMAT(review.date, "%d/%m/%Y") as date,
									review.remarks
					FROM review, membre
					WHERE membre.id_membre = review.id_membre
					AND id_produit = "' . addslashes($id_product) . '"
					AND review.enable = 1
					ORDER BY date
					;';
	$res = mysqli_query($link,$sql);
	$i = 0;
	while ($val = mysqli_fetch_assoc($res))
	{
		$tab[$i]['login'] = $val['login'];
		$tab[$i]['date'] = $val['date'];
		$tab[$i]['remarks'] = $val['remarks'];			
		$i++;
	}
	return (isset($tab) ? $tab : '');
}


$remarks = list_all_comment($_GET['id']);
$smarty->assign("remarks", $remarks);

?>
