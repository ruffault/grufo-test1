<?php

/*
Description : Connection � la base de donn�e Mysql

Auteur : Willy Morin
Date de cr�ation : 26/11/2003
D�rni�re modification : 26/11/2003
Nouvelle modification passage mysql � mysqli par G�rard Ruffalt le 10/10/2020 
*/

/*//param�tres de connection
$host = 'localhost';
$user = 'web2_u1';
$pass = '150576dicoland';
$bdd = 'web2_db1';
*/
//param�tres de connection
$host = 'localhost';
$user = 'c1_dico';
$pass = '150576dico';
$bdd = 'c1_dicodb';
//erreurs
$mysql_error_connect = 'Connexion au serveur impossible. Veuillez contacter un administrateur.';
$mysql_error_select = 'Impossible de s�l�ctionner la base de donn�es. Veuillez contacter un administrateur.';

//connexion
//On commente l'ancien mode de connexion mysql
//@mysql_connect($host,$user,$pass) or die($mysql_error_connect);

//@mysql_select_db($bdd) or die($mysql_error_select);

//on se connecte avec le nouveau mode mysqli
$link=mysqli_connect($host,$user,$pass,$bdd)or die($mysql_error_connect);
?>
