<?php
// procédure pour permettre aux clients habilités de télécharger les ebooks qu'ils sont acquis
// je commence par charger tout ce dont j'ai besoin meme si pour démarrer je ne m'en sers pas 
session_start();
session_name("dicoland");
require 'inc/config.inc.php';
require 'inc/connexion.inc.php';
require 'inc/function.inc.php';
require 'inc/session.inc.php';
//je renvoie les importuns
//et je vérifie si j'ai bien récupéré un id_prod correct 
if ((isset($_SESSION['ebook']) ? $_SESSION['ebook'] : '') && $_GET['id_prod'])
{
$file = "ebook_" . $_GET['id_prod'];
	if (file_exists($file)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/epub');
		header('Content-Disposition: attachement; filename="'.basename($file).'.epub"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		readfile($file);
		exit;
	}/*	//je charge cela dans l'idée d'éventuellement d'utiliser un nom de fichier loucede qui serait stocké dans la base de données.
	$livre = give_product($_GET['id_prod']);

	// j'appelle la fonction de lecture

	$a = lit_ebook($_GET['id_prod']);
 */
}
	header("location:" .  $urlsite . $_GET['aplan'] . "/index.php?page=myaccount");
?>


	

