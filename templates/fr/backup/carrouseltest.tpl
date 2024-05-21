
{literal}
<script type="text/javascript">
    $(document).ready(function(){
        $('#slider1').bxSlider({
            infiniteLoop: false,
            auto: true,
            pager: true                
        });
    });
    </script>
{/literal}

<div id="carrousel" style="margin-top:-10px;" >	
			<h2 class="vit_titre">Produit du mois</h2>

	<ul id="slider1" >
{*
		{section name=messages loop=$messages}
     	<li>
       	<h3>{$messages[messages].TITRE_MSG|utf8_encode}</h3>
		<h3>{$messages[messages].CONTENU_MSG|utf8_encode|nl2br}</h3>
    	</li>
      	{/section}
*}
		{section name=carrousel loop=$carrousel}
  		<li>
  		<a href="{$urlsite}{$carrousel[carrousel].id_produit|product_link:$carrousel[carrousel].nom:$carrousel[carrousel].categorie}"><img src="{$urlsite}picproduct/{$carrousel[carrousel].id_produit}_mini.jpg" alt="" /></a>
		<h3><a href="{$urlsite}{$carrousel[carrousel].id_produit|product_link:$carrousel[carrousel].nom:$carrousel[carrousel].categorie}">{$carrousel[carrousel].nom|utf8_encode}</a></h3>
		<p class='description'>{$carrousel[carrousel].description|utf8_encode|truncate:205:"...":true}</p>
		</li>
		{/section}

	</ul>
</div>