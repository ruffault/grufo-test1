<?php

//paramêtres de connection
$host = "localhost";			//Serveur Mysql
$user = "dicoland";				//utilisateur
$pass = "a7sbu14e";				//pass
$bdd = "dicoland";				//Nom Bdd Mysql

$mysql_error_connect = "Connexion au serveur impossible.";
$mysql_error_select = "Impossible de selectionner la base de donnÃ©es.";

//connection
$link = mysqli_connect($host,$user,$pass,$bdd)
  or die($mysql_error_connect);

//conversion mysqli: mysql_select_db($bdd)
//  or die($mysql_error_select);


//On indique qu'il n'y a aucune image dans la base
$clean = "UPDATE produit SET image = 0;";
mysqli_query($link,$clean) or die(mysqli_error($link));

$query = "SELECT id_produit FROM produit;";
$res = mysqli_query($link,$query) or die(mysqli_error($link));

while($val = mysqli_fetch_array($res))
{
  $filename = '/home/dicoland/www/picproduct/' . $val['id_produit'] . '.jpg';

	if(file_exists($filename))
  {
    $addimg = "UPDATE produit
              SET image = 1
              where id_produit = '" . $val['id_produit'] . "'
              LIMIT 1
              ;";
    mysqli_query($link,$addimg) or die(mysqli_error($link));
		$count++;
  }
}
echo $count;
echo "All pic info have been update in the database.";

?>
