<?php
include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");

$_SESSION["product_realname"] = html_entity_decode($_POST["product_realname"]);
$_SESSION["product_name_fr"] = html_entity_decode($_POST["product_name_fr"]);
$_SESSION["product_name_de"] = html_entity_decode($_POST["product_name_de"]);
$_SESSION["product_name_es"] = html_entity_decode($_POST["product_name_es"]);
$_SESSION["product_name_it"] = html_entity_decode($_POST["product_name_it"]);
$_SESSION["product_name_en"] = html_entity_decode($_POST["product_name_en"]);
$_SESSION["product_auteur"] = html_entity_decode($_POST["product_auteur"]);
$_SESSION["product_auteur_choice"] = html_entity_decode($_POST["product_auteur_choice"]);
$_SESSION["product_type"] = html_entity_decode($_POST["product_type"]);
$_SESSION["product_remise_lvl"] = html_entity_decode($_POST["product_remise_lvl"]);
$_SESSION["product_editeur"] = html_entity_decode($_POST["product_editeur"]);
$_SESSION["product_editeur_choice"] = html_entity_decode($_POST["product_editeur_choice"]);
$_SESSION["product_categorie"] = html_entity_decode($_POST["product_categorie"]);
$_SESSION["product_reference"] = html_entity_decode($_POST["product_reference"]);
$_SESSION["product_issn"] = html_entity_decode($_POST["product_issn"]);
$_SESSION["product_isbn"] = html_entity_decode($_POST["product_isbn"]);
$_SESSION["product_page"] = html_entity_decode($_POST["product_page"]);
$_SESSION["product_terme"] = html_entity_decode($_POST["product_terme"]);
$_SESSION["product_poid"] = html_entity_decode($_POST["product_poid"]);
$_SESSION["product_actif"] = html_entity_decode($_POST["product_actif"]);
$_SESSION["product_affaire"] = html_entity_decode($_POST["product_affaire"]);
$_SESSION["product_ofmonth"] = html_entity_decode($_POST["product_ofmonth"]);
$_SESSION["product_carrousel"] = html_entity_decode($_POST["product_carrousel"]);
$_SESSION["product_occasion"] = html_entity_decode($_POST["product_occasion"]);



if (isset($_SESSION["product_auteur"]) && isset($_SESSION["product_auteur_choice"]) && $_SESSION["product_auteur"] != '')
	$_SESSION["product_auteur_choice"] = '';
if (isset($_SESSION["product_editeur"]) && isset($_SESSION["product_editeur_choice"]) && $_SESSION["product_editeur"] != '')
	$_SESSION["product_editeur_choice"] = '';

//Nombre de champs langue source langue cible à traiter
$nblangue = 15;
for ($d=1; $d < ($nblangue + 1) ;$d++)
{
  if (isset($_POST["product_source$d"]))
	$_SESSION["product_source$d"] = $_POST["product_source$d"];
  else
    $_SESSION["product_source$d"] = "";

  if (isset($_POST["product_cible$d"]))
	$_SESSION["product_cible$d"] = $_POST["product_cible$d"];
  else
    $_SESSION["product_cible$d"] = "";
}

if (isset($_POST["product_index"]))
{
	$_SESSION["product_index"] = $_POST["product_index"];
}
else
{
	$_SESSION["product_index"] = '';
}
if (isset($_POST["product_libraire"]))
{
	$_SESSION["product_libraire"] = $_POST["product_libraire"];
}
else
{
	$_SESSION["product_libraire"] = '';
}

$_SESSION["product_description_fr"] = html_entity_decode($_POST["product_description_fr"]);
$_SESSION["product_description_de"] = html_entity_decode($_POST["product_description_de"]);
$_SESSION["product_description_es"] = html_entity_decode($_POST["product_description_es"]);
$_SESSION["product_description_it"] = html_entity_decode($_POST["product_description_it"]);
$_SESSION["product_description_en"] = html_entity_decode($_POST["product_description_en"]);

$_SESSION["product_divers_fr"] = html_entity_decode($_POST["product_divers_fr"]);
$_SESSION["product_divers_de"] = html_entity_decode($_POST["product_divers_de"]);
$_SESSION["product_divers_es"] = html_entity_decode($_POST["product_divers_es"]);
$_SESSION["product_divers_it"] = html_entity_decode($_POST["product_divers_it"]);
$_SESSION["product_divers_en"] = html_entity_decode($_POST["product_divers_en"]);


$_SESSION["product_prix"] = html_entity_decode($_POST["product_prix"]);
$_SESSION["product_prix_editeur"] = html_entity_decode($_POST["product_prix_editeur"]);
$_SESSION["product_rabais"] = html_entity_decode($_POST["product_rabais"]);
$_SESSION["product_delai_reapprovisionnement"] = html_entity_decode($_POST["product_delai_reapprovisionnement"]);
$_SESSION["product_nb_dispo"] = html_entity_decode($_POST["product_nb_dispo"]);
if (isset($_POST["product_disponible"]))
{
	$_SESSION["product_disponible"] = html_entity_decode($_POST["product_disponible"]);
}
else
{
	$_SESSION["product_disponible"] = '';
}
$_SESSION["product_url"] = html_entity_decode($_POST["product_url"]);
$_SESSION["product_pdfap"] = html_entity_decode($_POST["product_pdfap"]);
$_SESSION["product_jourparution"] = html_entity_decode($_POST["product_jourparution"]);
$_SESSION["product_moisparution"] = html_entity_decode($_POST["product_moisparution"]);
$_SESSION["product_anneeparution"] = html_entity_decode($_POST["product_anneeparution"]);
if (isset($_POST["product_avant"]))
{
	$_SESSION["product_avant"] = $_POST["product_avant"];
}
else
{
	$_SESSION["product_avant"] = '';
}

