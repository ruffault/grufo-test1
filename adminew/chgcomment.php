<?php

include ("include/verifsession.inc.php");
include ("include/connexion.inc.php");

if (isset($_GET['comment']) && trim($_GET['comment']) != ''	
		&& isset($_GET['id_membre']) && trim($_GET['id_membre']))
{
	$comment = $_GET['comment'];
	$sql = 'UPDATE `membre`
						SET `comment` = "' . $comment . '"
					WHERE `id_membre` = "' . htmlentities($_GET['id_membre']) . '"
					LIMIT 1;';
	mysqli_query($link,$sql);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
