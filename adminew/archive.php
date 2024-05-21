<?php
require ("include/verifsession.inc.php");
require ("include/connexion.inc.php");
$sql_archive = "UPDATE commande
                SET archive = '1'
                WHERE id_commande = '" . addslashes($_GET['id_commande']). "'
                LIMIT 1;";
mysqli_query($link,$sql_archive);
$redirection = 'index2.php?page=viewcommande&traite=1';
header("Location: $redirection");
?>
