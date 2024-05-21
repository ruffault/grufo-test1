<div id="recapitulatif" style="width:580px">
  <h2><span class="deco">></span>Fase 5 - Scegli una modalità di pagamento</h2>
  
  <h3><a href="#" onclick="window.print();"><img src="{$urlsite}css/print.gif" alt="Stampa" /></a>Ordine</h3>

  <table id="panier">
  	 <caption>Ordine</caption>
  		<tr>
  			<th>Dettaglio</th>
  			<th>Quantità</th>
  			{if $smarty.session.ht  == "ht"}
	  			<th style="text-align: right;">Prezzo tasse escluse</th>
				{else}
	 				<th style="text-align: right;">Prezzo tasse incluse</th>
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
							{$basket[basket].quantite} esemplari x
								{if $smarty.session.ht  == "ht"}
									{$basket[basket].prix_unitaire_ht} € tasse escluse ({$basket[basket].prix_unitaire} € tasse incluse)<br />
								{else}
									{$basket[basket].prix_unitaire} € tasse incluse ({$basket[basket].prix_unitaire_ht} € tasse escluse)<br />
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
				<br />Totale tasse escluse<br />
				{if $smarty.session.ht  != "ht"}
					+ IVA<br />
					Totale tasse incluse<br /><br />
				{/if}
				+ Spese di trasporto<br />
        <strong>Subtotale</strong>
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
  <div>Tempi di consegna: <strong>{$delai_max} giorni</strong><br /><em>(Incluso il tempo di approvvigionamento e di spedizione).</em></div>
  
  <div id="livraison">
  <h3>Adresse de livraison</h3>
  <p>
  {if $address.livraison_civilite == 1}
    Sig.
  {elseif $address.livraison_civilite == 2}
    Sig.ra
  {else}
    Sig.ina
  {/if}
  </p>
  </div>
  <div id="boiterecap">
		<div id="facturation">
		<h3>Indirizzo per la fatturazione</h3>
		<p>
		{if $address.facturation_civilite == 1}
  	  Sig.
		{elseif $address.facturation_civilite == 2}
	    Sig.ra
		{else}
    	Sig.ina
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
		<h3>Modalità di pagamento</h3>
			<form method="post" action="{$urlsite}verifmodepaiement.php">
			<p>
			{if $smarty.session.modepaiement_mode == visa or !$smarty.session.modepaiement_mode}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked" /> Carta di credito (pagamento in modalità sicura)<br />
					
			{elseif $smarty.session.modepaiement_mode == cheque}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked" /> Carta di credito (pagamento in modalità sicura)<br />
			{else $smarty.session.modepaiement_mode == virement}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked" /> Carta di credito (pagamento in modalità sicura)<br />
			{/if}
					<input type="submit" name="modepaiement_submit" value="ok">
			</p>
			</form>
		</div>
	</div>
</div>
