<?php
$ResultMessageOK = "";
$ResultMessageKO = "";
$MAX_FILE_SIZE = 8500000;

if(!isset($_GET['ID']) && !isset($_POST['ID']))
{
    echo "Impossible d'identifier le emailing";
    return;
}
if (isset($_GET['ID']) && is_numeric($_GET['ID']))
{
	$ID = $_GET['ID'];
}
if (isset($_POST['ID']) && is_numeric($_POST['ID']))
{
	$ID = $_POST['ID'];
}
/////////// UPLOAD D'UN FICHIER JOINT   /////////////////
if(isset($_POST["action"]) && trim($_POST["action"]) == "ENREGISTRER" && isset($ID) && is_numeric($ID) )
{
	// Upload du fichier sélectionné et renommage selon la norme attendue
	if (isset($_FILES["fichier_attachment"]["name"]) && trim($_FILES["fichier_attachment"]["name"]))
	{
    	// On test si on doit uploader un fichier de taille valide ou non
    	if ($_FILES["fichier_attachment"]["size"] > $MAX_FILE_SIZE || $_FILES["fichier_attachment"]["size"] == 0)
    	{
				$ResultMessageKO.= "Erreur : La taille du fichier à uploader est > à ".$MAX_FILE_SIZE." Ko.<BR>";
    	}
    	else
    	{
				// On nettoie le nom du fichier a uploader en remplacant par des underscores tout ce qui n'est pas : lettres, chiffres ou underscores
				$Nom_fichier_sans_extension = NettoyerChaineParUnderscores(substr(trim($_FILES["fichier_attachment"]["name"]), 0, -4));
				$Extension_fichier = strtolower(substr($_FILES["fichier_attachment"]["name"], -4));
				$FichierDestination = $ID."_".$Nom_fichier_sans_extension.$Extension_fichier;
				$uploaded_ok = move_uploaded_file($_FILES["fichier_attachment"]["tmp_name"], "".$PATH_PJ.$FichierDestination."");
    		// On verifie que l'upload se soit bien passé.
    		if ($uploaded_ok)
    		{
					chmod($PATH_PJ.$FichierDestination, 0777);
					$ResultMessageOK.= "Succès : Le fichier \"".$FichierDestination."\" a été uploadé correctement sur le serveur.<br>";
    		}
    		else
    		{
    			$ResultMessageKO.= "Erreur : Le fichier \"".$_FILES["fichier_attachment"]["name"]."\" n'a pas été uploadé correctement sur le serveur.<br>";
    		}
    	}
	}
	else
	{
		$ResultMessageKO.= "Erreur : Fichier non-sélectionné.<br>";
	}
}
/////////// SUPPRESSION D'UN FICHIER JOINT   /////////////////
if(isset($_POST["action"]) && trim($_POST["action"]) == "Supprimer" && isset($ID) && is_numeric($ID) && isset($_POST["filename"]) && file_exists("".$PATH_PJ.$_POST["filename"]."") )
{
	$del_file = unlink("".$PATH_PJ.$_POST["filename"]."");
	if ($del_file)
	{
		$ResultMessageOK.= "Succès : Suppression du fichier ".substr($_POST["filename"],2);
	}
	else
	{
		$ResultMessageKO.= "Echec : Impossible de supprimer le fichier ".substr($_POST["filename"],2);
	}
}
?>
<DIV>EMAILINGS : Gestion des pièces jointes</DIV>
<BR>

<p><a href="index2.php?page=emailings"><= Retour à l'accueil</a></p>

<?php
if (isset($ResultMessageOK) && trim($ResultMessageOK))
{
	echo "<span class=\"succes\"><b>".$ResultMessageOK."</b></span><br>";
}
if (isset($ResultMessageKO) && trim($ResultMessageKO))
{
	echo "<span class=\"echec\"><b>".$ResultMessageKO."</b></span><br>";
}
?>

<FORM NAME="form" ACTION="index2.php?page=emailings&subpage=attachments" METHOD="post" enctype="multipart/form-data">
  <INPUT TYPE="hidden" NAME="ID" VALUE="<?= $ID ?>">
<TABLE BORDER="0" CELLSPACING="5">
<TR>
    <TD VALIGN="top" COLSPAN="2" align="left">
    	<b>ASSOCIER UN FICHIER A JOINDRE AU MAIL</b>
    	<br>
    	<br>
    	Merci de sélectionner le fichier à ajouter à cet emailing :
    	<br>
    	<span class="alerte"><i>Le nom du fichier ne doit contenir que des lettres, des chiffres et des underscores ("_") et ne doit pas dépasser un poids de <?php echo $MAX_FILE_SIZE; ?> octets.</i></span>
    </TD>
</TR>
<TR>
    <TD COLSPAN="2" align="left">
    	<input type="file" name="fichier_attachment" value="" class="input_txt_immense"> <INPUT TYPE="submit" NAME="action" VALUE="ENREGISTRER">
    </TD>
</TR>
</TABLE>
</FORM>

<?php
// Liste des fichiers actuellement associés
// On compte le nombre de pieces jointes associées a cet emailing et on affiche le nombre trouvé
$nbr_attachment = count(getArrayEmailingsPJFile($ID,"".$PATH_PJ.""));
?>
<span><b><?= $nbr_attachment ?> fichier(s) actuellement associé(s) à cet Emailing.</b></span>
<br>
<?php
if ($nbr_attachment)
{
	$array_attachments = getArrayEmailingsPJFile($ID,"".$PATH_PJ."");
	echo "<table border=\"0\">";
	foreach($array_attachments as $ZeFILE)
	{
		echo "<form name=\"del_file_".$ZeFILE."\" method=\"post\">";
		echo "<tr vAlign=\"absmiddle\">";
		echo "<td><a href=\"".$PATH_PJ.$ID."_".substr($ZeFILE,strlen($ID)+1)."\" target=\"_blank\" title=\"Voir ce document\">".substr($ZeFILE,strlen($ID)+1)."</a></td>";
		echo "<td>";
		echo "<input type=\"hidden\" name=\"filename\" value=\"".$ZeFILE."\">";
		echo "<input type=\"hidden\" name=\"ID\" value=\"".$ID."\">";
		echo "<input type=\"submit\" name=\"action\" value=\"Supprimer\">";
		echo "</td>";
		echo "</tr>";
		echo "</form>";
	}
	echo "</table>";
}
?>
</table>