<div id="emailings">
<?php
include ("include/class.emailing.php");
$PATH_PJ = "./emailings_attachments/";
switch ((isset($_GET['subpage']) ? $_GET['subpage'] : '') )
{
	case 'ajout':
		require 'emailings_ajout.inc.php';
		break;
	case 'destinataires':
		require 'emailings_destinataires.inc.php';
		break;
	case 'attachments':
		require 'emailings_attachments.inc.php';
		break;
	case 'envoi':
		require 'emailings_envoi.inc.php';
		break;
	case 'modif':
		require 'emailings_modif.inc.php';
		break;
	default:
		require 'emailings_liste.inc.php';
		break;
}
?>
</div>
