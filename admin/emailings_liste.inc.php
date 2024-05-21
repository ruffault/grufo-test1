<?php
// DUPLICATION D'UN EMAILING
if(isset($_GET['ID']) && is_numeric($_GET['ID']) && isset($_GET['action']) && $_GET['action'] == "dupliquer")
{
  $old_emailing = new emailing();
	$old_emailing -> lire_emailing($_GET['ID']);
	$new_emailing = new emailing();
	$new_emailing -> EMAIL_SENDER 	= addslashes($old_emailing -> EMAIL_SENDER);
	$new_emailing -> NOM_SENDER 	  = addslashes($old_emailing -> NOM_SENDER);
	$new_emailing -> SUJET 					= addslashes($old_emailing -> SUJET);
	$new_emailing -> CONTENU 	    	= addslashes($old_emailing -> CONTENU);
	$new_emailing -> FORMAT 				= addslashes($old_emailing -> FORMAT);
	$new_emailing -> STATUT 				= addslashes($old_emailing -> STATUT);
  $new_emailing -> insert_emailing();
}
// SUPPRESSION D'UN EMAILING
if(isset($_GET['ID']) && is_numeric($_GET['ID']) && isset($_GET['action']) && $_GET['action'] == "supprimer")
{
	// Suppression des fichiers joints a cet emailing
	$array_attachments = getArrayEmailingsPJFile($_GET["ID"],"".$PATH_PJ."");
	foreach($array_attachments as $ZeFILE)
	{
		unlink("".$PATH_PJ.$ZeFILE."");
	}
	// Suppression de l'emailing de la table
	$req_del = "DELETE FROM emailings_contenus WHERE ID='".$_GET["ID"]."' LIMIT 1";
	$res_del = mysql_query($req_del);
	// Suppression des destinataires de l'emailing de la table
	$req_del_destinaitaires = "DELETE FROM emailings_destinataires WHERE ID_EMAILING='".$_GET["ID"]."'";
	$res_del_destinaitaires = mysql_query($req_del_destinaitaires);
}
//check if the starting row variable was passed in the URL or not
if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
  //we give the value of the starting row to 0 because nothing was found in URL
  $startrow = 0;
//otherwise we take the value from the URL
} else {
  $startrow = (int)$_GET['startrow'];
}
//otherwise we take the value from the URL
// Récupération de la liste complete des emailings
$sql = "SELECT `ID`,`DATETIME_CREATION`,`SUJET`,`STATUT` FROM `emailings_contenus` ORDER BY `DATETIME_CREATION` DESC LIMIT $startrow, 10";
$req = mysql_query($sql) or die ("Erreur SQL : ".mysql_error());
?>

<DIV class="header">EMAILINGS : Accueil</DIV>

<p><a href="index2.php?page=emailings&subpage=ajout">=> Créer un nouvel emailing <=</a></p>
<p><a href="index2.php?page=emailings&subpage=emailsuplog">=> Log Désinscription <=</a></p>

<p><b>Voici la liste des emailings existants :</b></p>
<?php

echo '<table class="table">';
echo '<tr>';
    echo '<td><b>SUJET</b></td>';
    echo '<td><b>DATE CREATION</b></td>';
    echo '<td><b>ENVOYES</b></td>';
    echo '<td><b>ATTENTE</b></td>';
    echo '<td><b>TOTAL DEST.</b></td>';
    echo '<td><b>PIECES JOINTES</b></td>';
    echo '<td><b>STATUT</b></td>';
    echo '<td colspan="7"><b>ACTIONS</b></td>';
echo '</tr>';
    while ($data = mysql_fetch_object($req))
    {
    	echo '<tr>';
    		echo '<td>'.$data->SUJET.'</td>';
    		echo '<td>'.getDateFR($data->DATETIME_CREATION).'</td>';
    		echo '<td>'.showNbrDestinatairesEmailing($data->ID,'envoyes').'</td>';
    		echo '<td>'.showNbrDestinatairesEmailing($data->ID,'attente').'</td>';
    		echo '<td>'.showNbrDestinatairesEmailing($data->ID,'tous').'</td>';
    		// On compte le nombre de pieces jointes associées a cet emailing et on affiche le nombre trouvé
    		echo '<td>'.count(getArrayEmailingsPJFile($data->ID,$PATH_PJ)).'</td>';
    		echo '<td>'.getStatut($data->STATUT).'</td>';
    		echo '<td><a href="emailings_preview.php?ID='.$data->ID.'" target="_blank"><img src="./css/picto_ie.gif" alt="Prévisualiser cet Emailing" title="Prévisualiser cet Emailing"></a></td>';
    		echo '<td><a href="index2.php?page=emailings&subpage=destinataires&ID='.$data->ID.'"><img src="./css/picto_bonhomme.gif" alt="Gérer les destinataires de cet Emailing" title="Gérer les destinataires de cet Emailing"></a></td>';
    		echo '<td><a href="index2.php?page=emailings&subpage=attachments&ID='.$data->ID.'"><img src="./css/picto_trombonne.gif" alt="Gérer les Piéces jointes associées é cet Emailing" title="Gérer les Pièces jointes associées à cet Emailing"></a></td>';
    		echo '<td><a href="index2.php?page=emailings&subpage=envoi&ID='.$data->ID.'"><img src="./css/picto_outlook_express.gif" alt="Expédier cet Emailing" title="Expédier cet Emailing"></a></td>';
    		echo '<td><a href="index2.php?page=emailings&subpage=modif&ID='.$data->ID.'"><img src="./css/picto_edit.gif" alt="Modifier cet Emailing" title="Modifier cet Emailing"></a></td>';
    		echo '<td><a href="index2.php?page=emailings&action=dupliquer&ID='.$data->ID.'"><img src="./css/picto_dupliquer.gif" alt="Dupliquer cet Emailing" title="Dupliquer cet Emailing"></a></td>';
    		echo '<td><a href="index2.php?page=emailings&action=supprimer&ID='.$data->ID.'"onclick="return confirm("Voulez-vous vraiment supprimer cet élément ?");"><img src="./css/picto_poubelle.gif" alt="Supprimer cet Emailing" title="Supprimer cet Emailing"></a></td>';
        echo '</tr>';
    }
    echo '</table>';

//now this is the link..
echo '<a href="'.$_SERVER['PHP_SELF'].'?page=emailings&startrow='.($startrow+10).'"> Suivant </a>';
$prev = $startrow - 10;

//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0)
    echo '<br><a href="'.$_SERVER['PHP_SELF'].'?page=emailings&startrow='.$prev.'"><br> Précédent </a>';
?>
