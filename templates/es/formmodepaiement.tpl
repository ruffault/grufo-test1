<div id="recapitulatif" style="width:580px">
  <h2><span class="deco">></span>Etapa 5 - Elija una forma de pago</h2>
  
  <h3><a href="#" onclick="window.print();"><img src="{$urlsite}css/print.gif" alt="Imprimir" /></a>Pedido</h3>

  <table id="panier">
  	 <caption>Pedido</caption>
  		<tr>
  			<th>Detalle</th>
  			<th>Cantidad</th>
  			{if $smarty.session.ht  == "ht"}
	  			<th style="text-align: right;">Precio sin IVA</th>
				{else}
	 				<th style="text-align: right;">Precio con IVA</th>
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
							{$basket[basket].quantite} ejemplares x
								{if $smarty.session.ht  == "ht"}
									{$basket[basket].prix_unitaire_ht} € sin IVA ({$basket[basket].prix_unitaire} € con IVA)<br />
								{else}
									{$basket[basket].prix_unitaire} € con IVA ({$basket[basket].prix_unitaire_ht} € sin IVA)<br />
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
				<br />Total sin IVA<br />
				{if $smarty.session.ht  != "ht"}
					+ IVA<br />
					Total con IVA<br /><br />
				{/if}
				+ Portes<br />
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
  <div>Plazo de entrega:<strong>{$delai_max} días</strong><br /><em>(Este plazo incluye el tiempo de aprovisionamiento y de envío).</em></div>
  
  <div id="livraison">
  <h3>Dirección de entrega</h3>
  <p>
  {if $address.livraison_civilite == 1}
    Sr.
  {elseif $address.livraison_civilite == 2}
    Sra.
  {else}
    Srta.
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
			Sr.
		{elseif $address.facturation_civilite == 2}
			Sra.
		{else}
			Srta.
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
		<h3>Forma de pago</h3>
			<form method="post" action="verifmodepaiement.php">
			<p>
			{if $smarty.session.modepaiement_mode == visa or !$smarty.session.modepaiement_mode}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked"/> Tarjeta de crédito (pago seguro)<br />
					
			{elseif $smarty.session.modepaiement_mode == cheque}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked"/> Tarjeta de crédito (pago seguro)<br />
			{else $smarty.session.modepaiement_mode == virement}
					<input type="radio" name="modepaiement_mode" value="visa" checked="checked"/> Tarjeta de crédito (pago seguro)<br />
			{/if}
					<input type="submit" name="modepaiement_submit" value="ok">
			</p>
			</form>
		</div>
	</div>
</div>
