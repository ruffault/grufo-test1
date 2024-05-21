{if $samecateg2}
  <div id="samecateg2"><br>
    <h4><span class="deco">&gt;</span>En la misma categoría</h4>
    <div>
    	{section name=samecateg2 loop=$samecateg2}
    	<dl class="float-left">
    		<dd>
          <span class="img-shadow">
            {if $samecateg2[samecateg2].img_type == "none"}
              <a href="{$urlsite}{$samecateg2[samecateg2].id_produit|product_link:$samecateg2[samecateg2].nom:$samecateg2[samecateg2].categorie}"><img src="{$urlsite}lang/{$applicationlang}/img/no-image_icon.gif" alt="" /></a>
            {else}    
              <a href="{$urlsite}{$samecateg2[samecateg2].id_produit|product_link:$samecateg2[samecateg2].nom:$samecateg2[samecateg2].categorie}"><img src="{$urlsite}picproduct/{$samecateg2[samecateg2].id_produit}_icon.{$samecateg2[samecateg2].img_type}" alt="{$samecateg2[samecateg2].nom}" /></a>
            {/if}
          </span>
        </dd>
    		<dd><h5><a href="{$urlsite}{$samecateg2[samecateg2].id_produit|product_link:$samecateg2[samecateg2].nom:$samecateg2[samecateg2].categorie}">{$samecateg2[samecateg2].nom|utf8_encode}</a></h5></dd>
    		<dd><em>{$samecateg2[samecateg2].auteur|utf8_encode}</em></dd>
    		<dd>
      {if $samecateg2[samecateg2].rabais != '0.00' && $samecateg2[samecateg2].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          <strong>{$samecateg2[samecateg2].prix_rabais_ht}€ sin IVA ({$samecateg2[samecateg2].prix_rabais}€ con IVA)</strong>
        {else}
          <strong>{$samecateg2[samecateg2].prix_rabais}€ con IVA ({$samecateg2[samecateg2].prix_rabais_ht}€ sin IVA)</strong>
        {/if}
      {elseif $samecateg2[samecateg2].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
      		<strong>{$samecateg2[samecateg2].prix_ht}€ sin IVA({$samecateg2[samecateg2].prix}€ con IVA)</strong>
        {else}
      		<strong>{$samecateg2[samecateg2].prix}€ con IVA({$samecateg2[samecateg2].prix_ht}€ sin IVA)</strong>
        {/if}
      {/if}
      </dd>
    	</dl>
    	{cycle values=",<div class='clear'></div>"}
    	{/section}
    </div>
    <span class="spacer"></span>
  </div>
{/if}
