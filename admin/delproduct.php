<?php
include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");

//efface le produit de la table produit.
$sql_erase_product =  "DELETE FROM `produit`
                      WHERE `id_produit` = '" . $_GET["produit"] . "'
                      LIMIT 1
                      ;";
mysql_query($sql_erase_product);

//efface les langues correspondant au produit
$sql_erase_langue =  "DELETE FROM `langue_produit`
                      WHERE `id_produit` = '" . $_GET["produit"] . "'
                      ;";
mysql_query($sql_erase_langue);

//Redirection vers les résultats de la recherche
$redirection = "index2.php?page=searchproduct&showresult=1&page_courante=" . $_GET["page_courante"] . "&nbresult_par_page=25";
header("location: $redirection");
?>