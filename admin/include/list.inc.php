<div id="menustat">
	<h3>Edition des mails</h3>
	<ul>
		<li><a href="index2.php?page=list&amp;categ=editmail">Editition des mails</a></li>
		<li><a href="index2.php?page=list&amp;categ=planing">Planification des envois</a></li>
		<li><a href="index2.php?page=list&amp;categ=remove">Désinscription</a></li>
	</ul>
</div>

<div id="statcontent">

<?php

switch ($_GET['categ'])
{
	case 'editmail':
		require 'editmail.inc.php';
		break;

	case 'planing':
		require 'planingmail.inc.php';
		break;

	case 'remove':
		require 'removemail.inc.php';
		break;
	
	default:
		require 'editmail.inc.php';
		break;
}

?>

</div>