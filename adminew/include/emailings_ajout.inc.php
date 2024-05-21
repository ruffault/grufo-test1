<?php
if(isset($_POST['action']) && trim($_POST['EMAIL_SENDER']) && trim($_POST['NOM_SENDER']) && trim($_POST['SUJET']) && trim($_POST['CONTENU']) )
{
  $emailing = new emailing();
	$emailing->EMAIL_SENDER 	= addslashes($_POST['EMAIL_SENDER']);
	$emailing->NOM_SENDER 	  = addslashes($_POST['NOM_SENDER']);
	$emailing->SUJET 					= addslashes($_POST['SUJET']);
	$emailing->CONTENU 	    	= addslashes($_POST['CONTENU']);
	$emailing->FORMAT 				= addslashes($_POST['FORMAT']);
	$emailing->STATUT 				= addslashes($_POST['STATUT']);
  $emailing->insert_emailing();
	header("Location: index2.php?page=emailings");
	//var_dump($_POST);
	die;
}
?>
<DIV>EMAILINGS : Créer un nouvel emailing</DIV>
<BR>

<p><a href="index2.php?page=emailings"><= Retour à l'accueil</a></p>

	<FORM NAME="form" ACTION="index2.php?page=emailings&subpage=ajout" METHOD="post">
    <INPUT TYPE="hidden" NAME="action" VALUE="ajouter">
	<TABLE class="table table-bordered" BORDER="0" CELLSPACING="5">
	<TR>
	    <TD VALIGN="top">EMAIL EXPEDITEUR :</TD>
	    <TD><input type="text" NAME="EMAIL_SENDER" VALUE=""></TD>
	</TR>
	<TR>
	    <TD VALIGN="top">NOM EXPEDITEUR :</TD>
	    <TD><input type="text" NAME="NOM_SENDER" VALUE=""></TD>
	</TR>
	<TR>
	    <TD VALIGN="top">SUJET :</TD>
	    <TD><input type="text" NAME="SUJET" VALUE=""></TD>
	</TR>
	<TR>
	    <TD VALIGN="top">CONTENU :</TD>
	    <TD><TEXTAREA NAME="CONTENU" COLS="100" ROWS="50"></TEXTAREA></TD>
	</TR>

	<TR>
	    <TD>STATUT :</TD>
	    <TD><?=selectStatus('STATUT','1');?></TD>
	</TR>
<TR>
    <TD>FORMAT :</TD>
    <TD>
    	<select name="FORMAT">
    		<option name="FORMAT" value="html" selected>HTML</option>
    		<!-- <option name="FORMAT" value="text">Texte</option> -->
    	</select>
    </TD>
</TR>
	<TR>
	    <TD ALIGN="right" COLSPAN="2"><BR><INPUT TYPE="submit" VALUE="ENREGISTRER"></TD>
	</TR>
	</TABLE>
	</FORM>
