<?php

//paramêtres de connection
$host = "localhost";			//Serveur Mysql
$user = "dicoland";				//utilisateur
$pass = "a7sbu14e";				//pass
$bdd = "dicoland";				//Nom Bdd Mysql

$mysql_error_connect = "Connexion au serveur impossible.";
$mysql_error_select = "Impossible de selectionner la base de donnÃ©es.";

//connection
mysql_connect($host,$user,$pass)
  or die($mysql_error_connect);

mysql_select_db($bdd)
  or die($mysql_error_select);


//On indique qu'il n'y a aucune image dans la base
$clean = "UPDATE produit SET image = 0;";
mysql_query($clean) or die(mysql_error());

$query = "SELECT id_produit FROM produit;";
$res = mysql_query($query) or die(mysql_error());

while($val = mysql_fetch_array($res))
{
  $filename = '/home/dicoland/www/picproduct/' . $val['id_produit'] . '.jpg';

	if(file_exists($filename))
  {
    $addimg = "UPDATE produit
              SET image = 1
              where id_produit = '" . $val['id_produit'] . "'
              LIMIT 1
              ;";
    mysql_query($addimg) or die(mysql_error());
		$count++;
  }
}
echo $count;
echo "All pic info have been update in the database.";

?>