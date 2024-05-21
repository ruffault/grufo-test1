<?php
//Transforme une date de la forme jj-mm-aaaa vers aaaa-mm-jj
function date_fr_to_us($date) {

	// GR 25/10/20 remplace list($day, $month, $year) = split('-', $date);
	list($day, $month, $year) = explode('-', $date);
 $date = $year . '-' . $month . '-' . $day;
	return $date;

}
function date_us_to_fr($date) {

	//list($year, $month, $day) = split('-', $date);
	list($day, $month, $year) = explode('-', $date);
 $date = $day . '-' . $month . '-' . $year;
	return $date;

}
// Le formulaire d'ajout a été posté
if (isset($_POST["action"]) && $_POST["action"] == "save")
{
	// On vérifie si tous les champs obligatoires ont été remplis
	$nbr_erreurs = 0;
	$ResultMessage = "";
	if (!trim($_POST["TITRE_MSG"]))
	{
		$nbr_erreurs++;
		$ResultMessage.= "Le champ Titre est obligatoire.<br>";
	}
	if (!trim($_POST["CONTENU_MSG"]))
	{
		$nbr_erreurs++;
		$ResultMessage.= "Le champ Contenu est obligatoire.<br>";
	}
	// Pas d'erreurs, on enregistre le nouveau message
	if (!$nbr_erreurs)
	{

		// Si $_POST["ID_MSG"] est passé, on veut donc mettre a jour le message concerné, sinon, on enregistre un nouveau message !
		if (isset($_POST["ID_MSG"]))
		{
			$sql_save_edited_message = "UPDATE messages SET TITRE_MSG='".addslashes($_POST["TITRE_MSG"])."', CONTENU_MSG='".addslashes($_POST["CONTENU_MSG"])."', LIEU_AFFICHAGE_MSG='".$_POST["LIEU_AFFICHAGE_MSG"]."', LANGUE_MSG='".$_POST["LANGUE_MSG"]."', CIBLE_MSG='".$_POST["CIBLE_MSG"]."', DATE_START_MSG='".date_fr_to_us($_POST["DATE_START_MSG"])."', DATE_STOP_MSG='".date_fr_to_us($_POST["DATE_STOP_MSG"])."' WHERE ID_MSG='".$_POST["ID_MSG"]."'";
			$res_save_edited_message = mysqli_query($link,$sql_save_edited_message);
		}
		else
		{
			$sql_save_message = "INSERT INTO messages
			(ID_MSG,TITRE_MSG,CONTENU_MSG,LIEU_AFFICHAGE_MSG,LANGUE_MSG,CIBLE_MSG,DATE_START_MSG,DATE_STOP_MSG)
			VALUES ('','".addslashes($_POST["TITRE_MSG"])."','".addslashes($_POST["CONTENU_MSG"])."','".$_POST["LIEU_AFFICHAGE_MSG"]."','".$_POST["LANGUE_MSG"]."','".$_POST["CIBLE_MSG"]."','".date_fr_to_us($_POST["DATE_START_MSG"])."','".date_fr_to_us($_POST["DATE_STOP_MSG"])."')";
			$res_save_message = mysqli_query($link,$sql_save_message);
		}
	}
}

// Le formulaire de suppression a été posté
if (isset($_GET["action"]) && $_GET["action"] == "delete" && isset($_GET["ID_MSG"]) && is_numeric($_GET["ID_MSG"]))
{
	$sql_delete_messages = "DELETE FROM messages WHERE ID_MSG=".$_GET["ID_MSG"]." LIMIT 1";
	$res_delete_messages = mysqli_query($link,$sql_delete_messages);
}

// Le formulaire d'édition a été posté, on récupère les infos du message concerné
if (isset($_GET["action"]) && $_GET["action"] == "edit" && isset($_GET["ID_MSG"]) && is_numeric($_GET["ID_MSG"]))
{
	$sql_get_message = "SELECT * FROM messages WHERE ID_MSG=".$_GET["ID_MSG"]." LIMIT 1";
	$res_get_message = mysqli_query($link,$sql_get_message);
	while ($val_get_message = mysqli_fetch_array($res_get_message))
	{
		$TITRE_MSG = stripslashes($val_get_message["TITRE_MSG"]);
		$CONTENU_MSG = stripslashes($val_get_message["CONTENU_MSG"]);
		$LIEU_AFFICHAGE_MSG = $val_get_message["LIEU_AFFICHAGE_MSG"];
		$LANGUE_MSG = $val_get_message["LANGUE_MSG"];
		$CIBLE_MSG = $val_get_message["CIBLE_MSG"];
		$DATE_START_MSG = date_us_to_fr($val_get_message["DATE_START_MSG"]);
		$DATE_STOP_MSG = date_us_to_fr($val_get_message["DATE_STOP_MSG"]);
	}
}