//-------------------------------------------------------------------
// On vérifie les champs
include ("include/function.inc.php");
$error = "";
if(checkname($_SESSION["product_realname"]))
  $error .= "Nom original invalide<br />";
if(checkname($_SESSION["product_name_fr"]))
  $error .= "Nom d'ouvrage (fr) invalide<br />";
if(checkname($_SESSION["product_name_de"]))
  $error .= "Nom d'ouvrage (de) invalide<br />";
if(checkname($_SESSION["product_name_es"]))
  $error .= "Nom d'ouvrage (es) invalide<br />";
if(checkname($_SESSION["product_name_it"]))
  $error .= "Nom d'ouvrage (it) invalide<br />";
if(checkname($_SESSION["product_name_en"]))
  $error .= "Nom d'ouvrage (en) invalide<br />";

if(checkauteur($_SESSION["product_auteur"])&& !$_SESSION["product_auteur_choice"])
  $error .= "Nom d'auteur invalide<br />";
if(checkauteur($_SESSION["product_editeur"])&& !$_SESSION["product_editeur_choice"])
  $error .= "Nom d'editeur invalide<br />";
if(checkcategorie($_SESSION["product_auteur_choice"]) && $_SESSION["product_auteur_choice"])
  $error .= "Auteur choisie invalide<br />";
if(checkcategorie($_SESSION["product_categorie"]))
  $error .= "Catégorie choisie invalide<br />";
if(checkreference($_SESSION["product_reference"]))
  $error .= "Référence invalide<br />";
if(checkpage($_SESSION["product_page"]))
  $error .= "Nombre de pages invalide<br />";
if(checkpage($_SESSION["product_terme"]))
  $error .= "Nombre de termes invalides<br />";
if(isset($_SESSION["product_poid"]) && $_SESSION["product_poid"] != '' && checkpoid($_SESSION["product_poid"]))
  $error .= "Poid invalide<br />";
if(checkprix($_SESSION["product_prix"]))
  $error .= "Prix invalide<br />";
if(isset($_SESSION["product_prix_editeur"]) && $_SESSION["product_prix_editeur"] != '' && checkprix($_SESSION["product_prix_editeur"]))
  $error .= "Prix éditeur invalide<br />";
if(isset($_SESSION["product_rabais"]) && $_SESSION["product_rabais"] != '' && checkprix($_SESSION["product_rabais"]))
  $error .= "Rabais invalide<br />";
if(isset($_SESSION["product_delai_reapprovisionnement"]) && $_SESSION["product_delai_reapprovisionnement"] != '' && checkdelai($_SESSION["product_delai_reapprovisionnement"]))
  $error .= "Délai de réapprovisionnement invalide<br />";
if (isset($_SESSION["product_nb_dispo"]) && $_SESSION["product_nb_dispo"] != '' && checknbdispo($_SESSION["product_nb_dispo"]))
  $error .= "Nombre d'ouvrages disponibles invalide<br />";
if (isset($_SESSION["product_url"]) && $_SESSION["product_url"] != '' && checkurl($_SESSION["product_url"]))
  $error .= "Url invalide<br />";
  if (isset($_SESSION["product_pdfap"]) && $_SESSION["product_pdfap"] != '' && checkurl($_SESSION["product_pdfap"]))
  $error .= "Url invalide<br />";

$une_erreur = "";

if(checkjourparution($_SESSION["product_jourparution"]))
  $error .= "Jour de parution invalide<br />";
if(checkmoisparution($_SESSION["product_moisparution"]))
  $error .= "Mois de parution invalide<br />";
if(checkanneeparution($_SESSION["product_anneeparution"]))
  $error .= "Année de parution invalide<br />";

