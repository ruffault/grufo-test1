<?php
//On enregistre notre autoload.
function chargerClasse($classname)
{
	require 'classes/' . $classname.'.php';
}

spl_autoload_register('chargerClasse');
session_start(); // On appelle session_start() APRÈS avoir enregistré l'autoload.

if (isset($_GET['deconnexion']))
{
	  session_destroy();
	    header('Location: .');
	    exit();
}
try
{
	$db = new PDO('mysql:host=localhost;dbname=testdroitsauteur', 'gerard', '150576GR');
}
catch (Exception $e)
{
	die('Erreur: ' . $e->getMessage());
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gestion des Droits Auteurs</title>
		<meta charset="utf-8" />
	</head>

	<body>
		<h1> Gestion des Droits d'auteurs pour maison d'édition </h1>

		<p>
		Vous entrez dans le système de gestion des droits d'auteurs conçu et développé par BIBI </br>

		Ce système vous permettra :</br>
			Pour vos auteurs</br>
				- de calculer leurs droits acquis</br>

				- de préparer et éditer la fiche droits auteurs à leur produire une fois par an</br>
			Pour un certain d'organismes officiels</br>
				- de satisfaire à vos obligations réglementaires:notamment auprès de l'AGESSA</br>

				- ...</br>
			Pour vos besoins propres de gestion:</br>
				- d'avoir une vision immédiate et à jour des relations avec vos auteurs</br>
				- ...</br>

		</p>

		<p> Pour gérer des droits d'auteurs il faut connaître le minimum d'information sur :</br>
			<a href = "inc/form_auteur.inc.php">	- les auteurs (leurs identités, détails </a></br>
			<a href = "inc/form_livre.inc.php">   - les livres, références, nom ,prix,</a></br>
				- les relations contractuelles que vous avez négociées avec vos auteurs </br>
		 		- les transactions qui sont intervenues sur vos livres et notamment celles qui donnent droit à des rémunérations</br>
				- les horizons de temps sur lesquels vous souhaitez ou devez faire vos calculs ou vos analyses</br>
				- les références notamment administratives par lesquelles vous êtes reconnues auprès des administrations</br>
		Pour aboutir à des résultats fiables il faut que ces informations soient à jour, parfois avec une connaissance des limites de temps </br>
		pendant lesquelles elles s'appliquent.</br>
		</p>


	</body>
</html>


