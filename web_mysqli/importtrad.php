<?php

/* Connexion */
$host = 'localhost';
$user = 'dicoland';
$pass = 'a7sbu14e';
$bdd= 'dicoland';
// conversion mysqli - problème du @
// @mysql_connect($host,$user,$pass) or die('Fail to connect database');
// @mysql_select_db($bdd) or die('Fail to select database');
$link = mysqli_connect($host,$user,$pass,$bdd) or die('Fail to connect database');
/* Main program */
function update_title($id_product, $title, $lang)
{

	echo "maj du titre<br />";
	$sql = "UPDATE `produit`
					SET `nom_" . $lang . "` = '" . addslashes($title) . "'
					WHERE `id_produit` = '" . $id_product . "'
					LIMIT 1;";
	$res = mysqli_query($link,$sql) or die(mysqli_error($link));
}

function update_desc($id_product, $desc, $lang)
{
	echo "maj de la description<br />";
	$sql = "UPDATE `produit`
					SET `description_" . $lang . "` = '" . addslashes($desc) . "'
					WHERE `id_produit` = '" . $id_product . "'
					LIMIT 1;";
	$res = mysqli_query($link,$sql) or die(mysqli_error($link));
}

function book_read($id_product, $title, $desc, $lang)
{
	$title = trim($title);
	$desc = trim($desc);

	$sql = 'SELECT id_produit as A,
						nom_' . $lang . ' as B,
						description_' . $lang . ' as C
					FROM produit
					WHERE id_produit = "' . $id_product . '"
					;';
	$res = mysqli_query($link,$sql) or die(mysqli_error($link));

	while($val = mysqli_fetch_assoc($res))
	{
		$val['B'] = trim($val['B']);
		$val['C'] = trim($val['C']);

		if ($title != $val['B'] && $title != 'NULL' && $title != '')
		{
			update_title($id_product, $title, $lang);
		}
		else if ($val['B'] == 'NULL')
		{
			echo 'titre manquant<br />';
		}
		else if ($title = $val['B'])
		{
			//on ne fait rien
		}

		if ($desc != $val['C'] && $desc != 'NULL' && $desc != '')
		{
			update_desc($id_product, $desc, $lang);
		}
		else if ($val['C'] == 'NULL')
		{
			echo 'desc manquant<br />';
		}
		else if ($desc = $val['C'])
		{
			//on ne fait rien
		}
	}
}

$lang = 'it';

$sql = 'SELECT * FROM ' . $lang . ';';
$res = mysqli_query($link,$sql) or die(mysqli_error($link));
while($val = mysqli_fetch_assoc($res))
{
	book_read($val['A'], $val['B'], $val['C'], $lang);
}


?>
