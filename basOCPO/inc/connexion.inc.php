<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=testdroitsauteur', 'gerard', '150576GR');
}
catch (Exception $e)
{
	die('Erreur: ' . $e->getMessage());
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
$acces = new Acces_Bdd_Da($db);
?>
