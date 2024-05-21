<?php
include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");
include ("include/function.inc.php");

//reception var
$ref= isset($_POST['ref']) ? addslashes($_POST['ref']): '';
$prix= isset($_POST['prix']) ? addslashes($_POST['prix']): '';
$prix_editeur= isset($_POST['prix_editeur']) ? addslashes($_POST['prix_editeur']): '';
$product_actif= isset($_POST['product_actif']) ? addslashes($_POST['product_actif']): '';

if ($product_actif == 1){
$query = "UPDATE produit SET
	prix='$prix',
	prix_editeur='$prix_editeur',
	sommeil='$product_actif',
	 date_modif = '" . date("Y-m-d") . "',
	disponible=0
	WHERE reference ='$ref' OR isbn='$ref'
	";
	$result = mysql_query($query)or die('echec requete ligne : '.__LINE__.'<br />avec la requete : '.$query.'<br/>avec le message : '.mysql_error());

$nb = mysql_affected_rows();
header("location: index2.php?page=tva_7&id=des");
exit();

   	}else{ 
   	$query = "UPDATE produit SET
				prix='$prix',
				prix_editeur='$prix_editeur',
				sommeil='$product_actif',
				 date_modif = '" . date("Y-m-d") . "'
				WHERE reference ='$ref' OR isbn='$ref'
				";
				
				$result = mysql_query($query)or die('echec requete ligne : '.__LINE__.'<br />avec la requete : '.$query.'<br/>avec le message : '.mysql_error());

$nb = mysql_affected_rows();
header("location: index2.php?page=tva_7&id=ok");
exit();
}






?>

