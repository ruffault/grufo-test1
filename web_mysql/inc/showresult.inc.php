<?php

require 'search.php';

$resultat_par_page = 25;
$nb_lienpage = 10;
$nb_trouve = 0;

if (isset($_GET["pagecourante"]))
{
	$search_sql = $search_sql_original;
	$search_sql .= " LIMIT "
	. (($_GET["pagecourante"]-1) * $resultat_par_page )
	. ",$resultat_par_page;";
}
else
{
	$search_sql = $search_sql_original;
	$search_sql .= " LIMIT $resultat_par_page;";
}

$search_sql_categ_result = mysql_query($search_sql_categ);

if ($search_sql_categ && mysql_num_rows($search_sql_categ_result))
{
  $i = 0;
  while($val_categ = mysql_fetch_array($search_sql_categ_result))
	{
		$categ[$i] = $val_categ["nom"];
		$i++;
	}
}

// On execute la requete si on en a construit une
if ($search_sql && $nbresult != 0)
  $result = mysql_query($search_sql);

// Recuperation des id des ouvrages dans un tableau
if (isset($result))
{
	if (mysql_num_rows($result) > 0)
	{
		$i = 0;
		while ($val = mysql_fetch_array($result))
		{
			$resultat[$i] = give_product($val['id_produit']);
			$i++;
			$nb_trouve++; 
		}

		//Module pour afficher les liens vers les pages suivantes et precedentes
		if ($nbpage > 1)
		{
			if (($_GET["pagecourante"] < 1) or (!$_GET["pagecourante"]))
				$_GET["pagecourante"] = 1;
			
			if (($_GET["pagecourante"] - $nb_lienpage) > 0)
				if ($_GET["pagecourante"] <= 10)
					$borne_inf = 10;
				else
					$borne_inf = round($_GET["pagecourante"]-6,-1) + 1;
			else
				$borne_inf = 1;
	
			if (($nbpage - $_GET["pagecourante"]) > 0)
				$borne_sup = round($_GET["pagecourante"]+4,-1);
			else
				$borne_sup = $nbpage;
			
			if ($borne_sup > $nbpage)
				$borne_sup = $nbpage;
	
			if($borne_inf > 10)
			{
				$link_back = "<a href='?page=showresult"
				. "&amp;pagecourante=" . ($borne_inf - 1)
				. "&amp;nbresult=" . $_GET["nbresult"] .$url. "'>";
			}
			$j = 0;
			for ($i=$borne_inf; $i <= $borne_sup; $i++)
			{
				if ($i == $_GET["pagecourante"])
					$link[$j] = array('num' => $i . " ");
				else
				{
					$link[$j] = array('num' => " <a href='?page=showresult"
					. "&amp;pagecourante=$i&amp;nbresult="
					. $_GET['nbresult']
					. $url
					. "'>"
					. $i
					. "</a> ");
				}
				$j++;
			}
			if (!($borne_sup == $nbpage))
				$link_next = "<a href='?page=showresult"
				. "&amp;pagecourante="
				. ($_GET['pagecourante'] + 1)
				. "&amp;nbresult="
				. $_GET['nbresult']
				. $url
				. "'>";
		}
	}
}
$smarty->assign('link_back', $link_back);
$smarty->assign('link_next', $link_next);
$smarty->assign('link', $link);
$smarty->assign('resultat', $resultat);
$smarty->assign('categ', $categ);
$smarty->assign('nb_trouve', $nb_trouve);
$smarty->assign('notitle', 1);

?>
