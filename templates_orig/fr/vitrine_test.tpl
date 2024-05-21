

<div id='vitrine_test2'>
			<h2 class="vit_titre">Vient de paraitre</h2>
	<ul id="slider3" >
	{section name=vitrine loop=$vitrine}
	  {cycle values="<li>" }

      {if $vitrine[vitrine].img_type == "none"}
        &nbsp;
      {else}
      
        <a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}"><img src="{$urlsite}picproduct/{$vitrine[vitrine].id_produit}_icon.{$vitrine[vitrine].img_type}" alt="" /></a>
			{/if}
	  <h3><a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}">{$vitrine[vitrine].nom|utf8_encode|truncate:128:"...":true}</a></h3>


		<em>{$vitrine[vitrine].auteur|utf8_encode}</em>
		<p class='description'>
		{$vitrine[vitrine].description|utf8_encode|truncate:300:"...":true}
		</p>
		
    {if $vitrine[vitrine].rabais != '0.00'}
      {if $smarty.session.ht  == "ht"}
        <strong style="	margin-left: 10px;">{$vitrine[vitrine].prix_rabais_ht} € HT ({$vitrine[vitrine].prix_rabais} € TTC)</strong>
      {else}
        <strong style="	margin-left: 10px;">{$vitrine[vitrine].prix_rabais} € TTC ({$vitrine[vitrine].prix_rabais_ht} € HT)</strong>
      {/if}
    {else}
      {if $smarty.session.ht  == "ht"}
    		<strong style="	margin-left: 10px;">{$vitrine[vitrine].prix_ht} € HT ({$vitrine[vitrine].prix} € TTC)</strong>
      {else}
    		<strong style="	margin-left: 10px;">{$vitrine[vitrine].prix} € TTC ({$vitrine[vitrine].prix_ht} € HT)</strong>
      {/if}
    {/if}
	{cycle values="</li>"}
	{/section}
	</ul>
</div>

</br>

{literal}
<script type="text/javascript">
    $(document).ready(function(){
        $('#slider2').bxSlider({
            displaySlideQty: 5,
            moveSlideQty: 1,

            infiniteLoop: false,
            auto: true               
        });
    });
    </script>
{/literal}

<div id='vitrine_test'>
			<h2 class="vit_titre">Notre sélection</h2>
	<ul id="slider2" >
	{section name=vitrine loop=$vitrine}
	  {cycle values="<li>" }
	{*  <h2><a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}">{$vitrine[vitrine].nom|utf8_encode|truncate:28:"...":true}</a></h2>
*}
      {if $vitrine[vitrine].img_type == "none"}
        &nbsp;
      {else}
        <a href="{$urlsite}{$vitrine[vitrine].id_produit|product_link:$vitrine[vitrine].nom:$vitrine[vitrine].categorie}"><img src="{$urlsite}picproduct/{$vitrine[vitrine].id_produit}_icon.{$vitrine[vitrine].img_type}" alt="" /></a>
			{/if}

{*
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
    {/if}*}
	{cycle values="</li>"}
	{/section}
	</ul>
</div>