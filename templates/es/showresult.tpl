<div id="showresult">
{if $resultat && $nb_trouve > 5}
  {section name=resultat loop=$resultat}
  	<dl class="result">
  		<dd>
        <span class="img-shadow">
          <a href="{$urlsite}{$resultat[resultat].id_produit|product_link:$resultat[resultat].nom:$resultat[resultat].categorie}">
          {if $resultat[resultat].img_type == "none"}
            <img src="{$urlsite}lang/{$applicationlang}/img/no-image_icon.gif" alt="" />
          {else}
            <img src="{$urlsite}picproduct/{$resultat[resultat].id_produit}_icon.{$resultat[resultat].img_type}" alt="" />
          {/if}
          </a>
        </span>
      </dd>
  		<dd><h2>
      <a href="{$urlsite}{$resultat[resultat].id_produit|product_link:$resultat[resultat].nom:$resultat[resultat].categorie}"> {$resultat[resultat].nom|utf8_encode}</a></h2></dd>
  		<dd><em>Por {$resultat[resultat].auteur|utf8_encode}</em></dd>
  		<dd>
				{if $resultat[resultat].disponible == 0 && $resultat[resultat].delai_reapprovisionnement && $resultat[resultat].prix ne '0.00'}
					Artículo disponible en {$resultat[resultat].delai_reapprovisionnement} días
        {elseif $resultat[resultat].disponible == 1 && $resultat[resultat].prix ne '0.00'}
          Disponible
        {else}
          No disponible
        {/if}  
      </dd>
  		<dd>
      <span class="prix">
      <strong>
      {if $resultat[resultat].rabais != '0.00' && $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          {$resultat[resultat].prix_rabais_ht}€ sin IVA ({$resultat[resultat].prix_rabais}€ con IVA)<br />
        {else}
          {$resultat[resultat].prix_rabais}€ con IVA ({$resultat[resultat].prix_rabais_ht}€ sin IVA)<br />
        {/if}
      {elseif $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
      		{$resultat[resultat].prix_ht}€ sin IVA({$resultat[resultat].prix}€ con IVA)
        {else}
      		{$resultat[resultat].prix}€ con IVA({$resultat[resultat].prix_ht}€ sin IVA)
        {/if}
      {/if}
      </strong>
      </span>
      </dd>
  		
      <span class="spacer"></span>
  	</dl>
  	{cycle values=",<div class='clear'></div>"}
  	{/section}
    <div id="nbpage">
  	{if isset($link)}
  	  <br /><strong>Páginas</strong><br />
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
{elseif $resultat && $nb_trouve < 6 && $nb_trouve > 0}
  {section name=resultat loop=$resultat}
  	<dl class="result">
  		<dd>
        <span class="img-shadow">
          <a href="{$urlsite}{$resultat[resultat].id_produit|product_link:$resultat[resultat].nom:$resultat[resultat].categorie}">
          {if $resultat[resultat].img_type == "none"}
            <img src="{$urlsite}lang/{$applicationlang}/img/no-image.gif" alt="" />
          {else}
            <img src="{$urlsite}picproduct/{$resultat[resultat].id_produit}_mini.{$resultat[resultat].img_type}" alt="" />
          {/if}
          </a>
        </span>
      </dd>
  		<dd><h2>
      <a href="{$urlsite}{$resultat[resultat].id_produit|product_link:$resultat[resultat].nom:$resultat[resultat].categorie}"> {$resultat[resultat].nom|utf8_encode}</a></h2></dd>
  		<dd><em>Por {$resultat[resultat].auteur|utf8_encode}</em></dd>
  		<dd>{$resultat[resultat].description|utf8_encode|truncate:325:"...":true}</dd>
  		<dd>
				{if $resultat[resultat].disponible == 0 && $resultat[resultat].delai_reapprovisionnement && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
					Artículo disponible en {$resultat[resultat].delai_reapprovisionnement} días
        {elseif $resultat[resultat].disponible == 1 && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
          Disponible
        {else}
          No disponible
        {/if}  
      </dd>
  		<dd>
      <span class="prix">
      <strong>
      {if $resultat[resultat].rabais != '0.00' && $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          {$resultat[resultat].prix_rabais_ht}€ sin IVA ({$resultat[resultat].prix_rabais}€ con IVA)<br />
        {else}
          {$resultat[resultat].prix_rabais}€ con IVA ({$resultat[resultat].prix_rabais_ht}€ sin IVA)<br />
        {/if}
      {elseif $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
      		{$resultat[resultat].prix_ht}€ sin IVA({$resultat[resultat].prix}€ con IVA)
        {else}
      		{$resultat[resultat].prix}€ con IVA({$resultat[resultat].prix_ht}€ sin IVA)
        {/if}
      {/if}
      </strong>
      </span>
      </dd>
  		
      <span class="spacer"></span>
  	</dl>
  	{cycle values=",<div class='clear'></div>"}
  	{/section}
{else}

<h2><span class="deco">></span>Ningún resultado coincide con sus criterios de búsqueda</h2>
<p>
Puede realizar otra búsqueda con menos palabras o con una ortografía diferente.<br />
También puede <a href="{$urlsite}dictionnaire-et-lexique-c0">recorrer</a> o utilizar las categorías de la barra de menú situada a la izquierda.
</p>
<h3><span class="deco">></span>¿No tiene una idea precisa? Realice una búsqueda por categoría.</h3>
{include file="catalogue.tpl"}

{/if}
</div>
