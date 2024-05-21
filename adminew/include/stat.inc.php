<?php

require 'menustat.inc.php';

echo '<div id="statcontent">';

switch ((isset($_GET['categ']) ? $_GET['categ'] : '') )
{
	//case 'repartition':
	//	require 'repartition.inc.php';
	//	break;
	case 'referant':
		require 'referant.inc.php';
		break;
	case 'keyword':
		require 'keyword.inc.php';
		break;
	case 'ca':
		require 'ca.inc.php';
		break;
	case 'client':
		require 'client.inc.php';
		break;
	case 'article':
		require 'article.inc.php';
		break;
	default:
		require 'statcontent.inc.php';
		break;
}
echo '</div>';
?>
