<?php
$posted = false;
if( $_POST ) {
  $posted = true;
  if (isset($_POST["id_categmere"]) && isset($_POST["id_categfille"]))
  {
  $sql_addsubcateg = "UPDATE categorie
  					  set id_categorie_parent = '" . $_POST["id_categmere"] ."'
					  WHERE id_categorie = '" . $_POST["id_categfille"] . "'
  					 ;";
  $sql_addsubcateg_result = mysql_query($sql_addsubcateg);
}
if (isset($_POST["categname"]))
{
  $sql_addcateg = "INSERT INTO `categorie` (
                                            `id_categorie`,
                                            `id_categorie_parent`,
                                            `nom_fr`
                                           )
                   VALUES (
                           '',
                           '0',
                           '" . addslashes($_POST["categname"]) . "'
                          )
                   ;";
  mysql_query($sql_addcateg);
}

if (isset($_POST["nom_type"]) && isset($_POST["tva_type"]))
{
  if (!empty($_POST["nom_type"]) && !empty($_POST["tva_type"])) {
  $sql_addtype = "INSERT INTO `type` (
                                            `id_type`,
                                            `nom_fr`,
                                            `tva`
                                           )
                   VALUES (
                           '',
                           '" . addslashes($_POST["nom_type"]) . "',
                           '" . addslashes($_POST["tva_type"]) . "'
                          )
                   ;";
  $sql_addtype_result = mysql_query($sql_addtype);
  $message="Succ�s ! Ajout effectu� !";

  }else {
    $message = "Tva ou Nom du type vide !";

  }
}

if (isset($_POST["product_tva_modif"]) && isset($_POST["product_tva_val"]))
{
  $sql_majtype = "UPDATE type
  					  set tva = '" . $_POST["product_tva_val"] ."'
					  WHERE id_type = '" . $_POST["product_tva_modif"] . "'
  					 ;";
  $sql_majtype_result = mysql_query($sql_majtype);
}
$result = $_POST['name'] == "danny"; // Dummy result
  }
?>
<form action="index2.php?page=categ" method="post">
<div>

D�placer
<select name="id_categfille">
<?
$sql_categmere = "SELECT *
				  FROM categorie
				  ORDER BY nom_fr
			     ;";
$sql_categmere_result = mysql_query($sql_categmere);
while($val_categmere = mysql_fetch_array($sql_categmere_result))
{
	echo "<option value='" . $val_categmere["id_categorie"] . "'>" . $val_categmere["nom_fr"] . "</option>";
}
?>
</select>

Dans
<select name="id_categmere">
<?
$sql_categmere = "SELECT *
FROM categorie
WHERE `id_categorie_parent` =0
			     ;";
$sql_categmere_result = mysql_query($sql_categmere);
while($val_categmere = mysql_fetch_array($sql_categmere_result))
{
	echo "<option value='" . $val_categmere["id_categorie"] . "'>"
		. $val_categmere["nom_fr"] . "</option>";
}
?>
</select>

<input type="submit" value="ok" />
</div>
</form>
<?php
if( $posted ) {
 if( $result ) 
   echo "<script type='text/javascript'>alert('Donn�es transmises avec succ�s !')</script>";
 else
   echo "<script type='text/javascript'>alert('Echec !')</script>";
 }
 ?>
<form action="index2.php?page=categ" method="post">
 <div>
 Cr�er une cat�gorie <input type='text' name='categname' value='' /> <input type="submit" value="ok"  />
 </div></form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<form action="index2.php?page=categ" method="post" id="TVA_FORM"><div>Cr�er un nouveau type de produit : </td>
<input type='text' name='nom_type' placeholder="Nom du Type" />
<input type='text' name='tva_type' placeholder="TVA du Type" />
<input type="submit" value="ok" /></div></form>
<?php
    $sql_tva_modif = "SELECT id_type, nom_fr,tva
              FROM type
              ORDER BY nom_fr
               ;";
    $sql_tva_modif_result = mysql_query($sql_tva_modif);
?>
<form action="index2.php?page=categ" method="post"><div>Modifier la TVA de :
    <select name="product_tva_modif" id="tva_modif">
    <?php
      while($val_tva_modif = mysql_fetch_array($sql_tva_modif_result))
      {
        echo "<option value='" . $val_tva_modif["id_type"] . "' id='" . $val_tva_modif["tva"] . "' >" . $val_tva_modif["nom_fr"] . "</option>";
      }
    ?>
  </select>
  <input name="product_tva_val" id="tva_val" type="text" value=""> <input type="submit" value="ok" /></div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>

    <script type="text/javascript">
    $(document).ready(function(){ var id = $('#tva_modif').children(":selected").attr("id"); $('#tva_val').val(id); });
    $('#tva_modif').change(function()
    {
        var id = $(this).children(":selected").attr("id");
        if(id != ""){
            $('#tva_val').val(id);
        }
        else
        {
          $('#tva_val').val('');
        }
    });

    </script>
    <script type="text/javascript">
    var inputs = $("form#TVA_FORM input type, form#TVA_FORM input type");

    var validateInputs = function validateInputs(inputs) {
      var validForm = true;
      inputs.each(function(index) {
        var input = $(this);
        if (!input.val()) {
          $("#OKAY").attr("disabled", "disabled");
          validForm = false;
        }
      });
      return validForm;
    }


    inputs.change(function() {
      if (validateInputs(inputs)) {
        $("#OKAY").removeAttr("disabled");
      }
    });    </script>
  </form>
<?
function echoResults($cats,$subcat,$level,$nom, $tabnb)
{
   $output = '';
   foreach($cats as $key => $value)// pour chaque cat�gorie...
   {
     if($value == $subcat)// on regarde si c'est une sous-cat�gorie de la cat�gorie en cours
     {
			 $output .= "<li><a href='pdf.php?id_categ=$key'>". htmlentities($nom[$key])
			 	. "</a> (" . 	$tabnb[$key]['nb'] . ")</li>\n";

			 if(in_array($key,$cats))// puis on regarde si elle a aussi des sous-cat�gories
	     {
         $output .= "<ul>" . echoResults($cats,$key,$level+1,$nom,$tabnb) . "</ul>";// si oui on relance la fonction pour les trouver
	     }
     }
   }
   // on sort le r�sultat
   return $output;
}


$sql_categmere = "SELECT *
		              FROM categorie
	                ORDER BY nom_fr;";
$sql_categmere_result = mysql_query($sql_categmere);
if (mysql_num_rows($sql_categmere_result))
{
  while($val = mysql_fetch_array($sql_categmere_result))
  {
  	$tabcateg[$val['id_categorie']] = $val['id_categorie_parent'];
		$tabnom[$val['id_categorie']] = $val['nom_fr'];
		$tabnb[$val['id_categorie']]['nb'] = $val['nb_product'];
  }
}
// initialisation du script et affichage r�sultat
echo "<ul>" . echoResults($tabcateg,0,0,$tabnom, $tabnb) . "</ul>";
?>
