<?php
	$param = '&amp;date=' . $_GET['date'];
?>

<div id="menustat">

	<h3>Bilan</h3>
	<ul>
		<li><a href="?page=stat<?php echo $param; ?>">Général</a></li>
		<!--<li><a href="?page=stat&amp;categ=repartition<?php echo $param; ?>">Répartition horaire</a></li>-->
	</ul>
	
	<h3>Provenance</h3>
	<ul>
		<li><a href="?page=stat&amp;categ=referant<?php echo $param; ?>">Référants</a></li>
<!--<li><a href="?page=stat&amp;categ=keyword<?php echo $param; ?>">Mots clés</a></li>-->
	</ul>

	<h3>Ventes</h3>
	<ul>
		<li><a href="?page=stat&amp;categ=client<?php echo $param; ?>">Clients</a></li>
		<li><a href="?page=stat&amp;categ=article<?php echo $param; ?>">Articles</a></li>
	</ul>
	<div>
	<?php echo generate_calendar($_GET['date']); ?>
	</div>
</div>
