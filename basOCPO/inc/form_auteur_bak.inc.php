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
		thead th {
			position : sticky;
			top : 0;
			border: green solid 2px;		
}
/*		th[scope="col"] {
			position : sticky;
			top : 0;			border: green solid 2px;
			padding : 0;
			margin : 0;
		}*/
		.typecot {
		width: 30px;
		margin: 0px 35px;		
}

		td:nth-child(1)input {
		background-color: pink;
		}
		th[scope="col"]:nth-child(2) input{
			background-color: pink;
			width : 10px;
			text-align: left;
		}
		th[scope="col"]:nth-child(1){
			width : 10px;
			text-align: center;
		}

	
		th[scope="row"] {
			padding : 0;
			margin : 0;
		}
		th[scope="row"] input {
			background-color : grey;
			text-align:center;
			width : 30px;
			border: black solid 2px;
			border-radius : 25%;
margin: 3px; padding:0;
		}	
		table {
			width : 80%;
			border-collapse: collapse;
			border : 0;
			table-layout: auto;
		}
		td {
			padding : 0;
			margin : 0;
		}
		</style>
	</head>

	<body>
		<h1> Gestion des Droits d'auteurs pour maison d'édition </h1>
		<h2> Gestion des informations sur les auteurs </h2>
<!-- je crée le tableau qui va permettre d'afficher les données pour chaque auteur -->
	<table    >
	<caption>Mise a jour table des Auteurs</caption>
<thead>	
<tr>
	<th scope="col">Etat</th>
	<th scope="col">Type Cotisant</th>
	<th scope="col">n° SS</th>
	<th scope="col">clé SS</th>
	<th scope="col">Nom</th>
	<th scope="col">Prénom</th>
	<th scope="col">Nom usage</th>
	<th scope="col">Pseudo</th>
	<th scope="col">Nom courrier</th>
	<th scope="col">Adresse</th>
	<th scope="col">Adresse2</th>
	<th scope="col">CP</th>
	<th scope="col">Ville</th>
	<th scope="col">Pays</th>
	<th scope="col">Date naissance</th>
	<th scope="col">Date décès</th>
	<th scope="col">Activité</th>
	<th scope="col">Siret RNA</th>
	<th scope="col">Taux usuel</th>
	<th scope="col">Civilité</th>
	<th scope="col">Type</th>
	</tr>
