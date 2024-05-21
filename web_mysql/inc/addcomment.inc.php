<?php

function articlename($id_produit, $lang)
{
	$sql = 'SELECT nom_' . $lang . '
					FROM produit
					WHERE produit.id_produit = "' . $id_produit . '";';
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	return $val["nom_$lang"];
}

function addcomment($id_produit, $id_membre, $remarks)
{
	$remarks = addslashes($remarks);
	$sql = 'INSERT INTO review(
														 id_produit,
														 id_membre,
														 `date`,
														 remarks
														)
								 VALUES(
								 				"' . $id_produit . '",
								 				"' . $id_membre . '",
												now(),
												"' . $remarks . '"
												);';
	mysql_query($sql);
}

if(isset($_SESSION['id_membre']))
{
	if(isset($_GET['save']) && isset($_GET['remarks']) && trim($_GET['remarks']) != '')
	{
		addcomment($_GET['id'], $_SESSION['id_membre'], $_GET['remarks']);
	}
	else
	{
	
		$productname = utf8_encode(articlename($_GET['id'], $applicationlang));
		
		if(isset($_GET['addcomment']))
		{
			if(!isset($_GET['remarks']) or (isset($_GET['remarks']) && trim($_GET['remarks']) == ''))
			{
				$smarty->assign("errorremarks", 1);
				$smarty->assign("error", 1);
			}
		}
	
		$smarty->assign("productname", $productname);
	}
}
else
{
	header('Location: index.php?page=showproduct&id='.$_GET['id']);
}

?>
