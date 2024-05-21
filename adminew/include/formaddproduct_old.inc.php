<?php
if ($_GET["modifier"] == 1)
{
  $sql_modif = "SELECT *
                FROM produit
                WHERE id_produit = '" . $_GET["id_produit"] . "'
               ;";

  $sql_modif_result = mysqli_query($link,$sql_modif);
  $val_sql_modif = mysqli_fetch_array($sql_modif_result);

  $_SESSION["product_name"] = htmlentities($val_sql_modif["nom"]);
  $_SESSION["product_type"] = htmlentities($val_sql_modif["id_type"]);
  $_SESSION["product_auteur_choice"] = htmlentities($val_sql_modif["id_auteur"]);
  $_SESSION["product_editeur_choice"] = htmlentities($val_sql_modif["id_editeur"]);
  $_SESSION["product_reference"] = htmlentities($val_sql_modif["reference"]);
  $_SESSION["product_categorie"] = htmlentities($val_sql_modif["id_categorie"]);
  $_SESSION["product_issn"] = htmlentities($val_sql_modif["issn"]);
  $_SESSION["product_isbn"] = htmlentities($val_sql_modif["isbn"]);
  $_SESSION["product_page"] = htmlentities($val_sql_modif["nb_pages"]);
  $_SESSION["product_terme"] = htmlentities($val_sql_modif["nb_termes"]);
  $_SESSION["product_poid"] = htmlentities($val_sql_modif["poid"]);

  $sql_all_lang = "SELECT id_langue_dispo
                   FROM langue_produit
                   WHERE id_produit = '" . $_GET["id_produit"] . "'
                   ;";
  $sql_all_lang_result = mysqli_query($link,$sql_all_lang);
  $i = 0;
  while($val_alllang = mysqli_fetch_array($sql_all_lang_result))
  {
    $_SESSION["product_langue"][] = $val_alllang["id_langue_dispo"];
  }
  $_SESSION["product_description"] = htmlentities($val_sql_modif["description"]);
  $_SESSION["product_index"] = htmlentities($val_sql_modif["ind"]);
  $_SESSION["product_divers"] = htmlentities($val_sql_modif["info_divers"]);
  $_SESSION["product_prix"] = htmlentities($val_sql_modif["prix"]);
  $_SESSION["product_prix_editeur"] = htmlentities($val_sql_modif["prix_editeur"]);
  $_SESSION["product_rabais"] = htmlentities($val_sql_modif["rabais"]);
  $_SESSION["product_delai_reapprovisionnement"] = htmlentities($val_sql_modif["delai_reapprovisionnement"]);
  $_SESSION["product_nb_dispo"] = htmlentities($val_sql_modif["nb_dispo"]);
  $_SESSION["product_disponible"] = htmlentities($val_sql_modif["disponible"]);
  $_SESSION["product_url"] = htmlentities($val_sql_modif["url"]);
  $_SESSION["product_jourparution"] = htmlentities(substr($val_sql_modif["date_parution"], 8, 2));
  $_SESSION["product_moisparution"] = htmlentities(substr($val_sql_modif["date_parution"], 5, 2));
  $_SESSION["product_anneeparution"] = htmlentities(substr($val_sql_modif["date_parution"], 0, 4));
  $_SESSION["langues"] = $val_sql_modif["langues"];

  $sql_avant = "SELECT *
                FROM vitrine
                WHERE id_produit = '" . $_GET["id_produit"] . "'
               ;";
  $sql_avant_result = mysqli_query($link,$sql_avant);
  if (mysqli_num_rows($sql_avant_result))
    $_SESSION["product_avant"] = 1;
  
}

if ($_SESSION["product_error"] != "")
{
  echo "<div id='error'>";
  echo "<b>Erreur</b><br />";
  echo $_SESSION["product_error"];
  echo "</div>";
}

