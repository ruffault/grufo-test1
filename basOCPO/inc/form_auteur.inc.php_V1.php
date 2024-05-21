<?php
/* pour gérer les auteurs
 * il faudrait mettre dedans le menu pour pouvoir revenir en arrière une fois qu'on a effectué la consultation
 * a voir si on ne pourrait pas dévlopper cela comme une classe
 * les fonctions vont être la visualisation et la mise à jour comprenant événtuellement un lien avec par exemple entre 
 * un auteur et ce qui le concerne en l'espèce son contrat et ses droits pour la maison d'édition.
 * on va proposer d'avoir une version liste avec tous les auteurs qui permettrai éventuellement d'avoir une version pleine page
 * dans un premier temps je vais développer la version liste
 * pour cela je vais afficher la liste sous forme de formulaire et tableau affichant toutes les données qui sont présentes dans la 
 * table des auteurs triés par ordre alphabéthique ou éventuellement positioné en fonction d'une information qui serait passée dans un
 * $_GET ou $_POST*/

//pour commencer j'ai besoin de récupérer toutes les données des auteurs dans une ARRAY mixte contenant des instances auteurs
//en fait un appel à AccesDa->get(auteur all) devrait me retourner une array avec tous mes auteurs.
//sans passer par cet objet je peux directement utiliser l'objet PDO pour créer mes auteurs
//
include 'header.inc.php';
include 'connexion.inc.php';
$auteurs =  $acces->ListeTousAuteurs();//array contenant toutes les instances d'auteurs
//il s'agit maintenant d'afficher le formulaire permettant la mise à jour de chacun des champs en colonnes pour chacun des auteurs en ligne
//
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gestion des Droits Auteurs/MAJ auteurs</title>
		<meta charset="utf-8" />
	</head>

	<body>
		<h1> Gestion des Droits d'auteurs pour maison d'édition </h1>
		<h2> Gestion des informations sur les auteurs </h2>
<!-- je crée le tableau qui va permettre d'afficher les données pour chaque auteur -->
	<table width="100%"  border-collapse=collapse border="0" cellspacing="0" cellpadding=0">
	<tr>
	<td align="center"><strong>Suppression</strong></td>
	<td align="center"><strong>Type Cotisant</strong></td>
	<td align="center"><strong>n° SS</strong></td>
	<td align="center"><strong>clé SS</strong></td>
	<td align="center"><strong>Nom</strong></td>
	<td align="center"><strong>Prénom</strong></td>
	<td align="center"><strong>Nom usage</strong></td>
	<td align="center"><strong>Pseudo</strong></td>
	<td align="center"><strong>Nom courrier</strong></td>
	<td align="center"><strong>Adresse</strong></td>
	<td align="center"><strong>Adresse2</strong></td>
	<td align="center"><strong>CP</strong></td>
	<td align="center"><strong>Ville</strong></td>
	<td align="center"><strong>Pays</strong></td>
	<td align="center"><strong>Date naissance</strong></td>
	<td align="center"><strong>Date décès</strong></td>
	<td align="center"><strong>Activité</strong></td>
	<td align="center"><strong>Siret RNA</strong></td>
	<td align="center"><strong>Taux usuel</strong></td>
	<td align="center"><strong>Civilité</strong></td>
	<td align="center"><strong>Type</strong></td>
	</tr>
<!-- on démarre le formulaire -->
<form action="maj_auteur.inc.php" method="post">
<?php
//on boucle sur chacun des auteurs dont chaque instance va etre dans $auteur
	foreach ($auteurs as $auteur)
	{
?>
	<tr>	
	<td text-align="center">
	<input type="button" name="supbout[]" class="sup" value="Mod" checked >
	</td>
	<td text-align="center">
	<input type="number" name="Type_cotisant[]"  value="<?php echo $auteur->Type_cotisant();?>" >
	</td>
		<td align="center">
	<input type="text" name="n°_SS[]" id="n°_SS" value="<?php echo $auteur->n°_SS();?>" >
	</td>
	<td align="center">
	<input type="text" name="clé_SS[]" id="clé_SS" value="<?php echo $auteur->clé_SS();?>" >
	</td>
	<td text-align="center">
	<input type="text" name="Nom[]" id="Nom" value="<?php echo $auteur->Nom();?>" >
	</td>
	<td align="center">
	<input type="text" name="Prénom[]" id="Prénom" value="<?php echo $auteur->Prénom();?>" >
	</td>
	<td align="center">
	<input type="text" name="Nom_usage[]" id="Nom_usage" value="<?php echo $auteur->Nom_usage();?>" >
	</td>
	<td align="center">
	<input type="text" name="Pseudo[]" id="Pseudo" value="<?php echo $auteur->Pseudo();?>" >
	</td>
	<td align="center">
	<input type="text" name="Nom_courrier[]" id="Nom_courrier" value="<?php echo $auteur->Nom_courrier();?>" >
	</td>
	<td align="center">
	<input type="text" name="Adresse[]" id="Adresse" value="<?php echo $auteur->Adresse();?>" >
	</td>
	<td align="center">
	<input type="text" name="Adresse2[]" id="Adresse2" value="<?php echo $auteur->Adresse2();?>" >
	</td>
	<td align="center">
	<input type="text" name="CP[]" id="CP" value="<?php echo $auteur->CP();?>" >
	</td>
	<td align="center">
	<input type="text" name="Ville[]" id="Ville" value="<?php echo $auteur->Ville();?>" >
	</td>
	<td align="center">
	<input type="text" name="Pays[]" id="Pays" value="<?php echo $auteur->Pays();?>" >
	</td>
	<td align="center">
	<input type="date" name="date_naissance[]" id="date_naissance" value="<?php echo $auteur->date_naissance();?>" >
	</td>
	<td align="center">
	<input type="date" name="date_décès[]" id="date_décès" value="<?php echo $auteur->date_décès();?>" >
	</td>
	<td align="center">
	<input type="text" name="Activité[]" id="Activité" value="<?php echo $auteur->Activité();?>" >
	</td>
	<td align="center">
	<input type="text" name="Siret_RNA[]" id="Siret_RNA" value="<?php echo $auteur->Siret_RNA();?>" >
	</td>
	<td align="center">
	<input type="number" step="0.001" name="Taux_usuel[]" id="Taux_usuel" value="<?php echo $auteur->Taux_usuel();?>" >
	</td><td align="center">
	<input type="text" name="Civilité[]" id="Civilité" value="<?php echo $auteur->Civilité();?>" >
	</td>
	<td align="center">
	<input type="text" name="Type[]" id="Type" value="<?php echo $auteur->Type();?>" >
	</td>
	<td align="center">
	<input type="hidden" name="ID[]" value="<?php echo $auteur->ID();?>">
	</td>
	<td><input type="hidden" name = "sup[]" value="Mod" ></td>
	</tr>
<?php
	} // fin d'un auteur
	//on rajoute une ligne pour proposer un nouvel auteur
