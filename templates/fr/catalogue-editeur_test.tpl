		<div id='vitrine_ed' style="margin:10px ; width: 560px;">
	<h2><span class="deco">></span>Catalogue de l'éditeur : {$nomediteur|utf8_encode|strtolower|ucwords}</h2>
	<a href='/catalogue_editeur_pdf.php?id_editeur={$id_editeur}' title='Télécharger le catalogue au format PDF' target='_blank'><img src='css/picto_pdf.gif' border='0' align='absmiddle'> Télécharger le catalogue au format PDF</a>


	{section name=vitrine loop=$vitrine}
	

	 <div class="cat-edit {$vitrine[vitrine].id_categorie|utf8_encode}">
    <span class="img-shadow_cat">
      {if $vitrine[vitrine].img_type == "none"}
        &nbsp;
      {else}
        <a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}"><img src="{$urlsite}picproduct/{$vitrine[vitrine].id_produit}_icon.{$vitrine[vitrine].img_type}" alt="" /></a>
			{/if}
    </span>
	  <h3 style="margin-left:100px"><a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}">{$vitrine[vitrine].nom|utf8_encode}</a></h3>

		<em style="margin-left:100px">{$vitrine[vitrine].auteur|utf8_encode}</em>

		<p style="margin-left:100px;width:300px" class='description'>
		{$vitrine[vitrine].description|utf8_encode|truncate:325:"...":true}
		</p>
			 {* <p style="position: absolute;margin: -100px 0px 0px 410px;"><a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}">En savoir plus</a></p>*}

    {if $vitrine[vitrine].rabais != '0.00'}
      {if $smarty.session.ht  == "ht"}
        <strong {*style="	position: absolute;margin: -80px 0px 0px 410px;"*}>{$vitrine[vitrine].prix_rabais_ht} € HT ({$vitrine[vitrine].prix_rabais} € TTC)</strong>
      {else}
        <strong style="float:right; margin: -80px 0px 0px 410px" >{$vitrine[vitrine].prix_rabais} € TTC ({$vitrine[vitrine].prix_rabais_ht} € HT)</strong>
      {/if}
    {else}
      {if $smarty.session.ht  == "ht"}
    		<strong style="float:right;margin: -80px 0px 0px 410px" >{$vitrine[vitrine].prix_ht} € HT ({$vitrine[vitrine].prix} € TTC)</strong>
      {else}
    		<strong style="float:right; margin: -80px 0px 0px 410px" >{$vitrine[vitrine].prix} € TTC ({$vitrine[vitrine].prix_ht} € HT)</strong>
      {/if}
    {/if}

        {if $vitrine[vitrine].prix != 0 && $vitrine[vitrine].sommeil != 1}
    <form style="float:right" method="get" action="{$urlsite}addtopanier.php?nbpage=1&amp;pagecourante=1&amp;nbresult=1">
      <div>
        <br />
        <input type="image" value="Ajouter à mon panier" src="{$urlsite}lang/{$applicationlang}/img/addcaddy_big.gif" />
        <input type="hidden" name="quantite" value="1" />
        <input type="hidden" name="page" value="vitrine" />
        <input type="hidden" name="id_produit" value="{$vitrine[vitrine].id_produit}" />
      </div>
    </form>
    {/if}
    
    <div id="clearing" style="display:block;clear: both; font-size:1%">
    </div>
    </div>

	
	{/section}

  </div>