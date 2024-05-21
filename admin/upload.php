<?php
include ("include/verifsession.inc.php");
include ("include/createpic.inc.php");
include ("include/connexion.inc.php");
$uploaddir = '../picproduct/';

// efface les anciennes images
//unlink_wc($uploaddir, $_POST["id_produit"] . "*.*");

//on upload le fichier et on recupere l'extension
eregi("(...)$",$_FILES['userfile']['name'],$extension);
$extension[1] = strtolower($extension[1]);
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir . $_POST["id_produit"] . "." . $extension[1]);

//on le redimensionne en conséquence.
RatioResizeImg($_POST["id_produit"] . "." . $extension[1], 80, 80, $uploaddir, $_POST["id_produit"] . "_icon." . $extension[1]);
RatioResizeImg($_POST["id_produit"] . "." . $extension[1], 150, 150, $uploaddir, $_POST["id_produit"] . "_mini." . $extension[1]);
RatioResizeImg($_POST["id_produit"] . "." . $extension[1], 400, 400, $uploaddir, $_POST["id_produit"] . "_normal." . $extension[1]);

//on passe le bit d'image à 1 pour le produit
$query = "UPDATE produit
					SET image = '1'
					WHERE id_produit = '" . $_POST["id_produit"] . "'
					LIMIT 1;";
mysql_query($query);

//on renvoie sur la page d'ajout / modification / suppression d'images
$redirection = "index2.php?page=showpic&produit=" . $_POST["id_produit"];
header("location: $redirection");
?>