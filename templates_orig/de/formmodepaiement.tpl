<div id="recapitulatif" style="width:580px">
  <h2><span class="deco">></span>Schritt 5 - Zahlungsart wählen</h2>
  
  <h3><a href="#" onclick="window.print();"><img src="{$urlsite}css/print.gif" alt="drucken" /></a>Bestellung</h3>

  <table id="panier">
  	 <caption>Bestellung</caption>
  		<tr>
  			<th>Detail</th>
  			<th>Menge</th>
  			{if $smarty.session.ht  == "ht"}
	  			<th style="text-align: right;">Preis zzgl. MwSt</th>
				{else}
	 				<th style="text-align: right;">Preis einschl. MwSt</th>
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
							{$basket[basket].quantite} Bestellmenge x
								{if $smarty.session.ht  == "ht"}
									{$basket[basket].prix_unitaire_ht} € zzgl. MwSt ({$basket[basket].prix_unitaire} € einschl. MwSt)<br />
								{else}
									{$basket[basket].prix_unitaire} € einschl. MwSt ({$basket[basket].prix_unitaire_ht} € zzgl. MwSt)<br />
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
				<br />Zwischens. zzgl.<br />
				{if $smarty.session.ht  != "ht"}
					+ MwSt<br />
					Zwischens. MwSt<br /><br />
				{/if}
				+ Versandkosten<br />
        <strong>Gesamtpreis</strong>
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
  <div>Lieferfrist: <strong>{$delai_max} Tage</strong><br /><em>(einschl. Beschaffungs- und Zustellungsdauer)</em></div>

  <div id="livraison">
  <h3>Adresse de livraison</h3>
  <p>
  {if $address.livraison_civilite == 1}
	  Herr
  {elseif $address.livraison_civilite == 2}
    Frau
  {else}
    Fräulein
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
		<h3>Rechnungsadresse</h3>
		<p>
		{if $address.facturation_civilite == 1}
			Herr
		{elseif $address.facturation_civilite == 2}
			Frau
		{else}
			Fräulein
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
		<h3>Zahlungsart</h3>
			<form method="post" action="{$urlsite}verifmodepaiement.php">
			<p>
			{if $smarty.session.modepaiement_mode == visa or !$smarty.session.modepaiement_mode}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked"/> Kreditkarte (sichere Zahlung)<br />
				
			{elseif $smarty.session.modepaiement_mode == cheque}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked"/> Kreditkarte (sichere Zahlung)<br />
			{else $smarty.session.modepaiement_mode == virement}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked"/> Kreditkarte (sichere Zahlung)<br />
			{/if}
					<input type="submit" name="modepaiement_submit" value="ok">
			</p>
			</form>
		</div>
	</div>
</div>
