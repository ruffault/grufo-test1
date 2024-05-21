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
		<style type="text/css">
		input:invalid {
			border: red solid 3px;
			}
		</style>
	</head>

	<body>
		<h1> Gestion des Droits d'auteurs pour maison d'édition </h1>
		<h2> Gestion des informations sur les auteurs </h2>
<!-- je crée le tableau qui va permettre d'afficher les données pour chaque auteur -->
	<table width="100%"  border-collapse=collapse border="0" cellspacing="0" cellpadding=0">
	<tr>
	<td align="center"><strong>Etat</strong></td>
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
	<td><input type="text" name = "action[]" value="Act" readonly></td>
	<td > 
	<input type="text" name="Type_cotisant[]"  pattern="[1234]" value="<?php echo $auteur->Type_cotisant();?>" >
	</td>
		<td>
	<!--<input type="text" name="n°_SS[]"  pattern="[123478][0-9]{2}(0[1-9]|1[0-2]|3[1-9]|4[0-2]|[5-9][0-9]|20)([0][1-9]|2[AB]|[1-9][0-9])([0-9]{3})(00[1-9]|0[1-9][0-9]|[1-9][0-9]{2})" value="<?php //echo $auteur->n°_SS();?>" >-->
	<input type="text" name="n°_SS[]"  value="<?php echo $auteur->n°_SS();?>" >
	</td>
	<td>
<!--	<input type="text" name="clé_SS[]" pattern="(0[1-9]|[1-8][0-9]|9[0-7])" value="<?php// echo $auteur->clé_SS();?>" >-->
	<input type="text" name="clé_SS[]"  value="<?php echo $auteur->clé_SS();?>" >
	</td>
	<td >
	<input type="text" name="Nom[]" pattern="[\wãåāàâæáäėēęêéèëūüûùúīîïióöôœÂÄÊÉÈËYÜÛUÎÏÖÔŒ/. ',-]*" value="<?php echo $auteur->Nom();?>" >
	</td>
	<td>
	<input type="text" name="Prénom[]" pattern="[\wãåāàâæáäėēęêéèëūüûùúīîïióöôœÂÄÊÉÈËYÜÛUÎÏÖÔŒ/. ',-]*" value="<?php echo $auteur->Prénom();?>" >
	</td>
	<td>
	<input type="text" name="Nom_usage[]" pattern="[\wãåāàâæáäėēęêéèëūüûùúīîïióöôœÂÄÊÉÈËYÜÛUÎÏÖÔŒ/. ',-]*" value="<?php echo $auteur->Nom_usage();?>" >
	</td>
	<td>
	<input type="text" name="Pseudo[]" pattern="[\wãåāàâæáäėēęêéèëūüûùúīîïióöôœÂÄÊÉÈËYÜÛUÎÏÖÔŒ/. ',-]*" value="<?php echo $auteur->Pseudo();?>" >
	</td>
	<td>
	<input type="mail" name="Nom_courrier[]" value="<?php echo $auteur->Nom_courrier();?>" >
	</td>
	<td>
	<input type="text" name="Adresse[]" pattern="[\wãåāàâæáäėēęêéèëūüûùúīîïióöôœÂÄÊÉÈËYÜÛUÎÏÖÔŒ/. ',-]*" value="<?php echo $auteur->Adresse();?>" >
	</td>
	<td>
	<input type="text" name="Adresse2[]"  pattern="[\wãåāàâæáäėēęêéèëūüûùúīîïióöôœÂÄÊÉÈËYÜÛUÎÏÖÔŒ/. ',-]*" value="<?php echo $auteur->Adresse2();?>" >
	</td>
	<td>
	<input type="text" name="CP[]" pattern="\d*" value="<?php echo $auteur->CP();?>" >
	</td>
	<td>
	<input type="text" name="Ville[]" pattern="[\wãåāàâæáäėēęêéèëūüûùúīîïióöôœÂÄÊÉÈËYÜÛUÎÏÖÔŒ/. ',-]*" value="<?php echo $auteur->Ville();?>" >
	</td>
	<td>
	<input type="text" name="Pays[]" pattern="[\wãåāàâæáäėēęêéèëūüûùúīîïióöôœÂÄÊÉÈËYÜÛUÎÏÖÔŒ/. ',-]*" value="<?php echo $auteur->Pays();?>" >
	</td>
	<td>
	<input type="date" name="date_naissance[]" value="<?php echo $auteur->date_naissance();?>" >
	</td>
	<td>
	<input type="date" name="date_décès[]" value="<?php echo $auteur->date_décès();?>" >
	</td>
	<td>
	<input type="text" name="Activité[]" pattern="[\wãåāàâæáäėēęêéèëūüûùúīîïióöôœÂÄÊÉÈËYÜÛUÎÏÖÔŒ/. ',-]*" value="<?php echo $auteur->Activité();?>" >
	</td>
	<td>
	<input type="text" name="Siret_RNA[]" value="<?php echo $auteur->Siret_RNA();?>" >
	</td>
	<td>
	<input type="number" step="0.001" name="Taux_usuel[]" value="<?php echo $auteur->Taux_usuel();?>" >
	</td><td>
	<input type="text" name="Civilité[]" value="<?php echo $auteur->Civilité();?>" >
	</td>
	<td>
	<input type="text" name="Type[]" value="<?php echo $auteur->Type();?>" >
	</td>
	<td>
	<input type="hidden" name="ID[]" value="<?php echo $auteur->ID();?>">
	</td>
	</tr>
<?php
	} // fin d'un auteur
	//on rajoute une ligne pour proposer un nouvel auteur
