<?php
session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

//Ajoute un produit au panier
$sql_info_product = "SELECT produit.prix, produit.rabais, type.tva
											FROM produit, type
											WHERE produit.id_produit = '" . mysql_real_escape_string($_GET['id_produit']) . "'
											AND produit.id_type = type.id_type
                    ;";

$sql_info_product_result = mysql_query($sql_info_product);
$val_info_product = mysql_fetch_array($sql_info_product_result);

$sql_addtopanier = "INSERT INTO panier(
																				id_panier,
																				id_commande,
																				id_produit,
																				prix_unitaire,
																				discount,
																				quantite,
																				taxes
																			)
										VALUES(
														'',
														'" . mysql_real_escape_string($_SESSION["id_commande"]) . "',
														'" . mysql_real_escape_string($_GET["id_produit"]) . "',
														'" . $val_info_product["prix"] . "',
														'" . $val_info_product["rabais"] . "',
														'1',
														'" . $val_info_product["tva"] . "'
													)
                    ;";

for($i=0; $i < $_GET["quantite"]; $i++) {
  mysql_query($sql_addtopanier);
}
if (!$_GET["pagecourante"])
  $pagecourante = 1;
else
  $pagecourante = $_GET["pagecourante"];
if (!$_GET["nbpage"])
  $_GET["nbpage"] = 0;
if (!$_GET["nbresult"])
  $_GET["nbresult"] = 0;

//$redirection =  "Location: article-" . $_POST["id_produit"] . "-"
//. $_GET["nbpage"] . "-" . $pagecourante . "-" . $_GET["nbresult"] . ".html";
//$redirection = "Location: " . $_SERVER["HTTP_REFERER"];
$redirection = "Location: index.php?page=showpanier&ajout=1&url=" . urlencode($_SERVER["HTTP_REFERER"]);
header($redirection);
?>
