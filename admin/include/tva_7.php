<style>
#test{color:red;font-weight:bold;
}
</style>

<script language="JavaScript">

function cal_ht() {
	var ttc = document.getElementById('ttc').value;
	ht = Math.round(ttc / 1.07*100)/100;
	document.forms["tva_7"].elements["prix"].value = ht;
	document.forms["tva_7"].elements["prix"].id = "test";
	}

</script>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';


if (isset($_POST['ref'])) {
  tva7($_POST['ref']);
}
else if ($id == ok){
  tva7_form_2();
  }else if ($id == des){
  tva7_form_3();
}else  {
  tva7_form();
}

// fonction pour afficher les prix du produit.
function tva7($ref) {
 //Réception de la commande rejeter
	$sql = "SELECT prix, prix_editeur, nom_fr, sommeil FROM `produit` WHERE reference ='$ref' OR isbn='$ref'";
	$sql_result = mysql_query($sql);
	$nb = mysql_num_rows($sql_result);
	$val_ref = mysql_fetch_array($sql_result);
	$valht = $val_ref['prix'] + twodecimal(round_up(($val_ref['prix'] * 70/ 1000), 2));

if ($nb>0){
	echo '<h2 class="noborder" style="text-align: left;">Titre :'.$val_ref['nom_fr'].'</h2>';
	echo '<p style="text-align: left;">ref ou ISBN : '.$ref.'</p>';
	echo '<form name="tva_7" method="POST" action="up_price.php">';
	echo '<input type="hidden" name="ref" value="'.$ref.'" />';

	if ($val_ref['sommeil'] == 1)
      echo "<p>Décocher pour activer <input type='checkbox' name='product_actif' value='1' checked /></p>";
    else
      echo "<p>Cocher pour désactiver <input type='checkbox' name='product_actif' value='1' /></p>";

	echo '<p>Prix HT <input type="text" size="4" name="prix" value="'.$val_ref['prix'].'" /></p>';
	echo '<p>Prix TTC <input id="ttc" type="text" size="4" name="prix_editeur" onchange="cal_ht()" value="'.$val_ref['prix_editeur'].'" /></p>';
	echo '</br>';
	echo '<input type="submit" value="Enregistrer" />';
	echo '</form>';
   	}else{
    	//echec
		echo'<p>Pas de référence connue</p>';
		echo'<p><a href="index2.php?page=tva_7">Essayer avec une autre référence</a></p>';
		}
}

// fonction afficher si il n'y pas de référence.
function tva7_form() {
  echo '
	<fieldset>
  	<p>Veuillez saisir la référence ou ISBN:</p>
    	<form id="search_tva7" name="search_tva7" method="post" action="">
   			<input type="text" size="13" name="ref" id="ref">
    		<input type="submit" name="button" id="button" value="Rechercher">
    	</form>
	</fieldset>
  ';
}

// fonction afficher apres enregistrement.
function tva7_form_2() {
  echo '
	<fieldset>
	<p id="test">Modification du prix enregistrer</p>
  	<p>Veuillez saisir une nouvelle référence ou un nouveau ISBN:</p>
    	<form id="search_tva7" name="search_tva7" method="post" action="">
   			<input type="text" size="13" name="ref" id="ref">
    		<input type="submit" name="button" id="button" value="Rechercher">
    	</form>
	</fieldset>
  ';
}


// fonction afficher apres désactivation.
function tva7_form_3() {
  echo '
	<fieldset>
	<p id="test">Produit désactivé</p>
  	<p>Veuillez saisir une nouvelle référence ou un nouveau ISBN:</p>
    	<form id="search_tva7" name="search_tva7" method="post" action="">
   			<input type="text" size="13" name="ref" id="ref">
    		<input type="submit" name="button" id="button" value="Rechercher">
    	</form>
	</fieldset>
  ';
}

?>
