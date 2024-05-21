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
  		<dd><em>By {$resultat[resultat].auteur|utf8_encode}</em></dd>
  		<dd>
				{if $resultat[resultat].disponible == 0 && $resultat[resultat].delai_reapprovisionnement && $resultat[resultat].prix ne '0.00'}
					Item available in {$resultat[resultat].delai_reapprovisionnement} days
        {elseif $resultat[resultat].disponible == 1 && $resultat[resultat].prix ne '0.00'}
          Available
        {else}
          Unavailable
        {/if}  
      </dd>
  		<dd>
      <span class="prix">
      <strong>
      {if $resultat[resultat].rabais != '0.00' && $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          {$resultat[resultat].prix_rabais_ht} € excl. VAT ({$resultat[resultat].prix_rabais}€ incl. VAT)<br />
        {else}
          {$resultat[resultat].prix_rabais} € incl. VAT ({$resultat[resultat].prix_rabais_ht}€ excl. VAT)<br />
        {/if}
      {elseif $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
      		{$resultat[resultat].prix_ht}€ excl. VAT({$resultat[resultat].prix}€ incl. VAT)
        {else}
      		{$resultat[resultat].prix}€ incl. VAT({$resultat[resultat].prix_ht}€ excl. VAT)
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
  	  <br /><strong>Pages</strong><br />
    {/if}
  
  	{if isset($link_back)}
      {$link_back}back</a>
    {/if}
  	{section name=link loop=$link}
      {$link[link].num}
  	{/section}
  	{if isset($link_next)}
      {$link_next}next</a>
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
  		<dd><em>By {$resultat[resultat].auteur|utf8_encode}</em></dd>
  		<dd>{$resultat[resultat].description|utf8_encode|truncate:325:"...":true}</dd>
  		<dd>
				{if $resultat[resultat].disponible == 0 && $resultat[resultat].delai_reapprovisionnement && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
					Item available in {$resultat[resultat].delai_reapprovisionnement} days
        {elseif $resultat[resultat].disponible == 1 && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
          Available
        {else}
          Unavailable
        {/if}  
      </dd>
  		<dd>
      <span class="prix">
      <strong>
      {if $resultat[resultat].rabais != '0.00' && $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          {$resultat[resultat].prix_rabais_ht}€ excl. VAT ({$resultat[resultat].prix_rabais}€ incl. VAT)<br />
        {else}
          {$resultat[resultat].prix_rabais}€ incl. VAT  ({$resultat[resultat].prix_rabais_ht}€ excl. VAT)<br />
        {/if}
      {elseif $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
      		{$resultat[resultat].prix_ht}€ excl. VAT({$resultat[resultat].prix}€ incl. VAT)
        {else}
      		{$resultat[resultat].prix}€ incl. VAT({$resultat[resultat].prix_ht}€ excl. VAT)
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

<h2><span class="deco">></span>No result was found for these criteria</h2>
<p>
Please try again, using fewer words or a different spelling for example.<br />
You may also <a href="{$urlsite}catalogue-dictionnaire-et-lexique-c0">browse the catalogue</a> or use the categories in the search bar on the left-hand side menu.
</p>
<h3><span class="deco">></span>If you do not have a precise idea of the book you need, use the category based search.</h3>
{include file="$applicationlang/catalogue.tpl"}

{/if}
</div>