if ($_GET["etat"] == "Verifier")
{
  //On affiche un aperçu
  echo "<div id='preview'>";
  echo "Référence : " . $_SESSION["product_reference"] . "<br /><br />";
  echo "<strong>Nom de l'ouvrage : " . $_SESSION["product_name"] . "</strong><br /><br />";
  if ($_SESSION["product_categorie"])
  {
    //On récupére la catégorie
    $sql_affichecateg = "SELECT nom
                        FROM categorie
                        WHERE id_categorie = '" . $_SESSION["product_categorie"] . "'
                        ;";
    $sql_affichecateg_result = mysqli_query($link,$sql_affichecateg);
    $val_affichecateg = mysqli_fetch_array($sql_affichecateg_result);

    echo "Catégorie : " . $val_affichecateg["nom"] . "<br />";
  }
  
  
  if ($_SESSION["product_auteur"] != "")
    echo "Auteur : " . $_SESSION["product_auteur"] . "<br />";
  else
  {
    $nom_auteur = "SELECT nom
                   FROM auteur
                   WHERE id_auteur = '" . $_SESSION["product_auteur_choice"] . "'
                  ;";
    $nom_auteur_result = mysqli_query($link,$nom_auteur);
    $val_nom_auteur = mysqli_fetch_array($nom_auteur_result);
    echo "Auteur : " . $val_nom_auteur["nom"] . "<br />";
  }
  if ($_SESSION["product_editeur"] != "")
    echo "Editeur : " . $_SESSION["product_editeur"] . "<br />";
  else
  {
    $nom_editeur = "SELECT nom
                   FROM editeur
                   WHERE id_editeur = '" . $_SESSION["product_editeur_choice"] . "'
                  ;";
    $nom_editeur_result = mysqli_query($link,$nom_editeur);
    $val_nom_editeur = mysqli_fetch_array($nom_editeur_result);
    echo "Editeur : " . $val_nom_editeur["nom"] . "<br />";
  }
  
  
  if ($_SESSION["product_prix"] == 0 or trim($_SESSION["product_prix"]) == "")
    echo "<b>Indisponible</b><br />";
  else
    echo "Prix : " . $_SESSION["product_prix"] . "&euro;<br />";
  echo "Description : " . nl2br($_SESSION["product_description"]) . "<br />";
  
  echo "Informations diverses : " . nl2br($_SESSION["product_divers"]) . "<br />";
  echo "Date de parution : " . $_SESSION["product_jourparution"] . "/" . $_SESSION["product_moisparution"] . "/" . $_SESSION["product_anneeparution"] . "<br />";
  echo "</div>";
}

echo "<form action='modifproduct.php?id_produit=" . $_GET["id_produit"] . "' method='post' id='formaddproduct'>";
?>

<table>
<tr>
  <td>Type de produit</td>
  <td>
    <select name="product_type">
<?
$sql_recuptva = "SELECT *
                 FROM type
                 ORDER by nom
                 ;";
$sql_recuptva_result = mysqli_query($link,$sql_recuptva);
while ($val_recuptva = mysqli_fetch_array($sql_recuptva_result))
{
  if ($_SESSION["product_type"] == $val_recuptva["id_type"])
  {
    echo "<option value='" . $val_recuptva["id_type"] . "' selected>" . $val_recuptva["nom"] . "</option>";
  }
  else
    echo "<option value='" . $val_recuptva["id_type"] . "'>" . $val_recuptva["nom"] . "</option>";
}
?>
    </select>
  </td>
</tr>
<tr>
  <td>Nom de l'ouvrage</td>
  <td><input type="text" size="50" value="<? echo $_SESSION["product_name"] ;?>" name="product_name" /></td>
</tr>
<tr>
  <td>Auteur</td>
  <td><input type="text" value="<? echo $_SESSION["product_auteur"] ;?>" name="product_auteur" /><br />ou sélectionner un auteur existant<br />
    <select name="product_auteur_choice">
      <option value=""></option>
<?
$sql_recupauteur = "SELECT *
                   FROM auteur
                   ORDER by nom
                  ;";
