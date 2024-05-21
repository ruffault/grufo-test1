		<div id='vitrine_ed' style="margin:10px ; width: 560px;">
	<h2><span class="deco">></span>Occasion</h2>

	{section name=vitrine loop=$vitrine}

	<div id="oc_det"class='border_all'>
		
	 <div class="cat-edit {$vitrine[vitrine].id_categorie|utf8_encode}" >
	 <h2>{$vitrine[vitrine].categorie|utf8_encode}</h2>
	  <h3 style="margin-right:200px"><a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}">{$vitrine[vitrine].nom|utf8_encode}</a></h3>
   

		<em>{$vitrine[vitrine].auteur|utf8_encode}</em>

		<p style="margin-right:200px" class='description'>
		{$vitrine[vitrine].description|utf8_encode|truncate:325:"...":true}
		</p>
	<form   method="get" action="{$urlsite}addtopanier.php?nbpage=1&amp;pagecourante=1&amp;nbresult=1">
      <div >
        <br />
         <input type="image" value="Ajouter à mon panier" src="{$urlsite}lang/{$applicationlang}/img/addpan.png" />
        <input type="hidden" name="quantite" value="1" />
        <input type="hidden" name="page" value="vitrine" />
        <input type="hidden" name="id_produit" value="{$vitrine[vitrine].id_produit}" />
      </div>
    </form>
    {if $vitrine[vitrine].rabais != '0.00'}
      {if $smarty.session.ht  == "ht"}
            <div >Ancien prix :<span id="oldprice">{$vitrine[vitrine].prix_editeur} €</span> moins <strong style="color:red">{$vitrine[vitrine].rabais}%</strong> soit:</div>
        <strong>{$vitrine[vitrine].prix_rabais_ht} € HT ({$vitrine[vitrine].prix_rabais} € TTC)</strong>
      {else}
            <div >Ancien prix :<span id="oldprice">{$vitrine[vitrine].prix_editeur} €</span> moins <strong style="color:red">{$vitrine[vitrine].rabais}%</strong> soit:</div>
        <strong>{$vitrine[vitrine].prix_rabais} € TTC ({$vitrine[vitrine].prix_rabais_ht} € HT)</strong>
      {/if}
    {else}
      {if $smarty.session.ht  == "ht"}
            <div >Ancien prix :<span id="oldprice">{$vitrine[vitrine].prix_editeur} €</span> moins <strong style="color:red">{$vitrine[vitrine].rabais}%</strong> soit:</div>
    		<strong>{$vitrine[vitrine].prix_ht} € HT ({$vitrine[vitrine].prix} € TTC)</strong>
      {else}
            <div >Ancien prix :<span id="oldprice">{$vitrine[vitrine].prix_editeur} €</span> moins <strong style="color:red">{$vitrine[vitrine].rabais}%</strong> soit:</div>
    		<strong>{$vitrine[vitrine].prix} € TTC ({$vitrine[vitrine].prix_ht} € HT)</strong>
      {/if}
    {/if}




    </div>
</div>
	
	{/section}

  </div>