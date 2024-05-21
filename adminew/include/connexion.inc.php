<?php

/*
Description : Connection à la base de donnée Mysql

Auteur : Willy Morin
Date de création : 26/11/2003
Dérniére modification : 26/11/2003
Nouvelle modification passage mysql à mysqli par Gérard Ruffalt le 10/10/2020 
*/

/*//paramêtres de connection
$host = 'localhost';
$user = 'web2_u1';
$pass = '150576dicoland';
$bdd = 'web2_db1';
*/
//paramêtres de connection
$host = 'localhost';
$user = 'c1_dico';
$pass = '150576dico';
$bdd = 'c1_dicodb';
//erreurs
$mysql_error_connect = 'Connexion au serveur impossible. Veuillez contacter un administrateur.';
$mysql_error_select = 'Impossible de séléctionner la base de données. Veuillez contacter un administrateur.';

//connexion
//On commente l'ancien mode de connexion mysql
//@mysql_connect($host,$user,$pass) or die($mysql_error_connect);

//@mysql_select_db($bdd) or die($mysql_error_select);

//on se connecte avec le nouveau mode mysqli
$link=mysqli_connect($host,$user,$pass,$bdd)or die($mysql_error_connect);
?>