//-------------------------------------------------------------------
//Si on veut ajouter le produit
if ($_POST["product_submitaddproduct"] == "Ajouter" and $error == "")
{
  //ajout de l'auteur dans la table auteur si l'auteur n'existe pas
	
	// On verifie que l'auteur n'existe pas
	$sql_auteurexist = "SELECT *
											FROM auteur
											WHERE nom = '".addslashes($_SESSION["product_auteur"])."'
											;";
	$sql_auteurexist_result = mysql_query($sql_auteurexist);
	if(mysql_num_rows($sql_auteurexist_result))
	{
		$val_auteurexist = mysql_fetch_array($sql_auteurexist_result);
		$_SESSION['product_auteur_choice'] = $val_auteurexist['id_auteur'];
	}
	else
	{
    if($_SESSION["product_auteur"])
    {
      $sql_addauteur = "INSERT INTO auteur(
                                          id_auteur,
                                          nom
                                          )
                                    VALUES(
                                          '',
                                          '" . addslashes($_SESSION["product_auteur"]) . "'
                                          )
                        ;";
      mysql_query($sql_addauteur);
  
      //recuperation de l'id de l'auteur
      $_SESSION["product_auteur_choice"] = mysql_insert_id();
    }
  }
  //ajout de l'editeur dans la table editeur si l'editeur n'existe pas
	$sql_editeurexist = "SELECT *
											FROM editeur
											WHERE nom = '".addslashes($_SESSION["product_editeur"])."'
											;";
	$sql_editeurexist_result = mysql_query($sql_editeurexist);
	if(mysql_num_rows($sql_editeurexist_result))
	{
		$val_editeurexist = mysql_fetch_array($sql_editeurexist_result);
		$_SESSION['product_editeur_choice'] = $val_editeurexist['id_editeur'];
	}
	else
	{
    if($_SESSION["product_editeur"])
    {
      $sql_addediteur = "INSERT INTO editeur(
                                          id_editeur,
                                          nom
                                          )
                                    VALUES(
                                          '',
                                          '" . addslashes($_SESSION["product_editeur"]) . "'
                                          )
                        ;";
      mysql_query($sql_addediteur);
  
      //recuperation de l'id de l'editeur
      $_SESSION["product_editeur_choice"] = mysql_insert_id();
    }  
	}

	//On ajoute le produit
  $sql_addproduct = "INSERT INTO produit(
                                        id_produit,
                                        id_auteur,
                                        id_categorie,
                                        id_editeur,
                                        id_type,
                                        reference,
                                        issn,
                                        isbn,
                                        realname,
                                        nom_fr,
                                        nom_de,
                                        nom_es,
                                        nom_it,
                                        nom_en,
                                        langues,
                                        ind,
                                        nb_pages,
                                        nb_termes,
                                        info_divers_fr,
                                        info_divers_de,
                                        info_divers_es,
                                        info_divers_it,
                                        info_divers_en,
																				description_fr,
																				description_de,
																				description_es,
																				description_it,
																				description_en,
                                        prix,
                                        prix_editeur,
                                        rabais,
                                        nb_dispo,
                                        disponible,
                                        delai_reapprovisionnement,
                                        poid,
                                        date_parution,
                                        date_insertion,
                                        url,
                                        pdfap,
                                        libraire,
                                        sommeil,
                                        affaire,
                                        remise_lvl,
                                        date_modif,
																				modif_desc,
																				modif_info,
																				modif_name,
																				monthbook,
																				carrousel,
																				occasion
																				)
                                  VALUES
                                        (
                                        '',
                                        '" . addslashes($_SESSION["product_auteur_choice"]) . "',
                                        '" . addslashes($_SESSION["product_categorie"]) . "',
                                        '" . addslashes($_SESSION["product_editeur_choice"]) . "',
                                        '" . addslashes($_SESSION["product_type"]) . "',
                                        '" . addslashes($_SESSION["product_reference"]) . "',
                                        '" . addslashes($_SESSION["product_issn"]) . "',
                                        '" . addslashes($_SESSION["product_isbn"]) . "',
                                        '" . addslashes($_SESSION["product_realname"]) . "',
                                        '" . addslashes($_SESSION["product_name_fr"]) . "',
                                        '" . addslashes($_SESSION["product_name_de"]) . "',
                                        '" . addslashes($_SESSION["product_name_es"]) . "',
                                        '" . addslashes($_SESSION["product_name_it"]) . "',
                                        '" . addslashes($_SESSION["product_name_en"]) . "',
                                        '',
                                        '" . addslashes($_SESSION["product_index"]) . "',
                                        '" . addslashes($_SESSION["product_page"]) . "',
                                        '" . addslashes($_SESSION["product_terme"]) . "',
                                        '" . addslashes($_SESSION["product_divers_fr"]) . "',
                                        '" . addslashes($_SESSION["product_divers_de"]) . "',
                                        '" . addslashes($_SESSION["product_divers_es"]) . "',
                                        '" . addslashes($_SESSION["product_divers_it"]) . "',
                                        '" . addslashes($_SESSION["product_divers_en"]) . "',
                                        '" . addslashes($_SESSION["product_description_fr"]) . "',
                                        '" . addslashes($_SESSION["product_description_de"]) . "',
                                        '" . addslashes($_SESSION["product_description_es"]) . "',
                                        '" . addslashes($_SESSION["product_description_it"]) . "',
                                        '" . addslashes($_SESSION["product_description_en"]) . "',
                                        '" . addslashes($_SESSION["product_prix"]) . "',
                                        '" . addslashes($_SESSION["product_prix_editeur"]) . "',
                                        '" . addslashes($_SESSION["product_rabais"]) . "',
                                        '" . addslashes($_SESSION["product_nb_dispo"]) . "',
                                        '" . addslashes($_SESSION["product_disponible"]) . "',
                                        '" . addslashes($_SESSION["product_delai_reapprovisionnement"]) . "',
                                        '" . addslashes($_SESSION["product_poid"]) . "',
                                        '" . addslashes($_SESSION["product_anneeparution"]) . "-" . addslashes($_SESSION["product_moisparution"]) . "-" . addslashes($_SESSION["product_jourparution"]) . "',
                                        '" . date("Y-m-d") . "',
                                        '" . addslashes($_SESSION["product_url"]). "',
                                        '" . addslashes($_SESSION["product_pdfap"]). "',
                                        '" . addslashes($_SESSION["product_libraire"]). "',
                                        '" . addslashes($_SESSION["product_actif"]). "',
                                        '" . addslashes($_SESSION["product_affaire"]). "',
                                        '" . addslashes($_SESSION["product_remise_lvl"]). "',
                                        '" . date("Y-m-d") . "',
                                        '" . date("Y-m-d") . "',
                                        '" . date("Y-m-d") . "',
                                        '" . date("Y-m-d") . "',
                                        '" . addslashes($_SESSION["product_ofmonth"]) . "',
                                        '" . addslashes($_SESSION["product_carrousel"]) . "',
                                        '" . addslashes($_SESSION["product_occasion"]) . "'

                                        
																				)
                    ;";
  mysql_query($sql_addproduct) or die(mysql_error());

  //recuperation de l'id du produit inséré
  $id_newproduct = mysql_insert_id();

  //Insertion de l'id des langues séléctionné et de l'id du produit dans la table langue_produit
  for ($d=1; $d < ($nblangue + 1) ;$d++)
  {
    if ((isset($_SESSION["product_source$d"]) or isset($_SESSION["product_cible$d"])) && ($_SESSION["product_source$d"] != "" or $_SESSION["product_cible$d"] != ""))
	{
      $sql_addlangue = "INSERT INTO langue_produit(
                                                   id_produit,
                                                   id_langue_source,
                                                   id_langue_cible
                                                  )
                                            VALUES(
                                                   '" . addslashes($id_newproduct) . "',
                                                   '" . addslashes($_SESSION["product_source$d"]) . "',
                                                   '" . addslashes($_SESSION["product_cible$d"]) . "'
                                                  )
                       ;";
      mysql_query($sql_addlangue);
    }
  }

  //On met le produit dans le vitrine ou on non
  if ($_SESSION["product_avant"] == 1)
  {
		$sql_vitrine = 'SELECT count(*) as total FROM vitrine;';
		$res_vitrine = mysql_query($sql_vitrine);
		$val_vitrine = mysql_fetch_assoc($res_vitrine);
		$pos = $val_vitrine['total'] + 1;
		 
    //On l'ajoute
    $sql_ajoutvitrine = "INSERT INTO vitrine(
                                            id_vitrine,
                                            id_produit,
																						pos
                                            )
                                       VALUES(
                                              '',
                                              '" . addslashes($id_newproduct) . "',
																							'$pos'
                                             )
                        ;";
    mysql_query($sql_ajoutvitrine);
  }


  //on efface les sessions
  $id_newproduct = "";
  for ($d=1; $d < ($nblangue + 1) ;$d++)
  {
    $_SESSION["product_source$d"] = "";
    $_SESSION["product_cible$d"] = "";
  }
  $_SESSION["product_realname"] = "";
  $_SESSION["product_name_fr"] = "";
  $_SESSION["product_name_de"] = "";
  $_SESSION["product_name_es"] = "";
  $_SESSION["product_name_it"] = "";
  $_SESSION["product_name_en"] = "";
  
	$_SESSION["product_type"] = "";
  $_SESSION["product_auteur"] = "";
  $_SESSION["product_auteur_choice"] = "";
  $_SESSION["product_editeur"] = "";
  $_SESSION["product_editeur_choice"] = "";
  $_SESSION["product_categorie"] = "";
  $_SESSION["product_reference"] = "";
  $_SESSION["product_issn"] = "";
  $_SESSION["product_isbn"] = "";
  $_SESSION["product_page"] = "";
  $_SESSION["product_terme"] = "";
  $_SESSION["product_poid"] = "";
  $_SESSION["product_langue"] = "";
  $_SESSION["product_index"] = "";
  $_SESSION["product_libraire"] = "";
  
	$_SESSION["product_description_fr"] = "";
  $_SESSION["product_description_de"] = "";
  $_SESSION["product_description_es"] = "";
  $_SESSION["product_description_it"] = "";
  $_SESSION["product_description_en"] = "";
  
	$_SESSION["product_divers_fr"] = "";
  $_SESSION["product_divers_de"] = "";
  $_SESSION["product_divers_es"] = "";
  $_SESSION["product_divers_it"] = "";
  $_SESSION["product_divers_en"] = "";
  
	$_SESSION["product_prix"] = "";
  $_SESSION["product_prix_editeur"] = "";
  $_SESSION["product_rabais"] = "";
  $_SESSION["product_delai_reapprovisionnement"] = "";
  $_SESSION["product_nb_dispo"] = "";
  $_SESSION["product_disponible"] = "";
  $_SESSION["product_url"] = "";
    $_SESSION["product_pdfap"] = "";
  $_SESSION["product_jourparution"] = '';
  $_SESSION["product_moisparution"] = "";
  $_SESSION["product_anneeparution"] = "";
  $_SESSION["product_avant"] = "";
  $_SESSION["product_actif"] = "";
  $_SESSION["product_affaire"] = "";
	$_SESSION["product_ofmonth"] = "";
	$_SESSION["product_carrousel"] = "";
	$_SESSION["product_occasion"] = "";
	$_SESSION["product_remise_lvl"] = "";
  $_SESSION["product_error"] = "";

  $redirection = "index2.php?page=confirmajout&id_produit=" . $_GET["id_produit"];
  header("location: $redirection");
}

