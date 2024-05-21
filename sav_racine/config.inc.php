<?php

//parametres de connection
$host = "localhost";	//Serveur Mysql
$user = "web2_u1";		//utilisateur
$pass = "150576dicoland";		//pass
$bdd = "web2_db1";		//Nom Bdd Mysql
$namesite = "Dicoland.com";
$urlsite = "http://www.dicoland.com/";
//$urlsite = "http://www2.dicoland.com/";

//$debug = true;

//Nombre de produit par page du catalogue
$nbcatpage = 20;

$mailwebmaster = "Dicoland.com <service-client@dicoland.com>"; //adresse de l'emetteur
$mailadmin = "admin@dicoland.com"; // adresse du recepteur

function sellang($code = 'fr')
{
	switch($code)
	{
		case 'en':
			return 'en';
			break;
		case 'it':
			return 'it';
			break;
		case 'de':
			return 'de';
			break;
		case 'es':
			return 'es';
			break;
		default:
			return 'fr';
			break;
	}
}

function is_valid_langage($code)
{
	switch($code)
	{
		case 'en':
			return true;
			break;
		case 'it':
			return true;
			break;
		case 'de':
			return true;
			break;
		case 'es':
			return true;
			break;
		case 'fr':
			return true;
			break;
		default:
			return false;
			break;
	}
}
$originalurl = $urlsite;

$cfglan = strtolower(sellang($_SESSION['applicationlang']));

if ($adminpart == 1)
	require ("../lang/$cfglan/config.lang.php");
else
	require ("lang/$cfglan/config.lang.php");

if ((!isset($_SESSION['applicationlang']) or ($_SESSION['applicationlang']))
	&& isset($_GET['aplan']) && is_valid_langage($_GET['aplan']))
{
	$urlsite = $urlsite . $_GET['aplan'] . '/';
}
else
{
	$urlsite = $urlsite . $cfglan . '/';
}
//echo $urlsite;
?>
