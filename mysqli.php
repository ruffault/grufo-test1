<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "    <head>";

echo "        <title>pour testet mysqli et la gestion des charset</title>";

 echo "        <meta charset='utf-8' />";

 echo "   </head>";

 echo "   <body>";

 echo "        <h2>Page de test</h2>";

        
 echo "         <p>";

 echo "            Cette page contient du code HTML avec des balises PHP.<br />";

	      $host="localhost";
	      $user="c1_dico"; 
	      $pass="150576dico";
	      $bdd="c1_dicodb" ;
	   $link = mysqli_connect($host,$user,$pass,$bdd) or die("connexion ratee");

	       $sql= "SELECT * FROM produit WHERE id_produit = " . $_GET['prod'] .";";
	       $resul = mysqli_query($link,$sql);
	       $var = mysqli_fetch_assoc($resul);
	       var_dump($var);
	       echo "ce que je cherche: ". $var['realname'];
	       echo "        </p>";

														        
 echo "       <ul>";

 echo "       <li style='color: blue;'>Texte en bleu</li>";

 echo "       <li style='color: red;'>Texte en rouge</li>";

 echo "       <li style='color: green;'>Texte en vert</li>";

 echo "       </ul>";

 echo "  </body>";

echo "</html>";

 ?>