//-------------------------------------------------------------------
//Si on veut modifier le produit existant
if ($_POST["product_submitaddproduct"] == "Enregistrer les modifications" and $error == "")
{
  // on supprime les slashs pour l'affichage
  $_SESSION["product_realname"] = stripslashes($_SESSION["product_realname"]);
  $_SESSION["product_name_fr"] = stripslashes($_SESSION["product_name_fr"]);
  $_SESSION["product_name_de"] = stripslashes($_SESSION["product_name_de"]);
  $_SESSION["product_name_es"] = stripslashes($_SESSION["product_name_es"]);
  $_SESSION["product_name_it"] = stripslashes($_SESSION["product_name_it"]);
  $_SESSION["product_name_en"] = stripslashes($_SESSION["product_name_en"]);
	$_SESSION["product_auteur"] = stripslashes($_SESSION["product_auteur"]);
  $_SESSION["product_editeur"] = stripslashes($_SESSION["product_editeur"]);
  
  $_SESSION["product_reference"] = stripslashes($_SESSION["product_reference"]);
  $_SESSION["product_description_fr"] = stripslashes($_SESSION["product_description_fr"]);
  $_SESSION["product_description_de"] = stripslashes($_SESSION["product_description_de"]);
  $_SESSION["product_description_es"] = stripslashes($_SESSION["product_description_es"]);
  $_SESSION["product_description_it"] = stripslashes($_SESSION["product_description_it"]);
  $_SESSION["product_description_en"] = stripslashes($_SESSION["product_description_en"]);
  
	$_SESSION["product_divers_fr"] = stripslashes($_SESSION["product_divers_fr"]);
	$_SESSION["product_divers_de"] = stripslashes($_SESSION["product_divers_de"]);
	$_SESSION["product_divers_es"] = stripslashes($_SESSION["product_divers_es"]);
	$_SESSION["product_divers_it"] = stripslashes($_SESSION["product_divers_it"]);
	$_SESSION["product_divers_en"] = stripslashes($_SESSION["product_divers_en"]);
  
	$_SESSION["product_url"] = stripslashes($_SESSION["product_url"]);
	$_SESSION["product_url"] = stripslashes($_SESSION["product_pdfap"]);


	
  //ajout de l'auteur dans la table auteur si l'auteur n'existe pas

	// On verifie que l'auteur n'existe pas
	$sql_auteurexist = "SELECT *
											FROM auteur
											WHERE nom = '".addslashes($_SESSION["product_auteur"])."'
											;";
	$sql_auteurexist_result = mysql_query($sql_auteurexist);
	if(mysql_num_rows($sql_auteurexist_result))
	{
		$val_auteurexist = mysql_fetch_array($sql_auteurexist_result);
		$_SESSION['product_auteur_choice'] = $val_auteurexist['id_auteur'];
	}
	else
	{
    if($_SESSION["product_auteur"])
    {
      $sql_addauteur = "INSERT INTO auteur(
                                          id_auteur,
                                          nom
                                          )
                                    VALUES(
                                          '',
                                          '" . addslashes($_SESSION["product_auteur"]) . "'
                                          )
                        ;";
      mysql_query($sql_addauteur);
  
      //recuperation de l'id de l'auteur
      $_SESSION["product_auteur_choice"] = mysql_insert_id();
    }
	}

  //ajout de l'editeur dans la table editeur si l'editeur n'existe pas
	$sql_editeurexist = "SELECT *
											FROM editeur
											WHERE nom = '".addslashes($_SESSION["product_editeur"])."'
											;";
	$sql_editeurexist_result = mysql_query($sql_editeurexist);
	if(mysql_num_rows($sql_editeurexist_result) && !$_SESSION['product_editeur_choice'])
	{
		$val_editeurexist = mysql_fetch_array($sql_editeurexist_result);
		$_SESSION['product_editeur_choice'] = $val_editeurexist['id_editeur'];
	}
	else
	{
    if($_SESSION["product_editeur"])
    {
      $sql_addediteur = "INSERT INTO editeur(
                                          id_editeur,
                                          nom
                                          )
                                    VALUES(
                                          '',
                                          '" . addslashes($_SESSION["product_editeur"]) . "'
                                          )
                        ;";
      mysql_query($sql_addediteur);
  
      //recuperation de l'id de l'editeur
      $_SESSION["product_editeur_choice"] = mysql_insert_id();
    }
	}
	
		
	//Name, description or info_divers field has been modified ?
	if (is_modified($_SESSION["product_realname"], 'realname', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_name');
	if (is_modified($_SESSION["product_name_fr"], 'nom_fr', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_name');
	if (is_modified($_SESSION["product_name_de"], 'nom_de', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_name');
	if (is_modified($_SESSION["product_name_es"], 'nom_es', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_name');
	if (is_modified($_SESSION["product_name_it"], 'nom_it', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_name');
	if (is_modified($_SESSION["product_name_en"], 'nom_en', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_name');
	
	if (is_modified($_SESSION["product_description_fr"], 'description_fr', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_desc');
	if (is_modified($_SESSION["product_description_de"], 'description_de', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_desc');
	if (is_modified($_SESSION["product_description_es"], 'description_es', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_desc');
	if (is_modified($_SESSION["product_description_it"], 'description_it', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_desc');
	if (is_modified($_SESSION["product_description_en"], 'description_en', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_desc');

	if (is_modified($_SESSION["product_divers_fr"], 'info_divers_fr', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_info');
	if (is_modified($_SESSION["product_divers_de"], 'info_divers_de', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_info');
	if (is_modified($_SESSION["product_divers_es"], 'info_divers_es', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_info');
	if (is_modified($_SESSION["product_divers_it"], 'info_divers_it', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_info');
	if (is_modified($_SESSION["product_divers_en"], 'info_divers_en', $_GET["id_produit"]))
		update_modif_date($_GET["id_produit"], 'modif_info');
	
	//On modifie les informations du produit
  $sql_addproduct = "UPDATE `produit`
                     SET
                     id_auteur = '" . addslashes($_SESSION["product_auteur_choice"]) . "',
                     id_categorie = '" . addslashes($_SESSION["product_categorie"]) . "',
                     id_editeur = '" . addslashes($_SESSION["product_editeur_choice"]) . "',
                     id_type = '" . addslashes($_SESSION["product_type"]) . "',
                     reference = '" . addslashes($_SESSION["product_reference"]) . "',
                     issn = '" . addslashes($_SESSION["product_issn"]) . "',
                     isbn = '" . addslashes($_SESSION["product_isbn"]) . "',
                     realname = '" . addslashes($_SESSION["product_realname"]) . "',
                     nom_fr = '" . addslashes($_SESSION["product_name_fr"]) . "',
                     nom_de = '" . addslashes($_SESSION["product_name_de"]) . "',
                     nom_es = '" . addslashes($_SESSION["product_name_es"]) . "',
                     nom_it = '" . addslashes($_SESSION["product_name_it"]) . "',
                     nom_en = '" . addslashes($_SESSION["product_name_en"]) . "',
                     ind = '" . addslashes($_SESSION["product_index"]) . "',
                     nb_pages = '" . addslashes($_SESSION["product_page"]) . "',
                     nb_termes = '" . addslashes($_SESSION["product_terme"]) . "',
                     info_divers_fr = '" . addslashes($_SESSION["product_divers_fr"]) . "',
                     info_divers_de = '" . addslashes($_SESSION["product_divers_de"]) . "',
                     info_divers_es = '" . addslashes($_SESSION["product_divers_es"]) . "',
                     info_divers_it = '" . addslashes($_SESSION["product_divers_it"]) . "',
                     info_divers_en = '" . addslashes($_SESSION["product_divers_en"]) . "',
                     description_fr = '" . addslashes($_SESSION["product_description_fr"]) . "',
                     description_de = '" . addslashes($_SESSION["product_description_de"]) . "',
                     description_es = '" . addslashes($_SESSION["product_description_es"]) . "',
                     description_it = '" . addslashes($_SESSION["product_description_it"]) . "',
                     description_en = '" . addslashes($_SESSION["product_description_en"]) . "',
                     prix = '" . addslashes($_SESSION["product_prix"]) . "',
                     prix_editeur = '" . addslashes($_SESSION["product_prix_editeur"]) . "',
                     rabais = '" . addslashes($_SESSION["product_rabais"]) . "',
                     delai_reapprovisionnement = '" . addslashes($_SESSION["product_delai_reapprovisionnement"]) . "',
                     date_parution = '" . addslashes($_SESSION["product_anneeparution"]) . "-" . addslashes($_SESSION["product_moisparution"]) . "-" . addslashes($_SESSION["product_jourparution"]) . "',
                     poid = '" . addslashes($_SESSION["product_poid"]). "',
                     nb_dispo = '" . addslashes($_SESSION["product_nb_dispo"]). "',
                     disponible = '" . addslashes($_SESSION["product_disponible"]). "',
                     url = '" . addslashes($_SESSION["product_url"]). "',
                     pdfap = '" . addslashes($_SESSION["product_pdfap"]). "',
                     libraire = '" . addslashes($_SESSION["product_libraire"]). "',
                     sommeil = '" . addslashes($_SESSION["product_actif"]). "',
                     affaire = '" . addslashes($_SESSION["product_affaire"]). "',
                     remise_lvl = '" . addslashes($_SESSION["product_remise_lvl"]). "',
                     date_modif = '" . date("Y-m-d") . "',
                     monthbook = '" . addslashes($_SESSION["product_ofmonth"]) . "',
                     carrousel = '" . addslashes($_SESSION["product_carrousel"]) . "',
                     occasion = '" . addslashes($_SESSION["product_occasion"]) . "'
                     WHERE `id_produit` = '" . addslashes($_GET["id_produit"]) . "' LIMIT 1
                    ;";
  mysql_query($sql_addproduct);

  //On supprime les anciennes langues associées au produit
  $sql_del_lang = "DELETE FROM langue_produit
                   WHERE id_produit = '" . $_GET["id_produit"] . "'
                  ;";
  mysql_query($sql_del_lang);

  //Insertion de l'id des langues séléctionné et de l'id du produit dans la table langue_produit
  for ($d=1; $d < ($nblangue + 1) ;$d++)
  {
    if ((isset($_SESSION["product_source$d"]) or isset($_SESSION["product_cible$d"])) && ($_SESSION["product_source$d"] != "" or $_SESSION["product_cible$d"] != ""))
	{
      $sql_addlangue = "INSERT INTO langue_produit(
                                                   id_produit,
                                                   id_langue_source,
                                                   id_langue_cible
                                                  )
                                            VALUES(
                                                   '" . $_GET["id_produit"] . "',
                                                   '" . $_SESSION["product_source$d"] . "',
                                                   '" . $_SESSION["product_cible$d"] . "'
                                                  )
                       ;";
      mysql_query($sql_addlangue);
    }
  }

  //On met le produit dans le vitrine ou on l'en retire

  //On regarde si le produit est déja en vitrine
  $sql_verifpresent = "SELECT *
                       FROM vitrine
                       WHERE id_produit = '" . $_GET["id_produit"] . "'
                      ;";
  $sql_verifpresent_result = mysql_query($sql_verifpresent);
  if ($_SESSION["product_avant"] == 1)
  {
    //S'il n'est pas en vitrine, on l'ajoute
    if (!mysql_num_rows($sql_verifpresent_result))
    {
			$sql_vitrine = 'SELECT count(*) as total FROM vitrine;';
			$res_vitrine = mysql_query($sql_vitrine);
			$val_vitrine = mysql_fetch_assoc($res_vitrine);
			$pos = $val_vitrine['total'] + 1;

      $sql_ajoutvitrine = "INSERT INTO vitrine(
                                              id_vitrine,
                                              id_produit,
																							pos
                                             )
                                       VALUES(
                                              '',
                                              '" . $_GET["id_produit"] . "',
																							'$pos'
                                             )
                         ;";
      mysql_query($sql_ajoutvitrine);
    }
  }
  else
  {
	
    //On retire le produit de la vitrine
    $sql_enlevevitrine = "DELETE FROM vitrine
                          WHERE id_produit = '" . $_GET["id_produit"] . "'
                          LIMIT 1
                         ;";
    mysql_query($sql_enlevevitrine);
  }
  
	//On efface les sessions
  $id_newproduct = "";

  $_SESSION["product_realname"] = "";
  $_SESSION["product_name_fr"] = "";
  $_SESSION["product_name_de"] = "";
  $_SESSION["product_name_es"] = "";
  $_SESSION["product_name_it"] = "";
  $_SESSION["product_name_en"] = "";
  
	$_SESSION["product_type"] = "";
  $_SESSION["product_auteur"] = "";
  $_SESSION["product_auteur_choice"] = "";
  $_SESSION["product_editeur"] = "";
  $_SESSION["product_editeur_choice"] = "";
  $_SESSION["product_categorie"] = "";
  $_SESSION["product_reference"] = "";
  $_SESSION["product_issn"] = "";
  $_SESSION["product_isbn"] = "";
  $_SESSION["product_page"] = "";
  $_SESSION["product_terme"] = "";
  $_SESSION["product_poid"] = "";
  $_SESSION["product_libraire"] = "";
  for ($d=1; $d < ($nblangue + 1) ;$d++)
  {
    $_SESSION["product_source$d"] = "";
    $_SESSION["product_cible$d"] = "";
  }
  $_SESSION["product_index"] = "";
  $_SESSION["product_description_fr"] = "";
  $_SESSION["product_description_de"] = "";
  $_SESSION["product_description_es"] = "";
  $_SESSION["product_description_it"] = "";
  $_SESSION["product_description_en"] = "";
  
	$_SESSION["product_divers_fr"] = "";
  $_SESSION["product_divers_de"] = "";
  $_SESSION["product_divers_es"] = "";
  $_SESSION["product_divers_it"] = "";
  $_SESSION["product_divers_en"] = "";
	
	$_SESSION["product_prix"] = "";
  $_SESSION["product_prix_editeur"] = "";
  $_SESSION["product_rabais"] = "";
  $_SESSION["product_delai_reapprovisionnement"] = "";
  $_SESSION["product_nb_dispo"] = "";
  $_SESSION["product_disponible"] = "";
  $_SESSION["product_url"] = "";
  $_SESSION["product_pdfap"] = "";
  $_SESSION["product_jourparution"] = '';
  $_SESSION["product_moisparution"] = "";
  $_SESSION["product_anneeparution"] = "";
  $_SESSION["product_avant"] = "";
  $_SESSION["product_actif"] = "";
  $_SESSION["product_affaire"] = "";
	$_SESSION["product_ofmonth"] = "";
$_SESSION["product_carrousel"] = "";
$_SESSION["product_occasion"] = "";
  $_SESSION["product_remise_lvl"] = "";
  $_SESSION["product_error"] = "";

  //on envoier sur une page confirmant la mise Ó jour du produit
  $redirection = "index2.php?page=confirmmodif&id_produit=" . $_GET["id_produit"];
  header("location: $redirection");
}

//-------------------------------------------------------------------
//Si on veut traduire le produit
if ($_POST["product_submittradproduct"] == "traduire" and $error == "")
{
	// on supprime les slashs pour l'affichage
	$_SESSION["product_name_fr"] = stripslashes($_SESSION["product_name_fr"]);
	$_SESSION["product_description_fr"] = stripslashes($_SESSION["product_description_fr"]);
	$_SESSION["product_divers_fr"] = stripslashes($_SESSION["product_divers_fr"]);
  
	$nom_fr =  $_SESSION["product_name_fr"] = utf8_encode($_SESSION["product_name_fr"]);
	$des_fr =   $_SESSION["product_description_fr"] = utf8_encode($_SESSION["product_description_fr"]);
	$info_divers_fr = $_SESSION["product_divers_fr"] = utf8_encode($_SESSION["product_divers_fr"]);

	require("GTranslate.php");

	// traduction titre
	$gt = new Gtranslate;
	$nom_en=$gt->fr_to_en("$nom_fr");
	$nom_en;

	$nom_it=$gt->fr_to_it("$nom_fr");
	$nom_it;

	$nom_es=$gt->fr_to_es("$nom_fr");
	$nom_es;

	$nom_de=$gt->fr_to_de("$nom_fr");
	$nom_de;

	// traduction description
	$des_en=$gt->fr_to_en("$des_fr");
	$des_en;

	$des_it=$gt->fr_to_it("$des_fr");
	$des_it;

	$des_es=$gt->fr_to_es("$des_fr");
	$des_es;

	$des_de=$gt->fr_to_de("$des_fr");
	$des_de;

	// traduction divers
	$info_divers_en=$gt->fr_to_en("$info_divers_fr");
	$info_divers_en;

	$info_divers_it=$gt->fr_to_it("$info_divers_fr");
	$info_divers_it;

	$info_divers_es=$gt->fr_to_es("$info_divers_fr");
	$info_divers_es;

	$info_divers_de=$gt->fr_to_de("$info_divers_fr");
	$info_divers_de;
	
	//On modifie les informations du produit
		$sql_tradproduct = "UPDATE `produit`
                     SET
                     nom_fr = '".addslashes(utf8_decode($nom_fr))."',
                     nom_de = '".addslashes(utf8_decode($nom_de))."',
                     nom_es = '".addslashes(utf8_decode($nom_es))."',
                     nom_it = '".addslashes(utf8_decode($nom_it))."',
                     nom_en = '".addslashes(utf8_decode($nom_en))."',
                     info_divers_fr = '" .addslashes(utf8_decode($info_divers_fr)). "',
                     info_divers_de = '" .addslashes(utf8_decode($info_divers_de)). "',
                     info_divers_es = '" .addslashes(utf8_decode($info_divers_es)). "',
                     info_divers_it = '" .addslashes(utf8_decode($info_divers_it)). "',
                     info_divers_en = '" .addslashes(utf8_decode($info_divers_en)). "',
                     description_fr = '" .addslashes(utf8_decode($des_fr)). "',
                     description_de = '" .addslashes(utf8_decode($des_de)). "',
                     description_es = '" .addslashes(utf8_decode($des_es)). "',
                     description_it = '" .addslashes(utf8_decode($des_it)). "',
                     description_en = '" .addslashes(utf8_decode($des_en)). "'
                     WHERE `id_produit` = '" . addslashes($_GET["id_produit"]) . "' LIMIT 1
                    ;";
		mysql_query($sql_tradproduct);
	
	//On efface les sessions
	$id_newproduct = "";

	$_SESSION["product_name_fr"] = "";
	$_SESSION["product_name_de"] = "";
	$_SESSION["product_name_es"] = "";
	$_SESSION["product_name_it"] = "";
	$_SESSION["product_name_en"] = "";

	$_SESSION["product_description_fr"] = "";
	$_SESSION["product_description_de"] = "";
	$_SESSION["product_description_es"] = "";
	$_SESSION["product_description_it"] = "";
	$_SESSION["product_description_en"] = "";
  
	$_SESSION["product_divers_fr"] = "";
	$_SESSION["product_divers_de"] = "";
	$_SESSION["product_divers_es"] = "";
	$_SESSION["product_divers_it"] = "";
  	$_SESSION["product_divers_en"] = "";

	//on envoier sur une page confirmant la traduction du produit
	$redirectiontrad = "index2.php?page=confirmtrad&id_produit=" . $_GET["id_produit"];
	header("location: $redirectiontrad");
	exit();
}

// on supprime les slashs pour l'affichage
$_SESSION["product_realname"] = stripslashes(htmlentities($_SESSION["product_realname"]));
$_SESSION["product_name_fr"] = stripslashes(htmlentities($_SESSION["product_name_fr"]));
$_SESSION["product_name_de"] = stripslashes(htmlentities($_SESSION["product_name_de"]));
$_SESSION["product_name_es"] = stripslashes(htmlentities($_SESSION["product_name_es"]));
$_SESSION["product_name_it"] = stripslashes(htmlentities($_SESSION["product_name_it"]));
$_SESSION["product_name_en"] = stripslashes(htmlentities($_SESSION["product_name_en"]));

$_SESSION["product_auteur"] = stripslashes(htmlentities($_SESSION["product_auteur"]));
$_SESSION["product_editeur"] = stripslashes(htmlentities($_SESSION["product_editeur"]));

$_SESSION["product_reference"] = stripslashes(htmlentities($_SESSION["product_reference"]));
$_SESSION["product_description_fr"] = stripslashes(htmlentities($_SESSION["product_description_fr"]));
$_SESSION["product_description_de"] = stripslashes(htmlentities($_SESSION["product_description_de"]));
$_SESSION["product_description_es"] = stripslashes(htmlentities($_SESSION["product_description_es"]));
$_SESSION["product_description_it"] = stripslashes(htmlentities($_SESSION["product_description_it"]));
$_SESSION["product_description_en"] = stripslashes(htmlentities($_SESSION["product_description_en"]));

$_SESSION["product_divers_fr"] = stripslashes(htmlentities($_SESSION["product_divers_fr"]));
$_SESSION["product_divers_de"] = stripslashes(htmlentities($_SESSION["product_divers_de"]));
$_SESSION["product_divers_es"] = stripslashes(htmlentities($_SESSION["product_divers_es"]));
$_SESSION["product_divers_it"] = stripslashes(htmlentities($_SESSION["product_divers_it"]));
$_SESSION["product_divers_en"] = stripslashes(htmlentities($_SESSION["product_divers_en"]));

$_SESSION["product_url"] = stripslashes(htmlentities($_SESSION["product_url"]));
$_SESSION["product_pdfap"] = stripslashes(htmlentities($_SESSION["product_pdfap"]));


$_SESSION["product_error"] = $error;

if (($_POST["product_submitaddproduct"] != "Enregistrer les modifications" && $_POST["product_submitaddproduct"] != "Ajouter") or $error)
{
  $redirection = "index2.php?page=addproduct&etat=" . $_POST["product_submitaddproduct"] . "&id_produit=" . $_GET["id_produit"];
  header("location: $redirection");
}
?>