</thead>
<!-- on démarre le formulaire -->
<form id="monform" action="maj_auteur.inc.php" method="post">
<?php
//on boucle sur chacun des auteurs dont chaque instance va etre dans $auteur
	foreach ($auteurs as $auteur)
	{
?>
	<tr>	
	<th scope="row"><input type="text" name = "action[]" value="Act" readonly></td>
	<td > 
	<input class ="typecot" type="text" name="Type_cotisant[]"  pattern="[1234]" value="<?php echo $auteur->Type_cotisant();?>" >
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
	<th scope="row"><input type="text" name = "action[]" form = "monform" value="Ajout"  readonly></th>
	<td >
	<input type="text" pattern="[1234]" name="Type_cotisant[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="n°_SS[]" form = "monform" value=""  pattern="[123478][0-9]{2}(0[1-9]|1[0-2]|3[1-9]|4[0-2]|[5-9][0-9]|20)([0][1-9]|2[AB]|[1-9][0-9])([0-9]{3})(00[1-9]|0[1-9][0-9]|[1-9][0-9]{2})">
	</td>
	<td>
	<input type="text" name="clé_SS[]" form = "monform" value="" pattern="(0[1-9]|[1-8][0-9]|9[0-7])" >
	</td>
	<td >
	<input type="text" name="Nom[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="Prénom[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="Nom_usage[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="Pseudo[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="Nom_courrier[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="Adresse[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="Adresse2[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="CP[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="Ville[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="Pays[]" form = "monform" value="" >
	</td>
	<td>
	<input type="date" name="date_naissance[]" form = "monform" value="" >
	</td>
	<td>
	<input type="date" name="date_décès[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="Activité[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="Siret_RNA[]" form = "monform" value="" >
	</td>
	<td>
	<input type="number" step="0.001" name="Taux_usuel[]" form = "monform" value=,08 >
	</td><td>
	<input type="text" name="Civilité[]" form = "monform" value="" >
	</td>
	<td>
	<input type="text" name="Type[]" form = "monform" value="" >
	</td>
	<td>
	<input type="hidden" name="ID[]" form = "monform" value="">
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
	//const monform = document.querySelector('form');
	//alert ("monform vaut :"+monform);
	for (var i=1; i <((ligne.length)-1); i++) {//on devrait exclure le premier <tr> qui correspond au titre
		//alert(ligne[i].childNodes.length);alert('je suis là');
		let action = ligne[i].querySelector('input[name="action[]"]');
		let champ = ligne[i].querySelectorAll('input:not([name="action[]"])');
		if (action == null) {alert("i vaut" + i + "champ vaut:" +champ);}
			
		for (var j=0; j<champ.length; j++) {
			champ[j].addEventListener('input', function() {
			if (action.value == "Act") {action.value ="Maj";action.style.backgroundColor = 'orange';} 
			if (action.value == "Ajout") {action.value ="Ins";action.style.backgroundColor = 'blue';} });
		}		
		action.addEventListener('click', function() {
				//je teste s'il s'agit d'un bouton sup et dans ce cas je demande la confirmation
				switch (action.value) {
				
				case 'Act':{
					let rep = prompt("Vous confirmer la suppression de cet auteur ?", "ok");
					if (rep == "ok") {
					       	action.value = "Sup";
						action.style.backgroundColor = 'red';
						//sup.value = "Sup";
						}
					break;}
		
					
				case 'Ajout':{
					//alert('le form du champ vaut: '+this.localName+this.form+this.nodeType);
					let acopier = this.closest('tr');
					let rep = prompt("Combien de lignes voulez vous insérer ? :");
					if (rep) {
						for (var n=0; n <rep ; n++) {
							let clone = acopier.cloneNode(true);// la ligne dupliquée
							let noeudparent = acopier.parentNode; // le parent
							let newajout = noeudparent.insertBefore(clone, acopier);
							let actionins = newajout.querySelector('input[name="action[]"]');
							actionins.form = "monform";
							//actionins.form  = monform; 
							//alert('actionins.form vaut: '+actions.form);
							let champins = newajout.querySelectorAll('input:not([name="action[]"])');
							actionins.addEventListener('click', function (){
							
								let rep = prompt("Vous voulez vraiment annuler votre insertion?:", "ok");
								if (rep == "ok") {
									actionins.value = "Ajout";
									action.style.backgroundColor = 'blue';
								}
							});
							
							for (var j=0; j<champins.length; j++) {
								
								champins[j].form  = "monform"; 
								champins[j].addEventListener('input', function() {
								if (actionins.value == "Ajout") {actionins.value ="Ins"; actionins.style.backgroundColor = 'green';} });
							}
							acopier = newajout;
					
						}
						}
					break;}
				
				case 'Sup':{
					action.value = "Act";
					action.style.backgroundColor = 'grey';
					//sup.value = "Sup";
					break;}
				case 'Maj':{
					let rep = prompt("Vous voulez vraiment annuler votre mise à jour?:", "ok");
					if (rep == "ok") {
						action.value = "Act";
						action.style.backgroundColor = 'grey';
					}
					break;}

				case 'Ins':{
					let rep = prompt("Vous voulez vraiment annuler votre mise à jour?:", "ok");
					if (rep == "ok") {
						action.value = "Ajout";
						action.style.backgroundColor = 'grey';
					}
					break;}
				default :{
					alert('y a une nouille dans le potage !');
					break;}
				}
			
		})};
		
/*function printChildren(noeud) {
    var nbNoeud = noeud.children.length;
    alert("Nombre de noeuds enfants dans children => "+nbNoeud);
    for ( var i=0 ; i < nbNoeud ; i++ ) {
				            alert('--------- '+i+' -------------');
         alert("Constructeur =>"+noeud.children[i].constructor);
         alert("nodeName  => "+noeud.children[i].nodeName);
	 alert("nodeType  => "+noeud.children[i].nodeType);
	 alert("nodeValue => "+escape(noeud.children[i].nodeValue));
      }
}

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
}
//let noeud = prompt('quel noeud:');
//printChildNodes(document.body);
printChildren(document.body.children[4]);*/
</script>

</html>
