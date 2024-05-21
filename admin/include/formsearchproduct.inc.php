<?php
function clean_isbn($isbn)
{
	$isbn = preg_replace("/[^0-9]/", '', $isbn);
	$isbn = substr($isbn, 0,9);
	for ($i = 0; $i != strlen($isbn); $i++)
	{
		$newisbn .= $isbn[$i];
	}

	return $newisbn;
}

//Transforme une date de la forme jj/mm/aaaa vers aaaa-mm-jj
function inverse_date($date) {

	list($day, $month, $year) = split('/', $date);
 $date = $year . '-' . $month . '-' . $day;
	return $date;

}

//recherche de produit
?>
<form action="index2.php?page=searchproduct&showresult=1&page_courante=1&nbresult_par_page=25" method="post">
  <div class="form-group" id="formsearch">
	<div class="form-group">
		<label for="nom">Nom</label>
		<input class="form-control" type="text" value="" name="search_name" />
		<input type="submit" class="btn btn-info"value="Rechercher" name="search_submit" />
	</div>
	<div class="form-group">
		<label for="auteur">Auteur</label>
		<input class="form-control" type="text" value="" name="search_auteur" />
		<input type="submit" value="Rechercher" class="btn btn-info" name="search_submit" />
	</div>
	<div class="form-group">
		<label for="editeur">Editeur</label>
		<input class="form-control" type="text" value="" name="search_editeur" />
		<input type="submit" value="Rechercher" class="btn btn-info" name="search_submit" />
	</div>
	<div class="form-group">
		<label for="reference">Référence</label>
		<input class="form-control" type="text" value="" name="search_reference" />
		<input type="submit" value="Rechercher" class="btn btn-info" name="search_submit" />
	</div>
	<div class="form-group">
		<label for="isbn">ISBN</label>
		<input class="form-control"type="text" value="" name="search_isbn" />
		<input type="submit" value="Rechercher" name="search_submit" class="btn btn-info" />
	</div>
	<div class="form-group">
        <label for="date">Date</label>
		<div class="form-group">
			<strong>Avant</strong> le (jj/mm/aaaa)
			<input class="form-control" type="text" value="" size='10' name="search_date_before" />
			<input type="submit" value="Rechercher" class="btn btn-info" name="search_submit" />
		</div>	
		<div class="form-group">
		        <strong>Après</strong> le (jj/mm/aaaa)
			<input type="text" value="" size='10' name="search_date_after" />
		        <input type="submit" value="Rechercher"  class="btn btn-info" name="search_submit" />
		</div>
	</div>
	<div class="form-group">
		<input type="hidden" value="1" name="search_incomplete" />
		<input type="submit" class="btn btn-info" value="Fiches incomplètes" name="search_submitbad" />
	</div>
  </div>

<?php
if (isset($_POST['search_submit']))
{
	//on supprime les caractéres douteux
  $_POST['search_name'] = addslashes($_POST['search_name']);
  $_POST['search_auteur'] = addslashes($_POST['search_auteur']);
  $_POST['search_editeur'] = addslashes($_POST['search_editeur']);
  $_POST['search_date_before'] = addslashes($_POST['search_date_before']);
  $_POST['search_date_after'] = addslashes($_POST['search_date_after']);

	//on supprime l'ancienne requete
	$_SESSION["search_sql"] = '';
}