?>
	<tr>	
	<td><input type="text" name = "action[]" value="Ajout"  readonly></td>
	<td >
	<input type="text" pattern="[1234]" name="Type_cotisant[]" value="" >
	</td>
	<td>
	<input type="text" name="n°_SS[]" value=""  pattern="[123478][0-9]{2}(0[1-9]|1[0-2]|3[1-9]|4[0-2]|[5-9][0-9]|20)([0][1-9]|2[AB]|[1-9][0-9])([0-9]{3})(00[1-9]|0[1-9][0-9]|[1-9][0-9]{2})">
	</td>
	<td>
	<input type="text" name="clé_SS[]" value="" pattern="(0[1-9]|[1-8][0-9]|9[0-7])" >
	</td>
	<td >
	<input type="text" name="Nom[]" value="" >
	</td>
	<td>
	<input type="text" name="Prénom[]" value="" >
	</td>
	<td>
	<input type="text" name="Nom_usage[]" value="" >
	</td>
	<td>
	<input type="text" name="Pseudo[]" value="" >
	</td>
	<td>
	<input type="text" name="Nom_courrier[]" value="" >
	</td>
	<td>
	<input type="text" name="Adresse[]" value="" >
	</td>
	<td>
	<input type="text" name="Adresse2[]" value="" >
	</td>
	<td>
	<input type="text" name="CP[]" value="" >
	</td>
	<td>
	<input type="text" name="Ville[]" value="" >
	</td>
	<td>
	<input type="text" name="Pays[]" value="" >
	</td>
	<td>
	<input type="date" name="date_naissance[]" value="" >
	</td>
	<td>
	<input type="date" name="date_décès[]" value="" >
	</td>
	<td>
	<input type="text" name="Activité[]" value="" >
	</td>
	<td>
	<input type="text" name="Siret_RNA[]" value="" >
	</td>
	<td>
	<input type="number" step="0.001" name="Taux_usuel[]" value=,08 >
	</td><td>
	<input type="text" name="Civilité[]" value="" >
	</td>
	<td>
	<input type="text" name="Type[]" value="" >
	</td>
	<td>
	<input type="hidden" name="ID[]" value="">
	</td>
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
//	let test1 = document.querySelector('input[name="test"]');
//	test1.addEventListener('input', function () {alert("le test marche!"); });
	const ligne = document.querySelectorAll('tr');
	for (var i=1; i <((ligne.length)-1); i++) {//on devrait exclure le premier <tr> qui correspond au titre
		//alert(ligne[i].childNodes.length);alert('je suis là');
		let action = ligne[i].querySelector('input[name="action[]"]');
		let champ = ligne[i].querySelectorAll('input:not([name="action[]"])');
		if (action == null) {alert("i vaut" + i + "champ vaut:" +champ);}
			
		for (var j=0; j<champ.length; j++) {
			champ[j].addEventListener('input', function() {
			if (action.value == "Act") {action.value ="Maj";} 
			if (action.value == "Ajout") {action.value ="Ins";} });
		}		
		action.addEventListener('click', function() {
				//je teste s'il s'agit d'un bouton sup et dans ce cas je demande la confirmation
				switch (action.value) {
				
				case 'Act':{
					let rep = prompt("Vous confirmer la suppression de cet auteur ?", "ok");
					if (rep == "ok") {
					       	action.value = "Sup";
						//sup.value = "Sup";
						}
					break;}
		
					
				case 'Ajout':{
					let acopier = this.closest('tr');
					let rep = prompt("Combien de lignes voulez vous insérer ? :");
					if (rep) {
						for (var n=0; n <rep ; n++) {
							let clone = acopier.cloneNode(true);// la ligne dupliquée
							let noeudparent = acopier.parentNode; // le parent
							let newajout = noeudparent.insertBefore(clone, acopier);
							let actionins = newajout.querySelector('input[name="action[]"]');
							let champins = newajout.querySelectorAll('input:not([name="action[]"])');
							actionins.addEventListener('click', function (){
							
								let rep = prompt("Vous voulez vraiment annuler votre insertion?:", "ok");
								if (rep == "ok") {
									actionins.value = "Ajout";
								}
							});
							
							for (var j=0; j<champins.length; j++) {
								champins[j].addEventListener('input', function() {
								if (actionins.value == "Ajout") {actionins.value ="Ins";} });
							}
							acopier = newajout;
					
						}
						}
					break;}
				
				case 'Sup':{
					action.value = "Act";
					//sup.value = "Sup";
					break;}
				case 'Maj':{
					let rep = prompt("Vous voulez vraiment annuler votre mise à jour?:", "ok");
					if (rep == "ok") {
						action.value = "Act";
					}
					break;}

				case 'Ins':{
					let rep = prompt("Vous voulez vraiment annuler votre mise à jour?:", "ok");
					if (rep == "ok") {
						action.value = "Ajout";
					}
					break;}
				default :{
					alert('y a une nouille dans le potage !');
					break;}
				}
			
		})};
function printChildNodes(noeud) {
	
		    var nbNoeud = noeud.childNodes.length;
	
    alert("Nombre de noeuds enfants dans childNodes => "+nbNoeud);

    for ( var i=0 ; i < nbNoeud ; i++ ) {

        alert('--------- '+i+' -------------');

        alert("Constructeur =>"+noeud.childNodes[i].constructor);

        alert("nodeName  => "+noeud.childNodes[i].nodeName);

        alert("nodeType  => "+noeud.childNodes[i].nodeType);

        alert("nodeValue => "+escape(noeud.childNodes[i].nodeValue));

    }
let noeud = prompt('quel noeud:');
}
printChildNodes(noeud);

</script>

</html>
