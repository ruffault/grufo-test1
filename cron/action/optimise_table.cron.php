<?php

function optimize($table)
{
	$sql = "OPTIMIZE TABLE `$table`";
	mysql_query($sql);
}

optimize('auteur');
optimize('categorie');
optimize('commande');
optimize('editeur');
optimize('facturation');
optimize('frais_port');
optimize('hit');
optimize('langue_dispo');
optimize('langue_produit');
optimize('livraison');
optimize('log');
optimize('mailing');
optimize('mailtmp');
optimize('membre');
optimize('panier');
optimize('pays');
optimize('produit');
optimize('referer');
optimize('review');
optimize('same');
optimize('statarticle');
optimize('statclient');
optimize('statday');
optimize('statmonth');
optimize('statreferer');
optimize('type');
optimize('utilisateur');
optimize('vitrine');

?>
