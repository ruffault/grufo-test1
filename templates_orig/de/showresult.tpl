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
  		<dd><em>Par {$resultat[resultat].auteur|utf8_encode}</em></dd>
  		<dd>
				{if $resultat[resultat].disponible == 0 && $resultat[resultat].delai_reapprovisionnement && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
					Artikel lieferbar binnen {$resultat[resultat].delai_reapprovisionnement} Tagen
        {elseif $resultat[resultat].disponible == 1 && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
          Lieferbar
        {else}
          Nicht lieferbar
        {/if}  
      </dd>
  		<dd>
      <span class="prix">
      <strong>
      {if $resultat[resultat].rabais != '0.00' && $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          {$resultat[resultat].prix_rabais_ht}€ zzgl. MwSt ({$resultat[resultat].prix_rabais}€ einschl. MwSt)<br />
        {else}
          {$resultat[resultat].prix_rabais}€ einschl. MwSt ({$resultat[resultat].prix_rabais_ht}€ zzgl. MwSt)<br />
        {/if}
      {elseif $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
      		{$resultat[resultat].prix_ht}€ zzgl. MwSt({$resultat[resultat].prix}€ einschl. MwSt)
        {else}
      		{$resultat[resultat].prix}€ einschl. MwSt({$resultat[resultat].prix_ht}€ zzgl. MwSt)
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
  	  <br /><strong>Seiten</strong><br />
    {/if}
  
  	{if isset($link_back)}
      {$link_back}zurück</a>
    {/if}
  	{section name=link loop=$link}
      {$link[link].num}
  	{/section}
  	{if isset($link_next)}
      {$link_next}vor</a>
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
  		<dd><em>Nach {$resultat[resultat].auteur|utf8_encode}</em></dd>
  		<dd>{$resultat[resultat].description|utf8_encode|truncate:325:"...":true}</dd>
  		<dd>
				{if $resultat[resultat].disponible == 0 && $resultat[resultat].delai_reapprovisionnement && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
					Artikel lieferbar binnen {$resultat[resultat].delai_reapprovisionnement} Tagen
 				{elseif $resultat[resultat].disponible == 1 && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
          Lieferbar
        {else}
          Nicht lieferbar
        {/if}  
      </dd>
  		<dd>
      <span class="prix">
      <strong>
      {if $resultat[resultat].rabais != '0.00' && $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          {$resultat[resultat].prix_rabais_ht}€ zzgl. MwSt ({$resultat[resultat].prix_rabais}€ einschl. MwSt)<br />
        {else}
          {$resultat[resultat].prix_rabais}€ einschl. MwSt ({$resultat[resultat].prix_rabais_ht}€ zzgl. MwSt)<br />
        {/if}
      {elseif $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
      		{$resultat[resultat].prix_ht}€ zzgl. MwSt({$resultat[resultat].prix}€ einschl. MwSt)
        {else}
      		{$resultat[resultat].prix}€ einschl. MwSt({$resultat[resultat].prix_ht}€ zzgl. MwSt)
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

<h2><span class="deco">></span>Kein Ergebnis für die genannten Kriterien gefunden.</h2>
<p>
Sie können eine neue Suche beispielsweise mit weniger Wörtern oder mit einer anderen Schreibweise starten.<br />
Oder <a href="{$urlsite}catalogue-dictionnaire-et-lexique-c0"> den Katalog durchblättern</a> bzw. die in der Menüleiste links aufgeführten Kategorien durchsuchen.
</p>
<h3><span class="deco">></span>Wenn Sie keine genauen Angaben haben, suchen Sie nach Kategorien.</h3>
{include file="$applicationlang/catalogue.tpl"}

{/if}
</div>