$sql_recupauteur_result = mysqli_query($link,$sql_recupauteur);
while ($val_recupauteur = mysqli_fetch_array($sql_recupauteur_result))
{
  if ($_SESSION["product_auteur_choice"] == $val_recupauteur["id_auteur"])
    echo "<option value='" . $val_recupauteur["id_auteur"] . "' selected>" . $val_recupauteur["nom"] . "</option>";

  echo "<option value='" . $val_recupauteur["id_auteur"] . "'>" . $val_recupauteur["nom"] . "</option>";
}
?>
    </select>
  </td>
</tr>
<tr>
  <td>Editeur</td>
  <td><input type="text" value="<? echo $_SESSION["product_editeur"] ;?>" name="product_editeur" /><br />ou sélectionner un editeur existant<br />
    <select name="product_editeur_choice">
      <option value=""></option>
<?
$sql_recupediteur = "SELECT *
                   FROM editeur
                   ORDER by nom
                  ;";
$sql_recupediteur_result = mysqli_query($link,$sql_recupediteur);
while ($val_recupediteur = mysqli_fetch_array($sql_recupediteur_result))
{
  if ($_SESSION["product_editeur_choice"] == $val_recupediteur["id_editeur"])
    echo "<option value='" . $val_recupediteur["id_editeur"] . "' selected>" . $val_recupediteur["nom"] . "</option>";

  echo "<option value='" . $val_recupediteur["id_editeur"] . "'>" . $val_recupediteur["nom"] . "</option>";
}
?>
    </select>
  </td>
</tr>
<tr>
  <td>Catégorie</td>
  <td>
    <select name="product_categorie">
      <option value="<? echo $_SESSION["product_categorie"] ;?>"></option>
<?
$sql_recupcateg = "SELECT *
                   FROM categorie
                   ORDER by nom
                  ;";
$sql_recupcateg_result = mysqli_query($link,$sql_recupcateg);
while ($val_recupcateg = mysqli_fetch_array($sql_recupcateg_result))
{
  if ($_SESSION["product_categorie"] == $val_recupcateg["id_categorie"])
    echo "<option value='" . $val_recupcateg["id_categorie"] . "' selected>" . $val_recupcateg["nom"] . "</option>";
  echo "<option value='" . $val_recupcateg["id_categorie"] . "'>" . $val_recupcateg["nom"] . "</option>";
}
?>
    </select>
  </td>
</tr>
<tr>
  <td>Réference</td>
  <td><input type="text" size="15" maxlenght="15" value="<? echo $_SESSION["product_reference"] ;?>" name="product_reference" /></td>
</tr>
<tr>
  <td>ISSN</td>
  <td><input type="text" size="15" maxlenght="15" value="<? echo $_SESSION["product_issn"] ;?>" name="product_issn" /></td>
</tr>
<tr>
  <td>ISBN</td>
  <td><input type="text" size="15" maxlenght="15" value="<? echo $_SESSION["product_isbn"] ;?>" name="product_isbn" /></td>
</tr>
<tr>
  <td>Nombre de pages</td>
  <td><input type="text" value="<? echo $_SESSION["product_page"] ;?>" name="product_page" />pages</td>
</tr>
<tr>
<td>Nombre de termes</td>
<td><input type="text" value="<? echo $_SESSION["product_terme"] ;?>" name="product_terme" />termes</td>
</tr>
<tr>
<td>Poids</td>
<td><input type="text" value="<? echo $_SESSION["product_poid"] ;?>" name="product_poid" />grammes</td>
</tr>
<tr>
  <td>langues</td>
  <td>
<?
$sql_recuplang = "SELECT *
                  FROM langue_dispo
                  ORDER by nom
                  ;";
