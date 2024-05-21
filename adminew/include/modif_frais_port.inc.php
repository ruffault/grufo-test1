<?php
/* ici on va proposer des outils de mise à jour des données de frais de port  *
 * 										*
 * 										*
 * 										*
 ********************************************************************************/ 										
//je récupére les données du frais de port à modifier
var_dump($_POST);
$sql= 'SELECT * from frais_port_new WHERE id_frais_port =' . $_GET['id'] .';';
$res = mysqli_query($link,$sql);
$row = mysqli_fetch_array($res);
?>
<form id="FP_modif" method="post" action="include/majfrais_port.inc.php">
	<fieldset>
	<legend>Modifiez l'un et/ou deux des éléments du couple</legend>
	<p>
	<label for="tarif">jusqu'à</label>  
	<input type="number" name="tarif_poids" id="tarif" value=<?php echo $row['poids_tarif'];?>>
	<label for="prix">Tarif</label>  
	<input type="number" name="prix" id="prix" value=<?php echo $row['prix'];?> autofocus>
	</p>
	</fieldset>
	<input type="submit" value="Valider">
</form>
<?php
//je récupère tous les enregistrements du mode donc 
$sql= "select * from frais_port_new where pays='" . $row['pays'] . "' and mode_calcul=" . $row['mode_calcul'] . " and mode='" .$row['mode'] . "';";
$restot = mysqli_query($link,$sql);
?>


<!-- j'ajoute un formulaire qui permettra de modifier tous les couples du mode--!>
<form id="FP_modif" method="post" action="include/majfrais_port.inc.php">
	<fieldset>
	<legend>Modifiez l'un et/ou deux des éléments du couple</legend>
	<p>
<?php
//je boucle sur les enregistrements

while($rowtot = mysqli_fetch_array($restot))
{?>
	<label for="tarif">jusqu'à</label>  
	<input type="number" name="tarif_poids" id="tarif" value=<?php echo $rowtot['poids_tarif'];?>>
	<label for="prix">Tarif</label>  
	<input type="number" name="prix" id="prix" value=<?php echo $rowtot['prix'];?> autofocus>
	</p>
<?php }?>
	</fieldset>
	<input type="submit" value="Valider">
</form>

	