echo "<div class='spacer'></div>";
//Formulaire d'Ajout d'un message sur la home page
?>
<form name="formeditmessage" method="post" action="index2.php?page=messages">
  <div id="formeditmessage">
	<?php
	if (isset($ResultMessage))
	{
		echo "<div id=\"echec\">".$ResultMessage."</div>";
	}
	?>
  <table>
  	<tr>
  		<td colspan="3">
  			<h2>Titre</h2>
  			<input type="text" class="titre" size='255' value="<?php if(isset($TITRE_MSG)) { echo $TITRE_MSG; } ?>" name="TITRE_MSG" />
  		</td>
  	</tr>
	<tr>
  		<td colspan="3">
			  <h2>Contenu</h2>
			  <textarea name="CONTENU_MSG"><?php if(isset($CONTENU_MSG)) { echo $CONTENU_MSG; } ?></textarea>
  		</td>
	</tr>
  	<tr>
  		<td>
			  <h2>Cible</h2>
			  <select name="CIBLE_MSG">
			  	<option name="CIBLE_MSG" value="membres" <?php if(isset($CIBLE_MSG) && $CIBLE_MSG == "membres") { echo "selected"; } ?>>Membres uniquement
			  	<option name="CIBLE_MSG" value="public"  <?php if((isset($CIBLE_MSG) && $CIBLE_MSG == "public") || !isset($CIBLE_MSG)) { echo "selected"; } ?>>Tout le monde
			  </select>
  		</td>
  		<td>
				<h2>Langue</h2>
			  <select name="LANGUE_MSG">
			  	<option name="LANGUE_MSG" value="" <?php if(isset($LANGUE_MSG) && $LANGUE_MSG == "" || !isset($LANGUE_MSG)) { echo "selected"; } ?>>Toutes
			  	<option name="LANGUE_MSG" value="fr" <?php if(isset($LANGUE_MSG) && $LANGUE_MSG == "fr") { echo "selected"; } ?>>Français
			  	<option name="LANGUE_MSG" value="en" <?php if(isset($LANGUE_MSG) && $LANGUE_MSG == "en") { echo "selected"; } ?>>Anglais
			  	<option name="LANGUE_MSG" value="de" <?php if(isset($LANGUE_MSG) && $LANGUE_MSG == "de") { echo "selected"; } ?>>Allemand
			  	<option name="LANGUE_MSG" value="es" <?php if(isset($LANGUE_MSG) && $LANGUE_MSG == "es") { echo "selected"; } ?>>Espagnol
			  	<option name="LANGUE_MSG" value="it" <?php if(isset($LANGUE_MSG) && $LANGUE_MSG == "it") { echo "selected"; } ?>>Italien
			  </select>
  		</td>
  		<td>
			  <h2>Lieu d'affichage</h2>
			  <select name="LIEU_AFFICHAGE_MSG">
			  	<option name="LIEU_AFFICHAGE_MSG" value="accueil">Page d'accueil
			  </select>
  		</td>
  	</tr>
		<tr>
			<td colspan="2">
  			<h2>Période d'affichage (format jj-mm-aaaa)</h2>
  			du <input type="text" class="date" value="<?php if(isset($DATE_START_MSG)) { echo $DATE_START_MSG; }else{ echo date("d-m-Y"); } ?>" size='10' name="DATE_START_MSG" /> au <input type="text" class="date" value="<?php if(isset($DATE_STOP_MSG)) { echo $DATE_STOP_MSG; }else{ echo date("d-m-Y"); } ?>" size='10' name="DATE_STOP_MSG" />
			</td>
			<td>
				<?php
				// On veut mettre a jour un message en cours d'édition
				if (isset($_GET["action"]) && $_GET["action"] == "edit" && isset($_GET["ID_MSG"]) && is_numeric($_GET["ID_MSG"]))
				{
				?>
					<input type="hidden" value="<?= $_GET["ID_MSG"] ?>" name="ID_MSG" />
				<?php
				}
				?>
				<input type="hidden" value="save" name="action" />
  			<input type="submit" value="Enregistrer" name="bouton" />
			</td>
		</tr>
	</table>
  </div>
</form>
<?php
echo "<div class='spacer'></div>";
$sql_liste_messages = "SELECT *
            FROM messages
            ORDER BY LIEU_AFFICHAGE_MSG
           ;";

$res_liste_messages = mysqli_query($link,$sql_liste_messages);
?>
<div id="formlistemessages">
<table>
<?php
while ($val_liste_messages = mysqli_fetch_array($res_liste_messages))
{
	?>
	<tr class="titre">
		<td colspan="6">Titre</td>
	</tr>
	<tr vAlign="top">
		<td colspan="6">
			<?php
				echo $val_liste_messages["TITRE_MSG"];
			?>
		</td>
	</tr>
	<tr class="titre">
		<td>Contenu</td>
		<td>Cible</td>
		<td>Langue</td>
		<td>Lieu</td>
		<td>Période</td>
		<td>Actions</td>
	</tr>
	<tr vAlign="top" align="middle">
		<td>
			<?php
				echo $val_liste_messages["CONTENU_MSG"];
			?>
		</td>
		<td>
			<?php
			echo "<img src=\"css/acces_".$val_liste_messages["CIBLE_MSG"].".gif\" border=\"0\" title=\"".$val_liste_messages["CIBLE_MSG"]."\">";
			?>
		</td>
		<td>
			<?php
			echo "<img src=\"css/flag_".$val_liste_messages["LANGUE_MSG"].".gif\" border=\"0\">";
			?>
		</td>
		<td>
			<?php
				echo $val_liste_messages["LIEU_AFFICHAGE_MSG"];
			?>
		</td>
		<td>
			Publié du<br />
			<nobr>
			<?php
				echo date_us_to_fr($val_liste_messages["DATE_START_MSG"]);
				echo "<br />au<br />";
				echo date_us_to_fr($val_liste_messages["DATE_STOP_MSG"]);
			?>
		</nobr>
		</td>
		<td>
			<a href="?page=messages&action=edit&ID_MSG=<?= $val_liste_messages["ID_MSG"] ?>"><img src="css/user2.gif" border="0" title="Modifier ce message"></a>
			<a href="?page=messages&action=delete&ID_MSG=<?= $val_liste_messages["ID_MSG"] ?>"><img src="css/bad.gif" border="0" title="Supprimer ce message"></a>
		</td>
	</tr>
	<tr bgcolor="black" height="5">
		<td colspan="6">
		</td>
	</tr>
	<?php
}
?>
</table>
</div>
<?php
echo "<div class='spacer'></div>";
?>
