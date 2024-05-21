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
      <a href="{$urlsite}{$resultat[resultat].id_produit|product_link:$resultat[resultat].nom:$resultat[resultat].categorie}">{$resultat[resultat].nom|utf8_encode}</a></h2></dd>
  		<dd><em>Par {$resultat[resultat].auteur|utf8_encode}</em></dd>
  		<dd>
				{if $resultat[resultat].disponible == 0 && $resultat[resultat].delai_reapprovisionnement && $resultat[resultat].prix ne '0.00'}
					Articolo disponibile tra {$resultat[resultat].delai_reapprovisionnement} giorni
        {elseif $resultat[resultat].disponible == 1 && $resultat[resultat].prix ne '0.00'}
          Disponibile
        {else}
          Non disponibile
        {/if}  
      </dd>
  		<dd>
      <span class="prix">
      <strong>
      {if $resultat[resultat].rabais != '0.00' && $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          {$resultat[resultat].prix_rabais_ht}€ tasse escluse ({$resultat[resultat].prix_rabais}€ tasse incluse)<br />
        {else}
          {$resultat[resultat].prix_rabais}€ tasse incluse ({$resultat[resultat].prix_rabais_ht}€ tasse esculse)<br />
        {/if}
      {elseif $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
      		{$resultat[resultat].prix_ht}€ tasse escluse({$resultat[resultat].prix}€ tasse incluse)
        {else}
      		{$resultat[resultat].prix}€ tasse incluse({$resultat[resultat].prix_ht}€ tasse excluse)
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
  	  <br /><strong>Pagine</strong><br />
    {/if}
  
  	{if isset($link_back)}
      {$link_back}precedente</a>
    {/if}
  	{section name=link loop=$link}
      {$link[link].num}
  	{/section}
  	{if isset($link_next)}
      {$link_next}seguente</a>
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
  		<dd><em>Par {$resultat[resultat].auteur|utf8_encode}</em></dd>
  		<dd>{$resultat[resultat].description|utf8_encode|truncate:325:"...":true}</dd>
  		<dd>
				{if $resultat[resultat].disponible == 0 && $resultat[resultat].delai_reapprovisionnement && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
					Articolo disponibile tra {$resultat[resultat].delai_reapprovisionnement} giorni
        {elseif $resultat[resultat].disponible == 1 && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
          Disponibile
        {else}
          Non disponibile
        {/if}  
      </dd>
  		<dd>
      <span class="prix">
      <strong>
      {if $resultat[resultat].rabais != '0.00' && $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          {$resultat[resultat].prix_rabais_ht}€ tasse escluse ({$resultat[resultat].prix_rabais}€ tasse incluse)<br />
        {else}
          {$resultat[resultat].prix_rabais}€ tasse incluse ({$resultat[resultat].prix_rabais_ht}€ tasse escluse)<br />
        {/if}
      {elseif $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
      		{$resultat[resultat].prix_ht}€ tasse escluse({$resultat[resultat].prix}€ tasse incluse)
        {else}
      		{$resultat[resultat].prix}€ tasse incluse({$resultat[resultat].prix_ht}€ tasse escluse)
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

<h2><span class="deco">></span>Nessun risultato corrisponde ai criteri inseriti</h2>
<p>
Puoi effettuare una nuova ricerca specificando, ad esempio, un minor numero di parole o usando un'ortografia diversa.<br />
Puoi anche <a href="{$urlsite}dictionnaire-et-lexique-c0">sfogliare il catalogo</a> o utilizzare le categorie presenti nella barra del menu a sinistra.
</p>
<h3><span class="deco">></span>Non hai un'idea precisa? Esegui una ricerca per categoria.</h3>
{include file="$applicationlang/catalogue.tpl"}

{/if}
</div>
