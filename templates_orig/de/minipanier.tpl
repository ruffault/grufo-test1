{if $mini_panier}
<div class="minipanier">
<table class="minipanier">
	 <caption><a href='{$urlsite}index.php?page=showpanier'>Mini-Warenkorb</a></caption>
		<tr>
			<th>Detail</th>
			{if $smarty.session.ht  == "ht"}
			<th>Preis zzgl. MwSt</th>
			{else}
			<th>Preis einschl. MwSt</th>
			{/if}
		</tr>

	{section name=mini_panier loop=$mini_panier}
		{cycle values="<tr class='normal'>,<tr class='selected'>"}
		<td class='detail'>
			<a href="{$urlsite}{$mini_panier[mini_panier].id_produit|product_link:$mini_panier[mini_panier].nom}">{$mini_panier[mini_panier].nom|utf8_encode}</a>
      {if $mini_panier[mini_panier].quantite > 1}
        <br /><em>
    			{$mini_panier[mini_panier].quantite} Menge
  			</em>
  		{/if}
  </td>
		{if $smarty.session.ht  == "ht"}
		<td>
     		{$mini_panier[mini_panier].prix_unitaire_rabais_ht_for_all} €
    </td>
		{else}
		<td>
    		{$mini_panier[mini_panier].prix_unitaire_ttc_rabais_for_all} €
    </td>
    {/if}
		</tr>
		<tr><td colspan="2"><hr /></td></tr>
	{/section}
	<tr class="lastline">
		<td id="detailtotal">
			Gesamtpreis zzgl. MwSt<br />
			+ MwSt<br />
			Gesamtpreis einschl. MwSt
		</td>
		<td>
      {$mini_prix_ht_total}  €<br /><br />
      {$mini_tva_totale}  €<br /><br />
			{$mini_prix_total}  €
		</td>
	</tr>
</table>
<div class="validcmd">
  <a href="{$urlsite}verifmembre.php"><img src="{$urlsite}lang/{$applicationlang}/img/valider.gif" alt="Jetzt zahlen" /></a>
</div>

</div>
{/if}