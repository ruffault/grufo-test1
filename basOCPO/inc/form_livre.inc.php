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
$livres =  $acces->ListeTousLivres();//array contenant toutes les instances d'auteurs
//il s'agit maintenant d'afficher le formulaire permettant la mise à jour de chacun des champs en colonnes pour chacun des auteurs en ligne
//
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gestion des Droits Auteurs/MAJ livres</title>
		<meta charset="utf-8" />
		<style type="text/css">
		input:invalid {
			border: red solid 3px;
			}
		thead th {
			position:sticky;
			top : 0;
			border: green solid 2px;		
}

	
		.chpinput1 {
			background-color : grey;
			text-align:center;
			width : 30px;
			border: black solid 2px;
			border-radius : 25%;
margin: 0; padding:0;
		}	
		.chpinput2 {
			width : 54px;
			text-align: center;
		}
		.chpinput3 {
			width : 90px;
		}	
		.chpinput4 {
			width : 70px;
		}
		.chpinput5 {
			width : 80px;
		}
		.chpinput6 {
			width : 100px;
		}
		.chpinput7 {
			width : 35px;
		}
		.chpinput8 {
			width : 120px;
		}
		.chpinput9 {
			width : 140px;
		}
		.chpinput10 {
			width : 20px;
		}
		.chpinput11 {
			width : 20px;
		}
		.chpinput12 {
			width : 20px;
		}
		.chpinput13 {
			width : 20px;
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
		<h2> Gestion des informations sur les livres </h2>

<!-- je fais un retour sur une éventuelle mise à jour précédente-->
<p id= "banretour">
	<?php
		if ((isset($_GET['sup']) ? $_GET['sup'] : '') ) echo "On a supprimé ".$_GET['sup']." livre(s),</br>";
		if ((isset($_GET['maj']) ? $_GET['maj'] : '') ) echo "On a mis à jour ".$_GET['maj']." livre(s),</br>";
		if ((isset($_GET['ins']) ? $_GET['ins'] : '') ) echo "On a ajouté ".$_GET['ins']." livre(s),</br>";

	?>
</p>
<!-- je crée le tableau qui va permettre d'afficher les données pour chaque auteur -->
	<table    >
	<caption>Mise a jour table des Livres</caption>
<thead>	
<tr>
	<th scope="col">Etat</th>
	<th scope="col">code</th>
	<th scope="col">Titre</th>
	
	</tr>
</thead>
<!-- on démarre le formulaire -->
<form id="monform" action="maj_livre.inc.php" method="post">
<?php
//on boucle sur chacun des auteurs dont chaque instance va etre dans $auteur
	foreach ($livres as $livre)
	{
?>
	<tr>	
	<td><input class = "chpinput1" type="text" name = "action[]" value="Act" readonly></td>
	<td > 
	<input class ="chpinput2" type="text" name="code[]"  pattern="[0-9]{8}" value="<?php echo $livre->code();?>" >
	</td>
		<td>
	<!--<input type="text" name="n°_SS[]"  pattern="[123478][0-9]{2}(0[1-9]|1[0-2]|3[1-9]|4[0-2]|[5-9][0-9]|20)([0][1-9]|2[AB]|[1-9][0-9])([0-9]{3})(00[1-9]|0[1-9][0-9]|[1-9][0-9]{2})" value="<?php //echo $auteur->n°_SS();?>" >-->
	<input class = "chpinput3" type="text" name="Titre[]"  value="<?php echo $livre->Titre();?>" >
	</td>

	<td>
	<input type="hidden" name="ID[]" value="<?php echo $livre->ID();?>">
	</td>
	</tr>
<?php
	} // fin d'un livre
	//on rajoute une ligne pour proposer un nouveau livre
?>
	<tr>	
	<td><input class = "chpinput1" type="text" name = "action[]" form = "monform" value="Ajout"  readonly></th>
	<td >
	<input class = "chpinput2" type="text" pattern="[0123456789]" name="code[]" form = "monform" value="" >
	</td>
	<td>
	<input class = "chpinput3" type="text" name="Titre[]" form = "monform" value=""  >
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
			if (action.value == "Ajout") {action.value ="Ins";action.style.backgroundColor = 'green';} });
		}		
		action.addEventListener('click', function() {
				//je teste s'il s'agit d'un bouton sup et dans ce cas je demande la confirmation
				switch (action.value) {
				
				case 'Act':{
					let rep = prompt("Vous confirmer la suppression de ce livre ?", "ok");
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
									actionins.style.backgroundColor = 'grey';
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
		

</script>

</html>
