
<?php
include ("verifsession.inc.php");
include ("connexion.inc.php");

if (isset($_POST['Valider']))
	{ //oui donc je boucle pour chaque ligne 
//	var_dump($_POST);
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
			('','" . $_POST['mode'] . "','" . $_POST['pays'] . "'," . $_POST['mode_calcul'] . "," 	
			. $_POST['poids_tarif'][$i] . ",". $_POST['prix'][$i] . ");";
			$add= mysqli_query($link,$sqlaj);
			}
		} // fin de la boucle des données mises à jour récupérées via POST

	//tout est mis à jour je reviens au point de départ en gardant le pays
	header('location:../index2.php?page=new_frais_port&pays=' . $_POST['pays']);
}
echo "y a un problème";
?>

