<!DOCTYPE html>
<html>
	<head>
		<title>Gestion des Droits Auteurs/MAJ auteurs</title>
		<meta charset="utf-8" />
		<style type="text/css">
	table {
	width:100%;	
	table-layout: auto;
}
	thead th {
		position : sticky;
		top : 0;
		border: green solid 2px;		
}
 	#chpinput1 {
		width : 30px;
}
 	#chpinput2 {
		width : 20px;
}
		</style>

</head>

<body>

<h1> C'est un test pour les formats des tableaux Html</h1>

<table>
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
<form action="testtable.php" method="post">
<tr> 
	<td><input id = "chpinput1" type = "text" value = "Le titre de la première colonne"></td> 
	<td><input id = "chpinput2" type = "text" value = "petit titre"</td> 
		<td><input type = "text" value = "tt ptit"></td>
	<td>Le titre de la quatrième colonne est très long long</td> 
	<td>Le titre de la cinquième colonne</td> 
	<td>Le titre de la sixième colonne</td> 
	<td>Le titre de la septième colonne est très long long</td> 
	<td>Le titre de la huitième colonne</td> 
	<td>Le titre de la neuvième colonne</td> 
<td>tt ptit</td>
	<td>Le titre de la quatrième colonne est très long long</td> 
	<td>Le titre de la cinquième colonne</td> 
	<td>Le titre de la sixième colonne</td> 
	<td>Le titre de la septième colonne est très long long</td> 
	<td>Le titre de la huitième colonne</td> 
	<td>Le titre de la neuvième colonne</td> 
</tr>
<?php
// je crée un certain nombre $i de lignes 
$i = 1;
while ($i <= 10) {
?>
<tr>
	<td>Le contenu de la 1ère colonne</td> 
	<td>Le contenu de la 2ème colonne est très long</td> 
		<td>petit</td>
	<td>Le contenu de la 4ème colonne</td> 
	<td>Le contenu de la 5ème colonne</td> 
	<td>Le contenu de la 6ème colonne</td> 
	<td>Le contenu de la 7ème colonne</td> 
	<td>Le contenu de la 8ème colonne</td> 
	<td>Le contenu de la 9ème colonne</td>
<td>petit</td>
	<td>Le contenu de la 4ème colonne</td> 
	<td>Le contenu de la 5ème colonne</td> 
	<td>Le contenu de la 6ème colonne</td> 
	<td>Le contenu de la 7ème colonne</td> 
	<td>Le contenu de la 8ème colonne</td> 
	<td>Le contenu de la 9ème colonne</td>
</tr>
<?php
	$i++;
}
?>
</form>
</table>
</body>
