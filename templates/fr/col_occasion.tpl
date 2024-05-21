<script type="text/javascript" src="js/filter.js"></script>
	<h3>Filtrer par catégorie</h3>
		<ul class="border">
			<li><a href="#" id="allcat" class="current">Tout afficher</a></li>				
        	{section name=test loop=$test}
        	<li><a href="#" id="{$test[test].id_categorie|utf8_encode}" class="filter">{$test[test].categorie|utf8_encode}</a></li>
        	{/section}
        </ul>
			
				
				
