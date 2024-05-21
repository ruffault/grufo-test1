<?php
if (isset($_POST['ID']) && isset($_POST['action']))
{
  $emailing = new emailing();
  $emailing->ID 		    		= $_POST['ID'];
	$emailing->EMAIL_SENDER 	= addslashes($_POST['EMAIL_SENDER']);
	$emailing->NOM_SENDER 	  = addslashes($_POST['NOM_SENDER']);
	$emailing->SUJET 					= addslashes($_POST['SUJET']);
	$emailing->CONTENU 	    	= addslashes($_POST['CONTENU']);
	$emailing->FORMAT 				= addslashes($_POST['FORMAT']);
	$emailing->STATUT 				= addslashes($_POST['STATUT']);
  $emailing->modify_emailing($_POST['ID']);
}
if (!isset($_GET['ID']) && !isset($_POST['ID']))
{
    echo "Impossible d'identifier le emailing";
    return;
}
else
{
    $emailing = new emailing();
    if (isset($_GET['ID']))
        $emailing -> lire_emailing($_GET['ID']);
    else if (isset($_POST['ID']))
        $emailing -> lire_emailing($_POST['ID']);
    else
        return;
    ?>
		<DIV>EMAILINGS : Modification</DIV>
		<BR>

		<p><a href="index2.php?page=emailings"><= Retour à l'accueil</a></p>

	<P>Emailing créé le <?php echo getDateFR($emailing->DATETIME_CREATION); ?></P>

	<FORM NAME="form" ACTION="index2.php?page=emailings&subpage=modif" METHOD="post">
    <INPUT TYPE="hidden" NAME="action" VALUE="modif">
    <INPUT TYPE="hidden" NAME="ID" VALUE="<?= $emailing->ID ?>">
	<TABLE BORDER="0" CELLSPACING="5">
	<TR>
	    <TD VALIGN="top">EMAIL EXPEDITEUR :</TD>
	    <TD><input type="text" NAME="EMAIL_SENDER" VALUE="<?= $emailing->EMAIL_SENDER ?>"></TD>
	</TR>
	<TR>
	    <TD VALIGN="top">NOM EXPEDITEUR :</TD>
	    <TD><input type="text" NAME="NOM_SENDER" VALUE="<?= $emailing->NOM_SENDER ?>"></TD>
	</TR>
	<TR>
	    <TD VALIGN="top">SUJET :</TD>
	    <TD><input type="text" NAME="SUJET" VALUE="<?= $emailing->SUJET ?>"></TD>
	</TR>
	<TR>
	    <TD VALIGN="top">CONTENU :</TD>
	    <TD><TEXTAREA NAME="CONTENU" COLS="100" ROWS="50"><?= $emailing->CONTENU ?></TEXTAREA></TD>
	</TR>

	<TR>
	    <TD>STATUT :</TD>
	    <TD><?=selectStatus('STATUT',$emailing->STATUT);?></TD>
	</TR>
<TR>
    <TD>FORMAT :</TD>
    <TD>
    	<select name="FORMAT">
    		<option name="FORMAT" value="html" selected>HTML</option>
    		<!-- <option name="FORMAT" value="text" <?php if ($emailing->FORMAT != "html") { echo "selected"; } ?>>Texte</option> -->
    	</select>
    </TD>
</TR>
	<TR>
	    <TD ALIGN="right" COLSPAN="2"><BR><INPUT TYPE="submit" VALUE="ENREGISTRER"></TD>
	</TR>
	</TABLE>
	</FORM>
<?php
}
?>