$sql_recuplang_result = mysqli_query($link,$sql_recuplang);
/*
echo "<table>";
$i = 1;
$coche = 0;
while ($val_recuplang = mysqli_fetch_array($sql_recuplang_result))
{
  if ($i == 1)
    echo "<tr>";

  if ($i < 4)
  {
    if ($_SESSION["product_langue"])
    {
      foreach($_SESSION["product_langue"] as $a)
      {
        if ($a == $val_recuplang["id_langue_dispo"])
          $coche = 1;
      }
    }
    if ($coche == 1)
      echo "<td><input type='checkbox' name='product_langue[]' value='" . $val_recuplang["id_langue_dispo"] . "' checked>" . $val_recuplang["nom"] . "</td>";
    else
      echo "<td><input type='checkbox' name='product_langue[]' value='" . $val_recuplang["id_langue_dispo"] . "'>" . $val_recuplang["nom"] . "</td>";
    $i++;
  }
  else
  {
    if ($_SESSION["product_langue"])
    {
        foreach($_SESSION["product_langue"] as $a)
        {
          if ($a == $val_recuplang["id_langue_dispo"])
            $coche = 1;
        }
    }
    if ($coche == 1)
      echo "<td><input type='checkbox' name='product_langue[]' value='" . $val_recuplang["id_langue_dispo"] . "' checked>" . $val_recuplang["nom"] . "</td></tr>";
    else
      echo "<td><input type='checkbox' name='product_langue[]' value='" . $val_recuplang["id_langue_dispo"] . "'>" . $val_recuplang["nom"] . "</td></tr>";
    $i = 1;
  }
  $coche = 0;
}
echo "</table>";
*/
?>

   </td>
</tr>

<?
if ($_SESSION["langues"] && $_GET["id_produit"])
{
?>
<tr>
  <td>Langues à corriger</td>
  <td><? echo $_SESSION["langues"]; ?></td>
</tr>
<?
}
?>
<tr>
  <td>Index<br />(cocher si oui)</td>
  <td>
  <?
    if ($_SESSION["product_index"] == 1)
      echo "<input type='checkbox' name='product_index' value='1' checked />";
    else
      echo "<input type='checkbox' name='product_index' value='1' />";
  ?>
  </td>
</tr>
<tr>
  <td>Description</td>
  <td><textarea cols="50" rows="10" name="product_description"><? echo  html_entity_decode ($_SESSION["product_description"]) ;?></textarea></td>
</tr>
<tr>
  <td>Divers</td>
  <td><textarea cols="50" rows="10" name="product_divers"><? echo  html_entity_decode($_SESSION["product_divers"]) ;?></textarea></td>
</tr>
<tr>
  <td>Prix</td>
  <td><input type="text" size="10" maxlenght="10" value="<? echo $_SESSION["product_prix"] ;?>" name="product_prix" />&euro;</td>
</tr>
<tr>
  <td>Prix editeur</td>
  <td><input type="text" size="10" maxlenght="10" value="<? echo $_SESSION["product_prix_editeur"] ;?>" name="product_prix_editeur" />&euro;</td>
</tr>
<tr>
  <td>Rabais</td>
  <td><input type="text" size="10" maxlenght="10" value="<? echo $_SESSION["product_rabais"] ;?>" name="product_rabais" />%</td>
</tr>
<tr>
  <td>Delai de<br />réaprovisionnement</td>
  <td><input type="text" size="10" maxlenght="10" value="<? echo $_SESSION["product_delai_reapprovisionnement"] ;?>" name="product_delai_reapprovisionnement" />jours</td>
</tr>
<tr>
  <td>Nombre d'ouvrages<br />disponibles</td>
  <td><input type="text" size="10" maxlenght="10" value="<? echo $_SESSION["product_nb_dispo"] ;?>" name="product_nb_dispo" /></td>
</tr>
<tr>
  <td>Disponible<br />(cocher si oui)</td>
  <td>
  <?
    if ($_SESSION["product_disponible"] == 1)
      echo "<input type='checkbox' name='product_disponible' value='1' checked />";
    else
      echo "<input type='checkbox' name='product_disponible' value='1' />";
  ?>
  </td>
</tr>
<tr>
  <td>Url associé</td>
  <td><input type="text" size="50" maxlength="255" value="<? echo $_SESSION["product_url"] ;?>" name="product_url" /></td>
