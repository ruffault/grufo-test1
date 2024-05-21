<?php
session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';

if (isset($_POST["quantite"]) && is_numeric($_POST["quantite"]))
{
	$quantite  = count_basket_entry($_SESSION["id_commande"], $_POST["id"]);

	if ($_POST["quantite"] == 0)
	{
		delete_basket_entry($_SESSION["id_commande"], $_POST["id"]);
	}

	//Si on souhaite ajouter des produits
	elseif ($quantite < $_POST["quantite"] && $_POST["quantite"] > 0)
	{
		// Calcul de la quantité manquante
		$quantite =  $_POST["quantite"] - $quantite;
		for($i = 1; $i < $quantite + 1; $i++)
		{
			add_basket_entry($_SESSION["id_commande"], $_POST["id"]);

		}
	}
	//si on souhaite en retirer
	elseif($quantite > $_POST["quantite"] && $_POST["quantite"] > 0)
	{
		//calcul de la quantité à supprimer
		$quantite =  $quantite - $_POST["quantite"];
		delete_basket_entry($_SESSION["id_commande"], $_POST["id"], $quantite);
	}
}
elseif ($_POST["typeaction"] == "decote")
{
	if($_SESSION['id_membre'])
	{
		$sql_future = "SELECT *
									FROM commande,utilisateur, membre
									WHERE statut = '9'
									AND membre.id_membre = utilisateur.id_membre
									AND membre.id_membre='" . $_SESSION['id_membre'] . "'
									AND commande.id_utilisateur = utilisateur.id_utilisateur;";
	}
	else
	{
		$sql_future = "SELECT * FROM commande
										WHERE statut = '9'
										AND id_utilisateur = '" . $_SESSION["id_user"] . "'
										LIMIT 1;";
	}
	$sql_future_result = mysql_query($sql_future);

	if (mysql_num_rows($sql_future_result))
	{
		//oui, on récupére son id
		$val_future = mysql_fetch_array($sql_future_result);
		$id_future = $val_future["id_commande"];
	}
	else
	{
		//non ! alors on en crée une avec un statut 9
		$sql_addfuture = "INSERT INTO commande(id_commande,
																						id_utilisateur,
																						date_creation,
																						statut)
											VALUES('',
															'" . $_SESSION["id_user"] . "',
															'" . date("Y-m-d H:i:s") . "',
															'9'
														);";
		mysql_query($sql_addfuture);

		//et on récupére son id
		$id_future = mysql_insert_id();
	}
	$sql_move_panier = "UPDATE panier
											SET id_commande = '" . $id_future . "'
											WHERE id_commande = '" . $_SESSION["id_commande"] . "'
											AND id_produit = '" . $_POST["id"]. "';";
	mysql_query($sql_move_panier);
}
elseif ($_POST["typeaction"] == "remettrepanier")
{
  if($_SESSION["id_membre"])
  {
    $sql_panier_future = "SELECT panier.id_panier
                    FROM panier,
                         commande,
                         utilisateur,
                         membre,
                         produit
                    WHERE statut = '9'
                    AND commande.id_utilisateur = utilisateur.id_utilisateur
                    AND membre.id_membre = utilisateur.id_membre
                    AND membre.id_membre = '" . $_SESSION["id_membre"] . "'
                    AND panier.id_commande = commande.id_commande
                    AND produit.id_produit = panier.id_produit
                    AND produit.id_produit = '" . $_POST["id"] . "';";
  }
  else
  {
    $sql_panier_future = "SELECT panier.id_panier
                FROM panier,
                     commande,
                     utilisateur,
                     membre,
                     produit
                WHERE statut = '9'
                AND utilisateur.id_utilisateur = '" . $_SESSION["id_user"] . "'
                AND commande.id_utilisateur = utilisateur.id_utilisateur
                AND panier.id_commande = commande.id_commande
                AND produit.id_produit = panier.id_produit
                AND produit.id_produit = '" . $_POST["id"] . "';";
  }
  $sql_panier_future_result = mysql_query($sql_panier_future);

  while($val = mysql_fetch_array($sql_panier_future_result))
  {
    $sql_move_panier = "UPDATE panier
                        SET id_commande = '" . $_SESSION["id_commande"] . "'
                        WHERE id_panier = '" . $val["id_panier"] . "';";
    mysql_query($sql_move_panier);
  }
}
elseif ($_POST["typeaction"] == "supprimer")
{
  if ($_SESSION["id_membre"])
  {
    $sql_panier_future = "SELECT panier.id_panier
                    FROM panier,
                         commande,
                         utilisateur,
                         membre,
                         produit
                    WHERE statut = '9'
                    AND commande.id_utilisateur = utilisateur.id_utilisateur
                    AND membre.id_membre = utilisateur.id_membre
                    AND membre.id_membre = '" . $_SESSION["id_membre"] . "'
                    AND panier.id_commande = commande.id_commande
                    AND produit.id_produit = panier.id_produit
                    AND produit.id_produit = '" . $_POST["id"] . "';";
  }
  else
  {
    $sql_panier_future = "SELECT panier.id_panier
                FROM panier,
                     commande,
                     utilisateur,
                     produit
                WHERE statut = '9'
                AND utilisateur.id_utilisateur = '" . $_SESSION["id_user"] . "'
                AND commande.id_utilisateur = utilisateur.id_utilisateur
                AND panier.id_commande = commande.id_commande
                AND produit.id_produit = panier.id_produit
                AND produit.id_produit = '" . $_POST["id"] . "';";
  }
  $sql_panier_future_result = mysql_query($sql_panier_future);

  while($val = mysql_fetch_array($sql_panier_future_result))
  {
    $sql_move_panier = "DELETE FROM panier
                        WHERE id_panier = '" . $val["id_panier"] . "';";
    mysql_query($sql_move_panier);
  }
}
$redirection =  "Location: index.php?page=showpanier";
header($redirection);
?>