if (isset($_GET["showresult"]) && $_GET["showresult"] == 1)
{
  if(isset($_POST["search_name"]))
	{
    //on construit la requéte sql
    $save_sql_search = "SELECT id_produit, nom_fr as nom, produit.image
                FROM produit
                WHERE ";

		//on récupére les sous chaines
	  $parametre = explode(" ", $_POST['search_name']);
		//s'il n'y a qu'un paramétre
    if (count($parametre)==1)
      $save_sql_search .= "produit.nom_fr LIKE '%" . $parametre[0] . "%'";
    else //sinon
    {
      for($i=0; $i < count($parametre); $i++)
      {
        if ($i==0)
          $save_sql_search .= "produit.nom_fr LIKE '%$parametre[$i]%'\n";
        elseif ($i == count($parametre)-1)
          $save_sql_search .= "AND produit.nom_fr LIKE '%$parametre[$i]%'\n";
        else
          $save_sql_search .= "AND produit.nom_fr LIKE '%$parametre[$i]%'\n";
      }
    }
		$_SESSION["search_sql"] = $save_sql_search;
	}

  if(isset($_POST["search_auteur"]) && $_POST["search_auteur"] != '')
	{
    //on construit la requéte sql
    $save_sql_search = "SELECT produit.id_produit, produit.nom_fr as nom, produit.image
            FROM produit, auteur
            WHERE auteur.nom LIKE '%".$_POST["search_auteur"]."%'
						AND produit.id_auteur = auteur.id_auteur";
		$_SESSION["search_sql"] = $save_sql_search;
	}

  if(isset($_POST["search_editeur"]) && $_POST["search_editeur"] != '')
	{
    //on construit la requéte sql
    $save_sql_search = "SELECT produit.id_produit, produit.nom_fr as nom, produit.image
            FROM produit, editeur
            WHERE editeur.nom LIKE '%".$_POST["search_editeur"]."%'
						AND editeur.id_editeur = produit.id_editeur";
		$_SESSION["search_sql"] = $save_sql_search;
	}

  if(isset($_POST["search_reference"]) && $_POST["search_reference"] != '')
	{
    //on construit la requéte sql
    $save_sql_search = "SELECT produit.id_produit, produit.nom_fr as nom, produit.image
            FROM produit
            WHERE produit.reference LIKE '%".$_POST["search_reference"]."%'";
		$_SESSION["search_sql"] = $save_sql_search;
	}

  if(isset($_POST["search_isbn"]) && $_POST["search_isbn"] != '')
	{
    //on construit la requéte sql
    $save_sql_search = "SELECT produit.id_produit, produit.nom_fr as nom, produit.image
            FROM produit
            WHERE REPLACE(produit.isbn, '-','') LIKE '%" .$_POST["search_isbn"]."%'";
		$_SESSION["search_sql"] = $save_sql_search;
	}

  if(isset($_POST["search_date_before"]) && $_POST["search_date_before"] != '')
	{
    //on construit la requéte sql
    $save_sql_search = "SELECT produit.id_produit, produit.nom_fr as nom, produit.image
            FROM produit
            WHERE date_parution < '" . inverse_date($_POST["search_date_before"]) . "'";
		$_SESSION["search_sql"] = $save_sql_search;
	}

  if(isset($_POST["search_date_after"]) && $_POST["search_date_after"] != '')
	{
    //on construit la requéte sql
    $save_sql_search = "SELECT produit.id_produit, produit.nom_fr as nom, produit.image
            FROM produit
            WHERE date_parution > '" . inverse_date($_POST["search_date_after"]) . "'";
		$_SESSION["search_sql"] = $save_sql_search;
	}

  if(isset($_POST["search_incomplete"]) && $_POST["search_incomplete"] != '' && isset($_POST["search_submitbad"]))
	{
    //on construit la requéte sql
    $save_sql_search = "SELECT produit.id_produit, produit.nom_fr as nom, produit.image
            FROM produit
            WHERE nom_fr = ''
						or id_auteur = '0'
						or id_editeur = '0'
						or id_categorie = '0'
						or reference = ''
						or (prix = '' and prix != '0.00')
						or date_parution = ''
						or (nb_termes = '' and nb_termes <> 0)
						or (nb_pages = '' and nb_pages <> 0)
						";
		$_SESSION["search_sql"] = $save_sql_search;
	}

	if (isset($_SESSION["search_sql"]) && $_SESSION["search_sql"] != '')
	{
	}
	else
	{
  	$save_sql_search = "select id_produit, nom_fr as nom, produit.image from produit";
  	$_SESSION["search_sql"] = $save_sql_search;
	}

  $sql_search = $_SESSION["search_sql"]
	. " ORDER BY produit.nom_fr LIMIT " . (($_GET["page_courante"] - 1)
	 * $_GET["nbresult_par_page"]) . "," . $_GET["nbresult_par_page"] . ";";

	$sql_search_result = mysql_query($sql_search);
  //on récupére le nombre de résultat total de la requete
  if (!isset($_GET["nbresult"]))
  {
    $save_sql_search_result = mysql_query($save_sql_search);
    $nbresult = mysql_num_rows($save_sql_search_result);
  }
  else
    $nbresult = $_GET["nbresult"];

  if ($nbresult)
  {
		echo "<div id='searchresult'>";

		echo "<table class='table table-brdered'>";
    while($val_result = mysql_fetch_array($sql_search_result))
    {
	    echo "<tr>";
			echo "<td><a href='index2.php?page=showpic&produit=".$val_result["id_produit"]."' target='_blank'>";
			if($val_result["image"] == '1')
			{
	      			echo "<img src='css/modifimg.png' alt='' /></a></td>";
			}
			else
			{
			      echo "<img src='css/noimg.png' alt='' /></a></td>";
			}

			echo "<td><a href='index2.php?page=addproduct"
			. "&modifier=1&id_produit=" . $val_result["id_produit"] . "' target='_blank'>"
			. $val_result["nom"] .  "</a></td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "<div id='nbpage'>";
    for ($i = 1; $i <=  ($nbresult / $_GET["nbresult_par_page"]) + 1; $i++)
    {
      echo "<a href='index2.php?page=searchproduct&showresult=1"
			. "&page_courante=$i&nbresult_par_page=25&nbresult=$nbresult' target='_blank'>" . $i . "</a> ";
    }
    echo "</div>";
	echo "</div>";
  }
  else
    echo "pas de résultat";
}
echo "<div class='spacer'></div>";
?>