</tr>
<tr>
<td>Date de parution</td>
  <td>
      <select name="product_jourparution">
      <option value="">&nbsp;</option>
<?
for ($i=1; $i <= 31; $i++)
{
  $a = $i;
  if (strlen($a) == 1)
    $a = "0$a";

  if ($_SESSION["product_jourparution"] == $a)
    echo "<option value='$a' selected>$a</option>\n";
  else
    echo "<option value='$a'>$a</option>\n";
}
?>
    </select>
    <select name="product_moisparution">
      <option value=''>&nbsp;</option>
<?
for ($i=1; $i <= 12; $i++)
{
  $a = $i;
  if (strlen($a) == 1)
    $a = "0$a";
  if ($_SESSION["product_moisparution"] == $a)
    echo "<option value='$a' selected>$a</option>\n";
  else
    echo "<option value='$a'>$a</option>\n";
}
?>
    </select>
      <select name="product_anneeparution">
      <option value=''>&nbsp;</option>
<?
for ($i=1920; $i != date("Y")+2; $i++)
{
  if ($_SESSION["product_anneeparution"] == $i)
    echo "<option value='$i' selected>$i</option>\n";
  else
  echo "<option value='$i'>$i</option>\n";
}
?>
    </select>
  </td>
</tr>
<tr>
  <td>Produit en vitrine</td>
  <td>
  <?
    if ($_SESSION["product_avant"] == 1)
      echo "<input type='checkbox' name='product_avant' value='1' checked />";
    else
      echo "<input type='checkbox' name='product_avant' value='1' />";
  ?>
  </td>
</tr>
</table>
<input type="submit" value="Verifier" name="product_submitaddproduct" />
<?

if ($_GET["etat"] == "Verifier" && ($_SESSION["product_error"] == "" or !$_SESSION["product_error"]) && (!$_GET["id_produit"] or $_GET["id_produit"] == ""))
{
  echo "<input type='submit' value='Ajouter' name='product_submitaddproduct' />";
  $_SESSION["product_error"] = "";
}


if ($_GET["etat"] == "Verifier" && $_GET["id_produit"] != "" && ($_SESSION["product_error"] == "" or !$_SESSION["product_error"]))
{
  echo "<input type='submit' value='Enregistrer les modifications' name='product_submitaddproduct' />";
  $_SESSION["product_error"] = "";
}

?>
</form>
<?
if ($_GET["modifier"] == 1)
{
  echo "<div>";
  echo "<a href='index2.php?page=showpic&produit=" . $_GET["id_produit"] . "'>Image associée</a>";
  echo "</div>";
}

//on efface les sessions
$id_newproduct = "";

$_SESSION["product_name"] = "";
$_SESSION["product_auteur"] = "";
$_SESSION["product_auteur_choice"] = "";
$_SESSION["product_type"] = "";
$_SESSION["product_categorie"] = "";
$_SESSION["product_reference"] = "";
$_SESSION["product_page"] = "";
$_SESSION["product_terme"] = "";
$_SESSION["product_poid"] = "";
$i = 0;
if ($_SESSION["product_langue"] != "")
{
  foreach($_SESSION["product_langue"] as $a)
  {
    $_SESSION["product_langue"][$i] = "";
    $i++;
  }
}
$_SESSION["product_index"] = "";
$_SESSION["product_description"] = "";
$_SESSION["product_divers"] = "";
$_SESSION["product_prix"] = "";
$_SESSION["product_prix_editeur"] = "";
$_SESSION["product_rabais"] = "";
$_SESSION["product_delai_reapprovisionnement"] = "";
$_SESSION["product_nb_dispo"] = "";
$_SESSION["product_disponible"] = "";
$_SESSION["product_url"] = "";
$_SESSION["product_jourparution"] = '';
$_SESSION["product_moisparution"] = "";
$_SESSION["product_anneeparution"] = "";
$_SESSION["product_disponible"] = "";
$_SESSION["product_avant"] = "";
$_SESSION["product_error"] = "";
?>
