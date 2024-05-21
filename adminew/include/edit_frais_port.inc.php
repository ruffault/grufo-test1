
<?php
/* ici on va proposer des outils de mise à jour des données de frais de port  *
 * 										*
 * 										*
 * 										*
 ********************************************************************************/ 										

//suivant les trois types d'édition: suppression, modification, création
//
//je récupére les données du frais de port à modifier
$sql= 'SELECT * from frais_port_new WHERE id_frais_port =' . $_GET['id'] .';';
$res = mysqli_query($link,$sql);
$row = mysqli_fetch_array($res);
var_dump("entré dans edit");var_dump($_POST);var_dump($_POST['Valider']);
// je teste si on est dans la phase retour après submit
// auquel cas je mets à jour et si dans cas add j'ajoute un enregistrement
//
if (isset($_POST['Valider']))
	{ //oui donc je boucle pour chaque ligne 
	var_dump($_POST);
		$count = count($_POST['id']);
		for($i = 0; $i < $count;$i++) 
		{
			if ($_POST['id'][$i] <> "") 
			{ //l'enregistrement existe, on va le mettre à jour
			$sqlmaj = "UPDATE frais_port_new SET poids_tarif='" . $_POST['poids_tarif'][$i] . "'
			,prix='" . $_POST['prix'][$i] . "' WHERE id_frais_port='" . $_POST['id'][$i] . "';";
			$maj=mysqli_query($link,$sqlmaj);
			}		
			else //le id est null car nouveau couple
			{	
			$sqlaj = "INSERT INTO frais_port_new VALUES 
			(''," . $row['mode'] . "'," . $row['pays'] . "'," . $row['mode_calcul'] . "," 	
			. $row['poids_tarif'] . ",". $row['prix'] . ");";
			$add= mysqli_query($link,$sqlaj);
			}
		} // fin de la boucle des données mises à jour récupérées via POST

	//tout est mis à jour je reviens au point de départ en gardant le pays
	
} // fin de la partie ou on met à jour

echo "<h3>Pays: " . $row['pays'] . "  mode: " . $row['mode'] . "</h3>";
?> 
	<!-- <form id="FP_modif" action="index2.php&page=new_frais_port&sous_page=edit&id=<?php echo $row['id_frais_port']; ?>" method="post"> --!>
<?php
switch($_GET['sous_page']){
	case "sup"://il s'agit de supprimer l'enregistrement souhaité
		$sql = 'delete frais_port_new WHERE id_frais_port=' .$_GET['id'] .';';
		$res = mysqli_query($sql);
		//header('location:index2.php');
//	break;// fin du cas sup

	case "modif": //on crée le cadre pour accueillir les modifications

?>
	<table width="500" border="0" cellspacing="1" cellpadding="0">
<!--	<form id="FP_modif" action="index2.php?page=new_frais_port&pays=<?php echo $row['pays']; ?>&sous_page=modif&id=<?php echo $row['id_frais_port']; ?>" method="post"> --!> 
	<form id="FP_modif" action="index2.php?page=new_frais_port&pays=<?php echo $pays; ?>" method="post"> 
	<tr>
	<td align"center"><strong>Limite poids</strong></td>
	<td align="center"><strong>Tarif</strong></td>
	</tr> 	
<?php		if ((isset($_GET['type']) ? $_GET['type'] : '') == "add") {// on affiche les zones pour ajouter un couple
?>	
	<tr>	
	<td align="center">
	<input type="number" name="poids_tarif[]" id="poids" value="" autofocus>
	</td>
	<td align="center">
	<input type="text" name="prix[]" id="prix" value="" >
	</td>
	</tr>
	<input type="hidden" name="id[]" value=""> 
<?php }// fin du cas particulier pour l'ajout d'un couple

	//il s'agit de modifier les enregistrements existants en mettant le curseur sur l'id d'appel
	//je récupère tous les enregistrements du mode donc 
		$sql= "select * from frais_port_new where pays='" . $row['pays'] . "' and mode_calcul=" . $row['mode_calcul'] . " and mode='" .$row['mode'] . "';";
		$restot = mysqli_query($link,$sql);
 

//je boucle sur les enregistrements

	while($rowtot = mysqli_fetch_array($restot)){
?>
	<tr>	
	<td align="center">
	<input type="number" name="poids_tarif[]" id="poids" value=<?php echo $rowtot['poids_tarif'];?>>
	</td>
	<td align="center">
	<input type="text" name="prix[]" id="prix" value=<?php echo $rowtot['prix'];?> <?php echo ($rowtot['id_frais_port'] == $_GET['id'] ? "autofocus" : "");?>>
	</td>
	</tr>
	<input type="hidden" name="id[]" value=<?php echo $rowtot['id_frais_port']; ?>>

	
<?php  } //fin de la boucle sur les enregistrements
?>
	
	<tr>
	<td colspan="4" align="center"> 
	<input type="submit" name="Valider" value="Valider">
	</td> 
	</tr>
	</form>
</table>
<?php	break; //fin du case modif

 } // fin du switch ?> 

	


