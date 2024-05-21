<?php

if (!$_GET["idcat"])
{
  $_GET["idcat"] = 0;
}

$nbcattoshow = $nbcatpage;
if ($_GET['pos'])
{
	$nbcattoshow = addslashes(substr($_GET['pos'],0,-1))-1 .",$nbcatpage";
}

$sql = "SELECT produit.id_produit
				FROM produit, categorie
				WHERE (
								categorie.id_categorie = '" . $_GET["idcat"] . "'
								OR categorie.id_categorie_parent = '" . $_GET["idcat"] . "'
							)
				AND produit.id_categorie = categorie.id_categorie
				AND produit.sommeil <> 1
				ORDER BY image DESC
				LIMIT $nbcattoshow
				;";
$res = mysql_query($sql);

$i = 0;
while($val = mysql_fetch_array($res))
{
	$samecateg[$i] = give_product($val['id_produit']);
	$i++;
}

$smarty->assign("samecateg", $samecateg);


$nb_lienpage = 10;
$sqlpage = "SELECT count(*) as total
						FROM produit, auteur, type, categorie
						WHERE produit.id_categorie = categorie.id_categorie
						AND produit.sommeil <> 1
						AND produit.id_auteur = auteur.id_auteur
						AND type.id_type = produit.id_type
						AND (categorie.id_categorie = '" . $_GET["idcat"] . "'
						OR categorie.id_categorie_parent = '" . $_GET["idcat"] . "');";
$res = mysql_query($sqlpage);
$valpage = mysql_fetch_array($res);
$allpage = ceil($valpage['total'] / $nbcatpage);

$curpage = ceil(addslashes(substr($_GET['pos'],0,-1)) / $nbcatpage);

//Module pour afficher les liens vers les pages suivantes et precedentes
if ($allpage > 1)
{

	if (($curpage < 1) or (!$curpage))
	{
		$curpage = 1;
	}
	
	if (($curpage - $nb_lienpage) > 0)
	{
		if ($curpage <= 10)
			$borne_inf = 10;
		else
		{
			$borne_inf = $curpage-5;
		}
	}
	else
		$borne_inf = 1;

	if (($nbpage - $curpage) > 0) 
		$borne_sup = round($curpage+4,-1);
	else
		$borne_sup = $allpage;

	if ($borne_sup > $allpage)
		$borne_sup = $allpage;

	if($borne_inf > 10)
	{
		$link_back = "<a href='?page=showresult"
		. "&amp;pagecourante=" . ($borne_inf - 1)
		. "&amp;nbresult=" . $curpage .$url. "'>";
	}
	$j = 0;

	for ($i=$borne_inf; $i <= $borne_sup; $i++)
	{
		if ($i == $curpage)
			$link[$j] = array('num' => $i . " ");
		else
		{
			$link[$j] = array('num' => " <a href='catalogue-"
			. $_GET["idcat"]
			. "-"
			.((($i-1) * $nbcatpage)+1)
			. "-"
			. str2url($tab[$_GET["idcat"]]["nom"])
			. ".html'>"
			. $i
			. "</a> ");
		}
		$j++;
	}
	if (!($borne_sup == $allpage))
		$link_next = "<a href='?page=showresult"
		. "&amp;pagecourante="
		. ($curpage + 1)
		. "&amp;nbresult="
		. $allpage
		. $url
		. "'>";
}

$smarty->assign("link_back", $link_back);
$smarty->assign("link_next", $link_next);
$smarty->assign("link", $link);

?>