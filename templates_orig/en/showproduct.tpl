{$script}

<div id="showproduct" >
	<div id="cat"><a href="{$urlsite}{$showproduct.id_categorie|categ_link:$showproduct.categorie}">{$showproduct.categorie|utf8_encode}</a></div>
	<h2>{$showproduct.nom|utf8_encode}</h2>

	{if ($showproduct.realname)}
		<p id="realname">Original title : {$showproduct.realname|utf8_encode}</p>
  {/if}

	<div class="roundedcornr_box_vitimg">
   		<div class="roundedcornr_top_vitimg"><div></div></div>
      		<div class="roundedcornr_content_vitimg">			

				<div id="desc">
    <span class="img-prod">
    {if $showproduct.img_type == "none"}
    <img src="{$urlsite}lang/{$applicationlang}/img/no-image.gif" alt="" />
    {else}
      <a href="{$urlsite}picproduct/{$showproduct.id_produit}_normal.{$showproduct.img_type}" onclick="zoom('picproduct/{$showproduct.id_produit}_normal.{$showproduct.img_type}');return false;"><img src="{$urlsite}picproduct/{$showproduct.id_produit}_mini.{$showproduct.img_type}" alt="{$showproduct.nom|utf8_encode}" /></a>
    {/if}
    </span>
  <div id="infoprod">
    {if $showproduct.auteur}
      <em>{$showproduct.auteur|utf8_encode}</em>    
    {/if}

		{if $showproduct.tab_lang && $showproduct.tab_lang.0.cible }
			<p>-
				{section name=langues loop=$showproduct.tab_lang}
					{$showproduct.tab_lang[langues].source|utf8_encode}
					/
					{$showproduct.tab_lang[langues].cible|utf8_encode}
					-
				{/section}
			</p>
		{/if}

		{if $showproduct.prix_editeur > $showproduct.prix && $showproduct.prix && $showproduct.prix ne '0.00'}
      {if $smarty.session.ht  == "ht"}
        <span id="prixediteur">Recommended Price: {$showproduct.prix_editeur_ht} € excl. VAT</span><br />
      {else}
        <span id="prixediteur">Recommended Price: {$showproduct.prix_editeur} € incl. VAT</span><br />
      {/if}
    {/if}
    {if $showproduct.rabais != '0.00' && $showproduct.prix ne '0.00'}
      {if $smarty.session.ht  == "ht"}
      	<div id="rabais"><span id="oldprice">{$showproduct.prix_ht} €</span> <span id="reduc">-{$showproduct.rabais|round}%</span></div>
      {else}
        <div id="rabais"><span id="oldprice">{$showproduct.prix} €</span> <span id="reduc">-{$showproduct.rabais|round}%</span></div>
      {/if}
    {/if}
    {if $showproduct.prix ne '0.00'}
      {if $showproduct.rabais != '0.00'}
        {if $smarty.session.ht  == "ht"}
          <span id="prix">{$showproduct.prix_rabais_ht} € excl. VAT ({$showproduct.prix_rabais}€ incl. VAT)</span>
        {else}
          <span id="prix">{$showproduct.prix_rabais} €  incl. VAT ({$showproduct.prix_rabais_ht}€ excl. VAT)</span>
        {/if}
      {else}
        {if $smarty.session.ht  == "ht"}
          <span id="prix">{$showproduct.prix_ht} € excl. VAT ({$showproduct.prix}€ incl. VAT)</span>
        {else}
          <span id="prix">{$showproduct.prix} € incl. VAT ({$showproduct.prix_ht}€ excl. VAT)</span>
        {/if}
      {/if}
    {/if}
    {if $showproduct.disponible == 0 && $showproduct.delai_reapprovisionnement && $showproduct.prix ne '0.00' && $showproduct.sommeil != 1}
      Item available in {$showproduct.delai_reapprovisionnement} days<br />
    {elseif $showproduct.disponible == 1 && $showproduct.prix ne '0.00' && $showproduct.sommeil != 1}
      <!--Item available--><br />
    {elseif $showproduct.prix == '0.00' or $showproduct.sommeil == 1}
      Item unavailable<br />
    {/if}

		{if $showproduct.prix != 0 && $showproduct.sommeil != 1}
    <form method="get" action="{$urlsite}addtopanier.php?nbpage=1&amp;pagecourante=1&amp;nbresult=1">
      <div>

        <input type="image" value="Add to basket" src="{$urlsite}lang/{$applicationlang}/img/addcaddy_big.gif" />
        <input type="hidden" name="quantite" value="1" />
        <input type="hidden" name="page" value="vitrine" />
        <input type="hidden" name="id_produit" value="{$showproduct.id_produit}" />
      </div>
    </form>
    {/if}
    	<a href="#" onclick="window.open('{$urlsite}recommend.php?id=1511','_blank','width=400,height=265,toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=1');">
	<img src="{$urlsite}css/recommend_friend.png" alt="" /> Recommend the book to a friend</a>
  </div>  
  </div>  


      					</div>
   					<div class="roundedcornr_bottom_vitimg"><div></div></div>
				</div>	
				
  {if $showproduct.description or $showproduct.info_divers}
  <div id='info'>
    {if $showproduct.description} 
      <h4><span class="deco">></span>Description</h4>
      <p>{$showproduct.description|utf8_encode}</p>
    {/if}
    {if $showproduct.info_divers}
        <br>
      <p>General Information :{$showproduct.info_divers|utf8_encode}</p>
    {/if}
    {if $showproduct.pdfap}
      <h4><span class="deco">></span><a href="{$showproduct.pdfap}"> Download an overview of the book</a></h4>
    {/if}
  </div>
  {/if}

  
  <div id="caract">
    
		<h4><span class="deco">></span>Features</h4>
		
		<table id="detailprod">
			<tr>
				<td>
					<ul>
						{if !$showproduct.tab_lang && $showproduct.langues}
							<li><strong>Languages: </strong>{$showproduct.langues|utf8_encode}</li>
						{elseif	!$showproduct.tab_lang.0.cible && $showproduct.tab_lang.0.source}
							<li><strong>Languages: </strong>{$showproduct.tab_lang.0.source|utf8_encode}</li>
						{/if}
						{if $showproduct.categorie}
							<li><strong>Category: </strong><a href="{$urlsite}{$showproduct.id_categorie|categ_link:$showproduct.categorie}">{$showproduct.categorie|utf8_encode}</a></li>
						{/if}
						{if $showproduct.auteur}
							<li><strong>Author: </strong>{$showproduct.auteur|utf8_encode}</li>
						{/if}
						{if $showproduct.nb_pages}
							<li><strong>Pages: </strong>{$showproduct.nb_pages}</li>
						{/if}
					</ul>
				</td>
				<td>
					<ul>
						{if $showproduct.nb_termes}
							<li><strong>Terms : </strong>{$showproduct.nb_termes}</li>
						{/if}
						{if $showproduct.index}
							<li><strong>Index available</strong></li>
						{/if}
						{if $showproduct.date_parution}
							<li><strong>Published: </strong>{$showproduct.date_parution}</li>
						{/if}
					</ul>
				</td>
				<td>
					<ul>
			      {if $showproduct.reference}
							<li><strong>Reference: </strong>{$showproduct.reference}</li>
						{/if}
						{if $showproduct.type}
							<li><strong>Type: </strong>{$showproduct.type}</li>
						{/if}
						{if $showproduct.prix_editeur ne '0.00'}
							<li><strong>Recommended Price: </strong>
							{if $smarty.session.ht  == "ht"}
								{$showproduct.prix_editeur_ht} € excl. VAT
							{else}
								{$showproduct.prix_editeur} € incl. VAT
							{/if}
							</li>
						{/if}

					</ul>
				</td>
			</tr>
		</table>
	</div>



</div>
