<?php

if (isset($_GET['search_auteur']))
{
	$_GET['search_auteur'] = utf8_decode($_GET['search_auteur']);
	$url .= "&search_auteur=".$_GET['search_auteur'];
}

if (isset($_GET['search_lang']))
{
	$_GET['search_lang'] = utf8_decode($_GET['search_lang']);
	$url .= "&search_lang=".$_GET['lang'];
}

if (isset($_GET['search_categ']))
{
	$_GET['search_categ'] = utf8_decode($_GET['search_categ']);
	$url .= "&search_categ=".$_GET['search_categ'];
}

if (isset($_GET['date_parution']))
{
	$_GET['date_parution'] = utf8_decode($_GET['date_parution']);
	$url .= "&date_parution=".$_GET['date_parution'];
}

if (isset($_GET['quicksearch']))
{
	$_GET['quicksearch'] = utf8_decode($_GET['quicksearch']);
	$url .= "&quicksearch=".$_GET['quicksearch'];
}
else if(isset($_GET['search_titre']))
{
	$url .= "&search_titre=".$_GET['search_titre'];
}

//on purge le tableau de produit au cas ou
$resultat_par_page = 25;
if (!isset($_GET["debut"]))
  $debut = 0;
else
  $debut = $_GET["debut"];

$fin = $debut + $resultat_par_page;






//Advanced search
if (isset($_GET['search_submit']) or isset($_GET['search_categ'])
or isset($_GET['search_titre']) or isset($_GET['search_lang'])
or isset($_GET['date_parution']))
{
	$search_sql = "SELECT produit.id_produit,
								 categorie.nom_$applicationlang as categorie,
                 auteur.nom as auteur, produit.description_$applicationlang,
								 prix, reference,
								 produit.nom_$applicationlang as nom, tva, produit.prix_editeur,produit.rabais, produit.disponible, produit.delai_reapprovisionnement,
								 produit.sommeil, produit.langues
                 FROM produit, categorie, auteur, `type`
                 WHERE produit.id_categorie = categorie.id_categorie
                 AND produit.id_auteur = auteur.id_auteur
                 AND produit.id_type = type.id_type ";
  //                  AND produit.sommeil <> 1

  if ($_GET['search_titre'] && strlen($_GET['search_titre']) > 1)
  {
    $parametre = explode(" ", addslashes(cleanstring($_GET['search_titre'])));

    if (count($parametre)==1)
		{
      $search_sql .= "AND (produit.nom_fr LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.nom_en LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.nom_es LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.nom_it LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.nom_de LIKE '%$parametre[0]%')\n";
    }
		else
    {    
      for($i=0; $i < count($parametre); $i++)
      {
        if ($i==0)
				{
          $search_sql .= "AND ((produit.nom_fr LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_es LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_it LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_de LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_en LIKE '%$parametre[$i]%')\n";
        }
				elseif ($i == count($parametre)-1)
				{
          $search_sql .= "AND (produit.nom_fr LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_en LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_de LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_it LIKE '%$parametre[$i]%'\n";
					$search_sql .= " OR produit.nom_es LIKE '%$parametre[$i]%'))\n";
				}
				else
				{
          $search_sql .= "AND (produit.nom_fr LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_en LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_it LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_es LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_de LIKE '%$parametre[$i]%')\n";
				}
      }
    }
  }
  
	if (isset($_GET['search_categ']) && $_GET['search_categ'] != '')
    $search_sql .= "AND categorie.id_categorie='".addslashes($_GET['search_categ'])."'\n";
  if (isset($_GET['search_annee']))
    $search_sql .= "AND LEFT(date_parution, 4)>'".addslashes($_GET['search_annee'])."'\n";
  if (isset($_GET['search_auteur']) && strlen($_GET['search_auteur']) > 1)
    $search_sql .= "AND auteur.nom LIKE '%".addslashes($_GET['search_auteur'])."%'\n";
  if (isset($_GET['search_lang']) && strlen($_GET['search_lang']) > 1)
    $search_sql .= "AND produit.langues LIKE '%".addslashes($_GET['search_lang'])."%'\n";

	$search_sql_result = mysqli_query($link,$search_sql);
	$nbresult = mysqli_num_rows($search_sql_result);
	$total = ceil($nbresult / $resultat_par_page);
	$search_sql .= "ORDER by image DESC, produit.nom_$applicationlang, produit.rank DESC ";  
  $search_sql_original = $search_sql;
  $search_sql .= "LIMIT $debut,$fin;";
}

