<div id="recapitulatif" style="width:580px">
  <h2><span class="deco">></span>Step 5 - Chooose your method of payment</h2>
  
  <h3><a href="#" onclick="window.print();"><img src="{$urlsite}css/print.gif" alt="Print" /></a>Order</h3>

  <table id="panier">
  	 <caption>Order</caption>
  		<tr>
  			<th>Details</th>
  			<th>Quantity</th>
  			{if $smarty.session.ht  == "ht"}
	  			<th style="text-align: right;">Price excl. VAT</th>
				{else}
	 				<th style="text-align: right;">Price incl. VAT</th>
  			{/if}
  		</tr>
  
		{section name=basket loop=$basket}
			{cycle values="<tr class='normal'>,<tr class='selected'>"}
				<td class='detail'>
					<h3>{$basket[basket].nom|utf8_encode}</h3>
					{*
					{if $basket[basket].quantite > 1}
						<br />
						<em>
							{$basket[basket].quantite} copies x
								{if $smarty.session.ht  == "ht"}
									{$basket[basket].prix_unitaire_ht} € excl. VAT ({$basket[basket].prix_unitaire} € incl. VAT)<br />
								{else}
									{$basket[basket].prix_unitaire} € incl. VAT ({$basket[basket].prix_unitaire_ht} € excl. VAT)<br />
								{/if}
						</em>
					{/if}
					*}
				</td>
				<td>
					{$basket[basket].quantite}
		  	</td>
				<td style="text-align: right;">
				{if $smarty.session.ht  == "ht"}
						{$basket[basket].prix_unitaire_rabais_ht_for_all} €
		  	{else}
						{$basket[basket].prix_unitaire_ttc_rabais_for_all} €
				{/if}
				</td>
  		</tr>
  	{/section}
  	<tr class="lastline">
  		<td>&nbsp;</td>
  		<td>
				<br />total excl. VAT<br />
				{if $smarty.session.ht  != "ht"}
					+ VAT<br />
					total incl. VAT<br /><br />
				{/if}
				+ Carriage<br />
        <strong>Total</strong>
  		</td>
  		<td style="text-align: right;">
        <br />{$prix_ht_total} €<br />
				{if $smarty.session.ht  != "ht"}
					{$tva_totale} €<br />
					{$prix_total} €<br /><br />
				{/if}
        {$frais_port} €<br />
        <strong>{$soustotal} €</strong>
  		</td>
  	</tr>
  </table><br />
  <div>Delivery lead time: <strong>{$delai_max} days</strong><br /><em>(This period includes the order lead time and transport time).</em></div>
  
  <div id="livraison">
  <h3>Delivery address</h3>
  <p>
  {if $address.livraison_civilite == 1}
    Mr.
  {elseif $address.livraison_civilite == 2}
    Mrs.
  {else}
    Miss
  {/if}

  {$address.livraison_nom} {$address.livraison_prenom}<br />
  {$address.livraison_adresse1}<br />
  {if $address.livraison_adresse2}
    {$address.livraison_adresse2}<br />
  {/if}
  {if $address.livraison_adresse3}
    {$address.livraison_adresse3}
  {/if}
  {$address.livraison_cp} {$address.livraison_ville}<br />
  {$address.livraison_etat} {$address.livraison_pays_name}
  </p>
  </div>
  <div id="boiterecap">
		<div id="facturation">
		<h3>Adresse de facturation</h3>
		<p>
		{if $address.facturation_civilite == 1}
			Mr.
		{elseif $address.facturation_civilite == 2}
			Mrs.
		{else}
			Miss
		{/if}
		{$address.facturation_nom} {$address.facturation_prenom}<br />
		{$address.facturation_adresse1}<br />
		{if $address.facturation_adresse2}
			{$address.facturation_adresse2}<br />
		{/if}
		{if $address.facturation_adresse3}
			{$address.facturation_adresse3}<br />
		{/if}
		{$address.facturation_cp} {$address.facturation_ville}<br />
		{$address.facturation_etat} {$address.facturation_pays_name}
		</p>
		</div>
		<div id="reglement">
		<h3>Method of payment</h3>
			<form method="post" action="{$urlsite}verifmodepaiement.php">
			<p>
			{if $smarty.session.modepaiement_mode == visa or !$smarty.session.modepaiement_mode}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked"/> Credit card (secure payment)<br />
					
			{elseif $smarty.session.modepaiement_mode == cheque}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked"/> Credit card (secure payment)<br />
			{else $smarty.session.modepaiement_mode == virement}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked"/> Credit card (secure payment)<br />
			{/if}
					<input type="submit" name="modepaiement_submit" value="ok">
			</p>
			</form>
		</div>
	</div>
</div>
