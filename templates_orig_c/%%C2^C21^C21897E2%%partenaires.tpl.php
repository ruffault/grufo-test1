<?php /* Smarty version 2.6.31, created on 2019-10-30 01:08:46
         compiled from fr/partenaires.tpl */ ?>
﻿<h3>Partenaires</h3>
	<ul class="border">
		<li><div id="partenaires">
		<?php 
		$nb=range(1,4);
		shuffle($nb);
		if ($nb[0]==1){
		 ?>
		<h4><a href="http://www.lci-europe.com">LCI - Traduction, localisation et communication technique</a><br /></h4>
				Toutes langues - Tous domaines! certifi&eacute;e ISO 9001. Devis de traduction en ligne.
		<?php 
		}elseif($nb[0]==2){
		 ?>
			<p><b>Découvrez</b></p>
			<a href="http://offre-traduction.svp.com/traduction-dicoland" onclick="window.open(this.href); return false;" ><img src="./img/offre_siteweb_svp.jpg" alt="svp traduction"/></a>
			<br/>
			<b>250 traducteurs au service de vos traductions</b>
			<br/>
			<p>Des traductions professionnelles et certifiées dans plus de 100 langues.</p>
		<?php 
		}elseif($nb[0]==3){
		 ?>
			<h4><a href="http://www.goenglish.fr" target="_blank">www.goenglish.fr</a><br /></h4>
				Go English propose une gamme d'outils complète et efficace pour apprendre l'anglais à travers la culture anglophone, pour tous les âges et tous les niveaux (4 magazines et audio, 3 produits numériques et 22 livres audio)
		<?php 
		}else{
		 ?>
		<h4><a href="http://www.planete-enseignant.com" target="_blank">www.planete-enseignant.com</a><br /></h4>
				Planète Enseignant est le site Internet ressources de la collectivité éducative de France et des pays Francophones.

		<?php 
		}
		 ?>
		</div>
		</li>
	</ul>