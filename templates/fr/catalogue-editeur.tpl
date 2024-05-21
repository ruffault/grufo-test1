<div id='vitrine_ed'>
	<h2><span class="deco">></span>Catalogue de l'éditeur : MédiQualis-M'édite</h2>
	<a href='/catalogue_editeur_pdf.php?id_editeur=12' title='Télécharger le catalogue au format PDF' target='_blank'><img src='css/picto_pdf.gif' border='0' align='absmiddle'> Télécharger le catalogue LMD-Dicoland au format PDF</a>
	<br/>
	<a href='/catalogue_editeur_pdf.php?id_editeur=785' title='Télécharger le catalogue au format PDF' target='_blank'><img src='css/picto_pdf.gif' border='0' align='absmiddle'> Télécharger le catalogue MédiQualis-M'édite au format PDF</a>

	{section name=vitrine loop=$vitrine}
		<div id="ed_det">


	<div class="cat-edit {$vitrine[vitrine].id_categorie|utf8_encode}">
			<h2>{$vitrine[vitrine].categorie|utf8_encode}</h2>
			
					<h3><a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}">{$vitrine[vitrine].nom|utf8_encode}</a></h3>
    		
	<div class="roundedcornr_box_vitimg">
   	<div class="roundedcornr_top_vitimg"><div></div></div>
      	<div class="roundedcornr_content_vitimg">	
			<span id='vit_img' >
      			{if $vitrine[vitrine].img_type == "none"}
        			<a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}"><img  src="{$urlsite}lang/{$applicationlang}/img/no-image.gif" width=56></a>
      			{else}
        		<a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}"><img src="{$urlsite}picproduct/{$vitrine[vitrine].id_produit}_icon.{$vitrine[vitrine].img_type}" alt="" /></a>
				{/if}
    		</span>
   		</div>
   	<div class="roundedcornr_bottom_vitimg"><div></div></div>
</div>	
  
	
	
	
			<div id="ed_info">

			<em>{$vitrine[vitrine].auteur|utf8_encode}</em>




		<p class='description'>
		{$vitrine[vitrine].description|utf8_encode|truncate:300:"...":true}
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

    </div>
           {if $vitrine[vitrine].prix != 0 && $vitrine[vitrine].sommeil != 1}
    				<form class="addpan"  method="get" action="{$urlsite}addtopanier.php?nbpage=1&amp;pagecourante=1&amp;nbresult=1">
      					<div>
        					<input type="image" value="Ajouter à mon panier" src="{$urlsite}lang/{$applicationlang}/img/addpan.png"/>
        					<input type="hidden" name="quantite" value="1"/>
        					<input type="hidden" name="page" value="vitrine"/>
        					<input type="hidden" name="id_produit" value="{$vitrine[vitrine].id_produit}"/>
      					</div>
    				</form>
    {/if}
    </div>
</div>
	
	{/section}

  </div>