?>
	<!--<p align="center"> Pour rajouter un auteur </p>-->
	<tr>	
	<td text-align="center">
	<input type="button" name="supbout[]" class="sup" value="Ins" checked >
	</td>
	<td text-align="center">
	<input type="number" name="Type_cotisant[]" id="Type_cotisant" value="" >
	</td>
	<td align="center">
	<input type="text" name="n°_SS[]" id="n°_SS" value="" >
	</td>
	<td align="center">
	<input type="text" name="clé_SS[]" id="clé_SS" value="" >
	</td>
	<td text-align="center">
	<input type="text" name="Nom[]" id="Nom" value="" >
	</td>
	<td align="center">
	<input type="text" name="Prénom[]" id="Prénom" value="" >
	</td>
	<td align="center">
	<input type="text" name="Nom_usage[]" id="Nom_usage" value="" >
	</td>
	<td align="center">
	<input type="text" name="Pseudo[]" id="Pseudo" value="" >
	</td>
	<td align="center">
	<input type="text" name="Nom_courrier[]" id="Nom_courrier" value="" >
	</td>
	<td align="center">
	<input type="text" name="Adresse[]" id="Adresse" value="" >
	</td>
	<td align="center">
	<input type="text" name="Adresse2[]" id="Adresse2" value="" >
	</td>
	<td align="center">
	<input type="text" name="CP[]" id="CP" value="" >
	</td>
	<td align="center">
	<input type="text" name="Ville[]" id="Ville" value="" >
	</td>
	<td align="center">
	<input type="text" name="Pays[]" id="Pays" value="" >
	</td>
	<td align="center">
	<input type="date" name="date_naissance[]" id="date_naissance" value="" >
	</td>
	<td align="center">
	<input type="date" name="date_décès[]" id="date_décès" value="" >
	</td>
	<td align="center">
	<input type="text" name="Activité[]" id="Activité" value="" >
	</td>
	<td align="center">
	<input type="text" name="Siret_RNA[]" id="Siret_RNA" value="" >
	</td>
	<td align="center">
	<input type="number" step="0.001" name="Taux_usuel[]" id="Taux_usuel" value=,08 >
	</td><td align="center">
	<input type="text" name="Civilité[]" id="Civilité" value="" >
	</td>
	<td align="center">
	<input type="text" name="Type[]" id="Type" value="" >
	</td>
	<td align="center">
	<input type="hidden" name="ID[]" value="">
	</td>
	<td><input type="hidden" name = "sup[]" value="Ins" ></td>
	</tr>

	<tr><input type="submit" value="valider"></tr>


	</form>
	</table>
</body>


<script>
	alert("Bonjour les Amis!");
/*const toutsup = document.querySelectorAll('input[type="button"]');
for (var i=0; i < toutsup.length; i++) {
	toutsup[i].addEventListener('click', function() {
		this.value = "Sup"});

}
*/
const ligne = document.querySelectorAll('tr');
	for (var i=0; i <ligne.length; i++) {
		let bouton = ligne[i].querySelector('input[type="button"]');
			let sup = ligne[i].querySelector('input[name="sup[]"]');
			ligne[i].addEventListener('click', function() {
				//je teste s'il s'agit d'un bouton sup et dans ce cas je demande la confirmation
				switch (bouton.value) {
				
				case 'Mod':{
					let rep = prompt("Vous confirmer la suppression de cet auteur ?", "ok");
					if (rep == "ok") {
					       	bouton.value = "Sup";
						sup.value = "Sup";
						}
					break;}
		
					
				case 'Ins':{
					let rep = prompt("Combien de lignes voulez vous insérer ? :", '1');
					if (rep) {
						let ins = this.cloneNode(true);// la ligne dupliquée
						for (var j=0; j <rep ; j++) {
							let noeudparent = this.parentNode; // le parent
							noeudparent.insertBefore(ins, this);
						}
						}
					break;}
				
				case 'Sup':{
					bouton.value = "Mod";
					sup.value = "Sup";
					break;}

				default :{
					alert('y a une nouille dans le potage !');
					break;}

				}
			
			})};
</script>

</html>
