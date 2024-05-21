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
// Récupération de la liste complete des emailings
$sql = "SELECT * FROM emailings_contenus";
$req = mysql_query($sql) or die ("Erreur SQL : ".mysql_error());
?>
<DIV>EMAILINGS : Accueil</DIV>
<BR><BR>

<p><a href="index2.php?page=emailings&subpage=ajout">=> Créer un nouvel emailing <=</a></p>

<p><b>Voici la liste des emailings existants :</b></p>

<TABLE BORDER="1" CELLSPACING="5">
<TR>
    <TD ALIGN="center"><B>SUJET</B></TD>
    <TD ALIGN="center"><B>DATE CREATION</B></TD>
    <TD ALIGN="center"><B>ENVOYES</B></TD>
    <TD ALIGN="center"><B>ATTENTE</B></TD>
    <TD ALIGN="center"><B>TOTAL DEST.</B></TD>
    <TD ALIGN="center"><B>PIECES JOINTES</B></TD>
    <TD ALIGN="center"><B>STATUT</B></TD>
    <TD ALIGN="center"COLSPAN="7"><B>ACTIONS</B></TD>
</TR>
    <?
    while ($data = mysql_fetch_array($req))
    {
        ?>
        <TR>
        <TD><?= $data["SUJET"] ?></TD>
        <TD ALIGN="center"><?= getDateFR($data["DATETIME_CREATION"]) ?></TD>
        <TD ALIGN="center"><?= showNbrDestinatairesEmailing($data['ID'],"envoyes"); ?></TD>
        <TD ALIGN="center"><?= showNbrDestinatairesEmailing($data['ID'],"attente"); ?></TD>
        <TD ALIGN="center"><?= showNbrDestinatairesEmailing($data['ID'],"tous"); ?></TD>
        <TD ALIGN="center">
        <?php
        // On compte le nombre de pieces jointes associées a cet emailing et on affiche le nombre trouvé
        echo count(getArrayEmailingsPJFile($data['ID'],$PATH_PJ));
        ?>
        </TD>
        <TD ALIGN="center"><?= getStatut($data["STATUT"]) ?></TD>
        <TD ALIGN="center"><A HREF="emailings_preview.php?ID=<?= $data['ID'] ?>" target="_blank"><IMG SRC="./css/picto_ie.gif" BORDER="0" alt="Prévisualiser cet Emailing" title="Prévisualiser cet Emailing"></A></TD>
        <TD ALIGN="center"><A HREF="index2.php?page=emailings&subpage=destinataires&ID=<?= $data['ID'] ?>"><IMG SRC="./css/picto_bonhomme.gif" BORDER="0" alt="Gérer les destinataires de cet Emailing" title="Gérer les destinataires de cet Emailing"></A></TD>
        <TD ALIGN="center"><A HREF="index2.php?page=emailings&subpage=attachments&ID=<?= $data['ID'] ?>"><IMG SRC="./css/picto_trombonne.gif" BORDER="0" alt="Gérer les Pièces jointes associées à cet Emailing" title="Gérer les Pièces jointes associées à cet Emailing"></A></TD>
        <TD ALIGN="center"><A HREF="index2.php?page=emailings&subpage=envoi&ID=<?= $data['ID'] ?>"><IMG SRC="./css/picto_outlook_express.gif" BORDER="0" alt="Expédier cet Emailing" title="Expédier cet Emailing"></A></TD>
        <TD ALIGN="center"><A HREF="index2.php?page=emailings&subpage=modif&ID=<?= $data['ID'] ?>"><IMG SRC="./css/picto_edit.gif" BORDER="0" alt="Modifier cet Emailing" title="Modifier cet Emailing"></A></TD>
        <TD ALIGN="center"><A HREF="index2.php?page=emailings&action=dupliquer&ID=<?= $data['ID'] ?>"><IMG SRC="./css/picto_dupliquer.gif" BORDER="0" alt="Dupliquer cet Emailing" title="Dupliquer cet Emailing"></A></TD>
        <TD ALIGN="center"><A HREF="index2.php?page=emailings&action=supprimer&ID=<?= $data['ID'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');"><IMG SRC="./css/picto_poubelle.gif" BORDER="0" alt="Supprimer cet Emailing" title="Supprimer cet Emailing"></A></TD>
        </TR>
        <?
    }
    ?>
</TABLE>