//Quick search
if (isset($_GET['quicksearch']))
{
  $search_sql = "SELECT produit.id_produit, categorie.nom_$applicationlang as categorie,
                 auteur.nom as auteur, produit.description_$applicationlang, prix, reference,
                 produit.sommeil, produit.nom_$applicationlang as nom,
                 tva, produit.prix_editeur, produit.rabais, produit.disponible,
                 produit.delai_reapprovisionnement, produit.langues
                 FROM produit, categorie, auteur, `type`
                 WHERE produit.id_categorie = categorie.id_categorie
                 AND produit.id_auteur = auteur.id_auteur
                 AND produit.id_type = type.id_type
                 AND produit.sommeil <> 1
                 ";
								// AND produit.sommeil <> 1
  $parametre = explode(" ", addslashes(cleanstring($_GET['quicksearch'])));

  if (count($parametre) > 0)
  {
    if (count($parametre)==1)
    {
      $search_sql .= "AND ((produit.nom_fr LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.nom_en LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.nom_es LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.nom_de LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.nom_it LIKE '%$parametre[0]%')\n";
			
      $search_sql .= " OR auteur.nom LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR (produit.description_fr LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.description_en LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.description_es LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.description_de LIKE '%$parametre[0]%'\n";
      $search_sql .= " OR produit.description_it LIKE '%$parametre[0]%'))\n";
		}
    else
    {
      for($i=0; $i < count($parametre); $i++)
      {
        if ($i==0)
				{
          $search_sql .= "AND (((produit.nom_fr LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_en LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_es LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_it LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_de LIKE '%$parametre[$i]%')\n";
        }
				elseif ($i == count($parametre)-1)
				{
          $search_sql .= "AND (produit.nom_fr LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_en LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_de LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_es LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_it LIKE '%$parametre[$i]%'))\n";
        }
				else
				{
          $search_sql .= "AND (produit.nom_fr LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_en LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_es LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_de LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.nom_it LIKE '%$parametre[$i]%')\n";
				}
      }
  
      for($i=0; $i < count($parametre); $i++)
      {
        if ($i==0)
          $search_sql .= "OR (auteur.nom LIKE '%$parametre[$i]%'\n";
        elseif ($i == count($parametre)-1)
          $search_sql .= "AND auteur.nom LIKE '%$parametre[$i]%')\n";
        else
          $search_sql .= "AND auteur.nom LIKE '%$parametre[$i]%'\n";
      }

			for($i=0; $i < count($parametre); $i++)
      {
        if ($i==0)
				{
          $search_sql .= "OR (produit.description_fr LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.description_en LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.description_de LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.description_es LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.description_it LIKE '%$parametre[$i]%')\n";
        }
				elseif ($i == count($parametre)-1)
				{
          $search_sql .= "AND (produit.description_fr LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.description_en LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.description_de LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.description_it LIKE '%$parametre[$i]%'\n";
					$search_sql .= " OR produit.description_es LIKE '%$parametre[$i]%'))\n";
				}
        else
				{
          $search_sql .= "AND (produit.description_fr LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.description_en LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.description_de LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.description_es LIKE '%$parametre[$i]%'\n";
          $search_sql .= " OR produit.description_it LIKE '%$parametre[$i]%')\n";

				}
      }
    }
  }
  else
    $nbresult = 0;

  $search_sql_result = mysqli_query($link,$search_sql);
  $nbresult = mysqli_num_rows($search_sql_result);
  $total = ceil($nbresult / $resultat_par_page);
  $search_sql .= "ORDER by image DESC, produit.nom_$applicationlang, produit.rank DESC ";  
  $search_sql_original = $search_sql;
  $search_sql .= "LIMIT $debut,$fin;";
}

