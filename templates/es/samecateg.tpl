{if $samecateg}
<div id="samecateg">
  <div>
  	{section name=samecateg loop=$samecateg}
  	<dl class="float-left">
  		<dd>
        <span class="img-shadow">
          {if $samecateg[samecateg].img_type == "none"}
            <a href="{$urlsite}{$samecateg[samecateg].id_produit|product_link:$samecateg[samecateg].nom:$samecateg[samecateg].categorie}"><img src="{$urlsite}lang/{$applicationlang}/img/no-image.gif" alt="" /></a>
          {else}
            <a href="{$urlsite}{$samecateg[samecateg].id_produit|product_link:$samecateg[samecateg].nom:$samecateg[samecateg].categorie}"><img src="{$urlsite}picproduct/{$samecateg[samecateg].id_produit}_mini.{$samecateg[samecateg].img_type}" alt="" /></a>
          {/if}
        </span>
      </dd>
  		<dd><h2><a   href="{$urlsite}{$samecateg[samecateg].id_produit|product_link:$samecateg[samecateg].nom:$samecateg[samecateg].categorie}">{$samecateg[samecateg].nom|utf8_encode}</a></h2></dd>
  		<dd><em>{$samecateg[samecateg].auteur|utf8_encode}</em></dd>
      <dd>
      {if $samecateg[samecateg].rabais != '0.00' && $samecateg[samecateg].prix ne '0.00'}
        <span class='prix'>
        {if $smarty.session.ht  == "ht"}
          <strong>{$samecateg[samecateg].prix_rabais_ht}€ sin IVA ({$samecateg[samecateg].prix_rabais}€ con IVA)</strong>
        {else}
          <strong>{$samecateg[samecateg].prix_rabais}€ con IVA ({$samecateg[samecateg].prix_rabais_ht}€ sin IVA)</strong>
        {/if}
        </span>
      {elseif $samecateg[samecateg].prix ne '0.00'}
        <span class='prix'>
        {if $smarty.session.ht  == "ht"}
      		<strong>{$samecateg[samecateg].prix_ht}€ sin IVA({$samecateg[samecateg].prix}€ con IVA)</strong>
        {else}
      		<strong>{$samecateg[samecateg].prix}€ con IVA({$samecateg[samecateg].prix_ht}€ sin IVA)</strong>
        {/if}
        </span>
      {/if}
      </dd>
  	</dl>
  	{cycle values=",<div class='clear'></div>"}
  	{/section}
  </div>
	<span class="spacer"></span>
	<div id="nbpage">
	{if isset($link)}
		<br /><strong>Página</strong><br />
	{/if}

	{if isset($link_back)}
		{$link_back}anterior</a>
	{/if}
	{section name=link loop=$link}
		{$link[link].num}
	{/section}
	{if isset($link_next)}
		{$link_next}siguiente</a>
	{/if}
	</div>


</div>
{/if}
