	<h2><span class="deco">></span>Catalogue de l'éditeur : {$nomediteur|utf8_encode|strtolower|ucwords}</h2>
	<a href='/catalogue_editeur_pdf.php?id_editeur={$id_editeur}' title='Télécharger le catalogue au format PDF' target='_blank'><img src='css/picto_pdf.gif' border='0' align='absmiddle'> Télécharger le catalogue au format PDF</a>
	<table id='vitrine'>	
	{section name=vitrine loop=$vitrine}
	  {cycle values="<tr><td class='tdleft'>,<td>" name=hauttableau}
	  <h2><a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}">{$vitrine[vitrine].nom|utf8_encode}</a></h2>
    <span class="img-shadow">
      {if $vitrine[vitrine].img_type == "none"}
        &nbsp;
      {else}
        <a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}"><img src="{$urlsite}picproduct/{$vitrine[vitrine].id_produit}_icon.{$vitrine[vitrine].img_type}" alt="" /></a>
			{/if}
    </span>

		<em>{$vitrine[vitrine].auteur|utf8_encode}</em>
		<p class='description'>
		{$vitrine[vitrine].description|utf8_encode|truncate:325:"...":true}
		</p>
    {if $vitrine[vitrine].rabais != '0.00'}
      {if $smarty.session.ht  == "ht"}
        <strong>{$vitrine[vitrine].prix_rabais_ht} € HT ({$vitrine[vitrine].prix_rabais} € TTC)</strong>
      {else}
        <strong>{$vitrine[vitrine].prix_rabais} € TTC ({$vitrine[vitrine].prix_rabais_ht} € HT)</strong>
      {/if}
    {else}
      {if $smarty.session.ht  == "ht"}
    		<strong>{$vitrine[vitrine].prix_ht} € HT ({$vitrine[vitrine].prix} € TTC)</strong>
      {else}
    		<strong>{$vitrine[vitrine].prix} € TTC ({$vitrine[vitrine].prix_ht} € HT)</strong>
      {/if}
    {/if}
	{cycle values="</td>,</td></tr>"}
	{/section}

  </table>