<div id='vithome'>
	{section name=vitrine loop=$vitrine}
		<div id='vitleft'>
			<div id="cat"><a href="{$urlsite}{$vitrine[vitrine].id_categorie|categ_link:$vitrine[vitrine].categorie}">{$vitrine[vitrine].categorie|utf8_encode|truncate:30:"...":true}</a></div>
			<h2><a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}">{$vitrine[vitrine].nom|utf8_encode|truncate:110}</a></h2>
				
				<div class="roundedcornr_box_vitimg">
   					<div class="roundedcornr_top_vitimg"><div></div></div>
      					<div class="roundedcornr_content_vitimg">			
							<span id='vit_img'>
								{if $vitrine[vitrine].img_type == "none"}
									<a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}"><img  src="{$urlsite}lang/{$applicationlang}/img/no-image.gif" width=56></a>
								{else}
									<a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}"><img alt="{$vitrine[vitrine].nom|utf8_encode}"  src="{$urlsite}picproduct/{$vitrine[vitrine].id_produit}_icon.{$vitrine[vitrine].img_type}"/></a>
								{/if}
							</span>
      					</div>
   					<div class="roundedcornr_bottom_vitimg"><div></div></div>
				</div>			
			
			<span class='auteur'>{$vitrine[vitrine].auteur|utf8_encode}</span>
			<p class='vit_description'>{$vitrine[vitrine].description|utf8_encode|truncate:210:"...":true}</p>
			<div id="prix">
    {if $vitrine[vitrine].rabais != '0.00'}
      {if $smarty.session.ht  == "ht"}
        <strong>{$vitrine[vitrine].prix_rabais_ht} € tasse escluse ({$vitrine[vitrine].prix_rabais} € TTC)</strong>
      {else}
        <strong>{$vitrine[vitrine].prix_rabais} € tasse incluse ({$vitrine[vitrine].prix_rabais_ht} € HT)</strong>
      {/if}
    {else}
      {if $smarty.session.ht  == "ht"}
    		<strong>{$vitrine[vitrine].prix_ht} € tasse escluse ({$vitrine[vitrine].prix} € TTC)</strong>
      {else}
    		<strong>{$vitrine[vitrine].prix} € tasse incluse ({$vitrine[vitrine].prix_ht} € HT)</strong>
      {/if}
    {/if}
    		</div>
    			{if $vitrine[vitrine].prix != 0 && $vitrine[vitrine].sommeil != 1}
    				<form class="addpan"  method="get" action="{$urlsite}addtopanier.php?nbpage=1&amp;pagecourante=1&amp;nbresult=1">
      					<div>
        					<input type="image" value="Aggiungi al carrello" src="{$urlsite}lang/{$applicationlang}/img/addpan.png"/>
        					<input type="hidden" name="quantite" value="1"/>
        					<input type="hidden" name="page" value="vitrine"/>
        					<input type="hidden" name="id_produit" value="{$vitrine[vitrine].id_produit}"/>
      					</div>
    				</form>
    			{/if}
    	<span class='clearleft'></span>
	</div>
	{/section}
</div>