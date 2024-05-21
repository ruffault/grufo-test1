<div id="buysame_all">
{if isset($tab_same)}
<h4><span class="deco">&gt;</span>Los internautas que han comprado {$showproduct.nom|utf8_encode} también han comprado:</h4>
<div>	
	<ul id="buysame">
		{section name=tab_same loop=$tab_same}
			<li>	
				<a href="{$urlsite}{$tab_same[tab_same].id|product_link:$tab_same[tab_same].nom}">{$tab_same[tab_same].nom|htmlentities|utf8_encode}</a> de {$tab_same[tab_same].auteur|utf8_encode|lower|capitalize}
			</li>
		{/section}
	</ul>
</div>
{/if}
</div>