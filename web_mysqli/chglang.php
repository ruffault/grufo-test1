<?php

session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';

if (good_lang($_GET['aplan']))
{
	// Si lang valide on la switch dans la session
	$_SESSION['applicationlang'] = $_GET['aplan'];

	if (!empty($_SESSION["id_membre"]) && $_SESSION["id_membre"] != 0)
	{
		// Si c'est un membre on met à jour sa langue.
		$sql = "UPDATE `membre`
						SET `aplan` = '" . $_GET['aplan'] . "'
						WHERE `id_membre` = '" . $_SESSION["id_membre"]  . "'
						LIMIT 1;";
		$res = mysqli_query($link,$sql);
	}
}

if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == $originalurl)
{
	header('Location: ' . $urlsite);
}
elseif ($_SERVER['HTTP_REFERER'])
{
	$newurl =  $urlsite . ereg_replace($originalurl . "(fr|en|it|es|de)?/", '', $_SERVER['HTTP_REFERER']);
	header('Location: ' . $newurl);
}
else
{
	header('Location: ' . $urlsite);
}

?>
