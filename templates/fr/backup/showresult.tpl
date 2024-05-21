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
					Article disponible sous {$resultat[resultat].delai_reapprovisionnement} jours
				{elseif $resultat[resultat].disponible == 1 && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
					Disponible
				{else}
					Indisponible
				{/if}
			</dd>
			<dd>
      <span class="prix">
      <strong>
      {if $resultat[resultat].rabais != '0.00' && $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          {$resultat[resultat].prix_rabais_ht} € HT ({$resultat[resultat].prix_rabais}€ TTC)<br />
        {else}
          {$resultat[resultat].prix_rabais} € TTC ({$resultat[resultat].prix_rabais_ht}€ HT)<br />
        {/if}
      {elseif $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
      		{$resultat[resultat].prix_ht}€ HT({$resultat[resultat].prix}€ TTC)
        {else}
      		{$resultat[resultat].prix}€ TTC({$resultat[resultat].prix_ht}€ HT)
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
      {$link_back}précédente</a>
    {/if}
  	{section name=link loop=$link}
      {$link[link].num}
  	{/section}
  	{if isset($link_next)}
      {$link_next}suivante</a>
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
					Article disponible sous {$resultat[resultat].delai_reapprovisionnement} jours
				{elseif $resultat[resultat].disponible == 1 && $resultat[resultat].prix ne '0.00' && $resultat[resultat].sommeil ne 1}
					Disponible
				{else}
					Indisponible
				{/if}
      </dd>
  		<dd>
      <span class="prix">
      <strong>
      {if $resultat[resultat].rabais != '0.00' && $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          {$resultat[resultat].prix_rabais_ht} € HT ({$resultat[resultat].prix_rabais}€ TTC)<br />
        {else}
          {$resultat[resultat].prix_rabais} € TTC ({$resultat[resultat].prix_rabais_ht}€ HT)<br />
        {/if}
      {elseif $resultat[resultat].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
      		{$resultat[resultat].prix_ht}€ HT({$resultat[resultat].prix}€ TTC)
        {else}
      		{$resultat[resultat].prix}€ TTC({$resultat[resultat].prix_ht}€ HT)
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

<h2><span class="deco">></span>Aucun résultat ne répond à vos critères</h2>
<p>
Vous pouvez essayer une nouvelle recherche en spécifiant moins de mots ou une orthographe différente par exemple.<br />
Vous pouvez aussi <a href="{$urlsite}dictionnaire-et-lexique-c0">parcourir le catalogue</a> ou utiliser les catégories dans la barre de menu situé à gauche.
</p>
<h3><span class="deco">></span>Vous recherchez un ouvrage particulier ?</h3>
<p>
	Donnez nous le titre ou  l'<acronym title="International Standard Book Number">ISBN</acronym> de l'ouvrage grâce au <a href="{$urlsite}index.php?page=contact">formulaire de contact</a>. Nous vous proposerons l'article en quelques instants.
</p>

<h3><span class="deco">></span>Vous n'avez pas d'idée précise ? Faites une recherche par catégorie.</h3>
{include file="$applicationlang/catalogue.tpl"}

{/if}
</div>