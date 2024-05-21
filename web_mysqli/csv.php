<?php
	require 'inc/config.inc.php';
	require 'inc/connexion.inc.php';
	require 'inc/function.inc.php';
	require 'inc/session.inc.php';
	
//on recupere les infos dans la bdd

$sql = "SELECT produit.nom_fr as nom, editeur.nom as nom_editeur,
								langues,
								reference,
								isbn,
								prix_editeur,
								date_parution
					FROM produit, editeur
					WHERE produit.id_editeur = 12 
					AND editeur.id_editeur = 12
					AND produit.sommeil <> 1
					ORDER BY nom
					;";

$res = mysqli_query($link,$sql)or die('echec requete ligne : '.__LINE__.'<br />avec la requete : '.$sql.'<br/>avec le message : '.mysqli_error($link));


$contenu='Nom;langues;reference;isbn;date parution;prix'."\r\n";
while ($val=mysqli_fetch_array($res)){

$contenu=$contenu.$val['nom]'.';'.$val['langues]'.';'.$val['reference'].';'.$val['isbn'].';'.invert_date(trim($val['date_parution'])).';'.$val['prix_editeur']."\r\n";
}
echo " test:".$contenu"";
/*
$file="livres_ed.csv";
$fp=fopen($file,"w" ); // ouverture du fichier
fputs($fp,$contenu); // enregistrement des données ds le fichier
fclose($fp);
header("Content-Type: application/force-download" );
header("Content-Length: ".filesize($file));
header("Content-Disposition: attachment; filename=".$file);
readfile($file);
unlink($file);
*/



?>