//Si on a pas de recherche
if (!isset($_GET['search_submit']) && !isset($_GET['quicksearch']) && !$search_sql)
{
	$search_sql = "SELECT produit.id_produit, categorie.nom_$applicationlang as categorie,
                 auteur.nom as auteur,prix, reference, produit.nom_$applicationlang as nom,
                 tva, produit.prix_editeur, produit.rabais,produit.disponible,
                 produit.sommeil, produit.delai_reapprovisionnement
	               FROM produit, categorie, auteur, `type`
	               WHERE produit.id_categorie = categorie.id_categorie
	               AND produit.id_auteur = auteur.id_auteur
	               AND produit.id_type = type.id_type
	               ";
								// AND produit.sommeil <> 1
  $search_sql_result = mysqli_query($link,$search_sql);
  $nbresult = mysqli_num_rows($search_sql_result);
  $total = ceil($nbresult / $resultat_par_page);
  $search_sql .= "ORDER by image DESC, produit.nom_$applicationlang, produit.rank DESC ";  
	$search_sql_original = $search_sql;
	$search_sql .= "LIMIT $debut,$fin;";
}

if (isset($parametre) && count($parametre)) {
	$search_sql_categ = "SELECT id_categorie, nom_$applicationlang as nom
                       FROM categorie
                       WHERE ";
	for($i=0; $i < count($parametre); $i++)
	{
	  if ($i==0)
		{
	    $search_sql_categ .= "(categorie.nom_fr LIKE '%$parametre[$i]%'\n";
	    $search_sql_categ .= " OR categorie.nom_en LIKE '%$parametre[$i]%'\n";
	    $search_sql_categ .= " OR categorie.nom_de LIKE '%$parametre[$i]%'\n";
	    $search_sql_categ .= " OR categorie.nom_es LIKE '%$parametre[$i]%'\n";
	    $search_sql_categ .= " OR categorie.nom_it LIKE '%$parametre[$i]%')\n";
		}
		else
		{
	    $search_sql_categ .= "OR (categorie.nom_fr LIKE '%$parametre[$i]%'\n";
	    $search_sql_categ .= " OR categorie.nom_en LIKE '%$parametre[$i]%'\n";
	    $search_sql_categ .= " OR categorie.nom_de LIKE '%$parametre[$i]%'\n";
	    $search_sql_categ .= " OR categorie.nom_es LIKE '%$parametre[$i]%'\n";
	    $search_sql_categ .= " OR categorie.nom_it LIKE '%$parametre[$i]%')\n";
		}
	}
	$search_sql_categ .= "GROUP BY id_categorie	ORDER BY nom_$applicationlang;";
}
else
{
  $search_sql_categ = "SELECT id_categorie, nom_$applicationlang as nom
                       FROM categorie
                       WHERE categorie.id_categorie_parent = ''
					             or categorie.id_categorie_parent = '0'
					             GROUP BY id_categorie
					             ORDER BY nom_$applicationlang;";
}

//$search_sql;
$search_sql_categ;
$search_sql_original;

$nbpage = $total;
$url .= "&nbpage=".$nbpage;
$url = utf8_encode($url);

$texte = date("YmdHis");
if(isset($_GET['quicksearch']))
	$texte .= "\t".$nbresult."\t".utf8_encode(stripslashes($_GET['quicksearch']));
else
	$texte .= "\t".$nbresult."\t".utf8_encode(stripslashes($_GET['search_titre']));

//On loggue la requete
$Fnm = "log/requetes.txt";
$inF = fopen($Fnm,"a");
fputs($inF,$texte."\n");
fclose($inF);
?>
