<?php

//parametres de connection
$host = "localhost";	//Serveur Mysql
$user = "c1_dico";		//utilisateur
$pass = "150576dico";		//pass
$bdd = "c1_dicodb";		//Nom Bdd Mysql
$namesite = "Dicoland.com";
$urlsite = "https://dicotest.grufo.ovh/";
//$urlsite = "http://localhost:8888/web/";

$debug = true;

//Nombre de produit par page du catalogue
$nbcatpage = 20;

$mailwebmaster = "Dicoland.com <gerard@grufo.ovh>"; //adresse de l'emetteur
$mailadmin = "gerard@grufo.ovh"; // adresse du recepteur

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
$cfglan = strtolower(sellang((isset($_SESSION['applicationlang']) ? $_SESSION['applicationlang'] : '') ));
if (isset ($adminpart) ? $adminpart : '' == 1)
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
