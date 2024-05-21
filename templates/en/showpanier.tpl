{if $panier}
<div id="panier">
<h2><span class="deco">></span>Your basket</h2>
<table id="panier">
	 <caption>Basket</caption>
		<tr>
			<th>Details</th>
			<th>Quantity</th>
			{if $smarty.session.ht  == "ht"}
			<th>Price excl. VAT</th>
			{/if}
			<th>Price incl. VAT</th>
		</tr>

	{section name=panier loop=$panier}
		{cycle values="<tr class='normal'>,<tr class='selected'>"}
		<td class='detail'>
  		<form method="post" action="{$urlsite}remfrompanier.php">
        <div>
            <input type="hidden" name="id" value="{$panier[panier].id_produit}" />
            <input type="hidden" name="typeaction" value="decote" />
            <input type="image" name="decote" value="Store" alt="Store" src="{$urlsite}lang/{$applicationlang}/img/mettredecote.gif" />
        </div>
      </form>
			<h3>
			<a href="{$urlsite}{$panier[panier].id_produit|product_link:$panier[panier].nom}">{$panier[panier].nom|utf8_encode}</a>
			</h3>
      <br />
			{if $panier[panier].disponible == 1}
				Available
			{else}
			  Available in {$panier[panier].delai_reapprovisionnement} days
			{/if}
      {if $panier[panier].quantite > 1}
        <br />
        <em>
    			{$panier[panier].quantite} x copies
          {if $smarty.session.ht  == "ht"}
            {$panier[panier].prix_unitaire_ht_rabais} € excl. VAT ({$panier[panier].prix_unitaire_ttc_rabais}  € incl. VAT)<br />
          {else}
            {$panier[panier].prix_unitaire_ttc_rabais} € incl. VAT ({$panier[panier].prix_unitaire_ht_rabais}  € excl. VAT)<br />
          {/if}
  			</em>
  		{/if}
		</td>
		<td>
			<form method="post" action="{$urlsite}remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="{$panier[panier].id_produit}" />
					<input type="text" name="quantite" value="{$panier[panier].quantite}" size="1" maxlength="2" />
					<input type="image" name="chgquantity" value="Modify" src="{$urlsite}lang/{$applicationlang}/img/chgquantity.gif" />
				</div>
			</form>
			<form method="post" action="{$urlsite}remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="{$panier[panier].id_produit}" />
					<input type="hidden" name="quantite" value="0" />
					<input type="image" name="chgquantity" value="Delete" src="{$urlsite}lang/{$applicationlang}/img/supprimer.gif" />
				</div>
			</form>
		</td>
		{if $smarty.session.ht  == "ht"}
		<td>
      <strong>{$panier[panier].prix_unitaire_rabais_ht_for_all} €</strong>
    </td>
		{/if}
		<td>
      <strong>
            {$panier[panier].prix_unitaire_ttc_rabais_for_all} €
      </strong>
    </td>
		</tr>
	{/section}
	<tr class="lastline">
		{if $smarty.session.ht  == "ht"}
			<td></td>
		{/if}
		<td></td>
		<td id="detailtotal">
			Total excl. VAT<br />
			+ VAT<br />
			Total incl. VAT
		</td>
		<td>
      {$prix_ht_total}  €<br />
      {$tva_totale}  €<br />
			{$prix_total}  €
		</td>
	</tr>
</table>
{if $delai_max}
  Lead time: <strong>{$delai_max} days</strong>
	<br />
	<em>Delivery time must be added to lead time. 
	Delivery times vary according to destination and transport modes.</em>
{else}
  <!-- <strong>No</strong> lead time -->
{/if}

	<div class="validcmd">
		{if $smarty.get.ajout == 1}
			<a href="{$smarty.get.url}" id="poursuivre"><img src="{$urlsite}lang/{$applicationlang}/img/poursuivre.gif" alt="Continue with your purchases" /></a>
		{/if}

		<a href="{$urlsite}verifmembre.php"><img src="{$urlsite}lang/{$applicationlang}/img/valider.gif" alt="Validate the order" /></a>
	</div>
</div>

{else}
<div id="panier">
<h2>Your basket is empty</h2>
<p>
  Please search for a book and then add it to your basket.
  <br />
  You may choose from 3 search modes:
</p>  
<ul>
  <li>
    <strong>Using the quick search tool:</strong>
    <br />
    Simply enter a keyword, an author's name or
    a title to find a corresponding book. 
    This function is located in the orange banner at the top of this page.
  </li>
  <li>
    <strong>Using the
    <a href='{$urlsite}index.php?page=advancedsearch'>advanced search tool</a></strong>
    <br />
  </li>
  <li>
    <strong>Using the
    <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>catalogue</a>:
    </strong><br />
    Simply click on the category that interests you 
    to access the corresponding sub-categories. Then select
    a sub-category to access the corresponding books.
  </li>
</ul>
</div>
{/if}
