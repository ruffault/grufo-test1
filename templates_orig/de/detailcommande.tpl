<div id="detailcommande">
<h2><span class="deco">></span>Bestellung-Nr.{$smarty.get.no}</h2>


{if $produit}
	{section name=produit loop=$produit}
      <div>
        <span class="img-shadow">
          {if $produit[produit].img_type == "none"}
            <a href="{$urlsite}{$produit[produit].id_produit|product_link:$produit[produit].nom}"><img src="{$urlsite}css/no-image_icon.gif" alt="" /></a>
          {else}
            <a href="{$urlsite}{$produit[produit].id_produit|product_link:$produit[produit].nom}"><img src="{$urlsite}picproduct/{$produit[produit].id_produit}_icon.{$produit[produit].img_type}" alt="" /></a>
          {/if}
        </span>
			<h3><a href="{$urlsite}{$produit[produit].id_produit|product_link:$produit[produit].nom}">{$produit[produit].nom|utf8_encode}</a></h3>
      {if $produit[produit].auteur}
        <em>{$produit[produit].auteur}<em>
      {/if}

      {if $produit[produit].quantite > 1}
        <br /><em>(Bestellmenge {$produit[produit].quantite})</em>
  		{/if}
  		</div>
  		<hr />
	{/section}
{/if}

<a href='{$urlsite}index.php?page=oldcommande'>Liste der vorhergehenden Bestellungen anzeigen </a>
</div>
