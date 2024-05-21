<?php
//On enregistre notre autoload.
function chargerClasse($classname)
{
	require $classname.'.php';
}

spl_autoload_register('chargerClasse');
$auteur1 = new Auteur;
//var_dump($auteur1->listeat());
//je vais maintenant mettre à jour la base de données de ce nouvel auteur

try
{
	$db = new PDO('mysql:host=localhost;dbname=testdroitsauteur', 'gerard', '150576GR');
}
catch (Exception $e)
{
	die('Erreur: ' . $e->getMessage());
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$acces_bdd = new Acces_Bdd_Da($db);
//echo $acces_bdd->_db;
$acces_bdd->add($auteur1);

