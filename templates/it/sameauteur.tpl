{if $sameauteur}
<div id="sameauteur"><br>
  <h4><span class="deco">&gt;</span>Opere dello stesso autore</h4>
  <div>
  	{section name=sameauteur loop=$sameauteur}
  	<dl class="float-left">
  		<dd>
        <span class="img-shadow">
          {if $sameauteur[sameauteur].img_type == "none"}
            <a href="{$urlsite}{$sameauteur[sameauteur].id_produit|product_link:$sameauteur[sameauteur].nom:$sameauteur[sameauteur].auteur}"><img src="{$urlsite}lang/{$applicationlang}/img/no-image_icon.gif" alt="" /></a>
          {else}
            <a href="{$urlsite}{$sameauteur[sameauteur].id_produit|product_link:$sameauteur[sameauteur].nom:$sameauteur[sameauteur].auteur}"><img src="{$urlsite}picproduct/{$sameauteur[sameauteur].id_produit}_icon.{$sameauteur[sameauteur].img_type}" alt="{$sameauteur[sameauteur].nom}" /></a>
          {/if}
        </span>
      </dd>
  		<dd><h5><a href="{$urlsite}{$sameauteur[sameauteur].id_produit|product_link:$sameauteur[sameauteur].nom:$sameauteur[sameauteur].auteur}">{$sameauteur[sameauteur].nom|utf8_encode}</a></h5></dd>
  		<dd><em>{$sameauteur[sameauteur].auteur|utf8_encode}</em></dd>
  		<dd>
      {if $sameauteur[sameauteur].rabais != '0.00' && $sameauteur[sameauteur].prix ne '0.00'}
        {if $smarty.session.ht  == "ht"}
          <strong>{$sameauteur[sameauteur].prix_rabais_ht}€ tasse escluse ({$sameauteur[sameauteur].prix_rabais}€ TTC)</strong>
        {else}
          <strong>{$sameauteur[sameauteur].prix_rabais}€ tasse incluse ({$sameauteur[sameauteur].prix_rabais_ht}€ HT)</strong>
        {/if}
      {else}
        {if $smarty.session.ht  == "ht" && $sameauteur[sameauteur].prix ne '0.00'}
      		<strong>{$sameauteur[sameauteur].prix_ht}€ tasse escluse({$sameauteur[sameauteur].prix}€ TTC)</strong>
        {elseif $sameauteur[sameauteur].prix ne '0.00'}
      		<strong>{$sameauteur[sameauteur].prix}€ tasse incluse({$sameauteur[sameauteur].prix_ht}€ HT)</strong>
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
