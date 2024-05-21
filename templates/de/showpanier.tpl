{if $panier}
<div id="panier">
<h2><span class="deco">></span>Ihr Warenkorb</h2>
<table id="panier">
	 <caption>Warenkorb</caption>
		<tr>
			<th>Detail</th>
			<th>Menge</th>
			{if $smarty.session.ht  == "ht"}
			<th>Preis zzgl. MwSt</th>
			{/if}
			<th>Preis einschl. MwSt</th>
		</tr>

	{section name=panier loop=$panier}
		{cycle values="<tr class='normal'>,<tr class='selected'>"}
		<td class='detail'>
  		<form method="post" action="{$urlsite}remfrompanier.php">
        <div>
            <input type="hidden" name="id" value="{$panier[panier].id_produit}" />
            <input type="hidden" name="typeaction" value="decote" />
            <input type="image" name="decote" value="Beiseite legen" alt="Beiseite legen" src="{$urlsite}lang/{$applicationlang}/img/mettredecote.gif" />
        </div>
      </form>
			<h3>
			<a href="{$urlsite}{$panier[panier].id_produit|product_link:$panier[panier].nom}">{$panier[panier].nom|utf8_encode}</a>
			</h3>
      <br />
			{if $panier[panier].disponible == 1}
				Lieferbar
			{else}
			  Lieferbar binnen {$panier[panier].delai_reapprovisionnement} Tagen
			{/if}
      {if $panier[panier].quantite > 1}
        <br />
        <em>
    			{$panier[panier].quantite} x Stück
          {if $smarty.session.ht  == "ht"}
            {$panier[panier].prix_unitaire_ht_rabais} € zzgl. MwSt ({$panier[panier].prix_unitaire_ttc_rabais}  € einschl. MwSt)<br />
          {else}
            {$panier[panier].prix_unitaire_ttc_rabais} € einschl. MwSt ({$panier[panier].prix_unitaire_ht_rabais}  € zzgl. MwSt)<br />
          {/if}
  			</em>
  		{/if}
		</td>
		<td>
			<form method="post" action="{$urlsite}remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="{$panier[panier].id_produit}" />
					<input type="text" name="quantite" value="{$panier[panier].quantite}" size="1" maxlength="2" />
					<input type="image" name="chgquantity" value="Ändern" src="{$urlsite}lang/{$applicationlang}/img/chgquantity.gif" />
				</div>
			</form>
			<form method="post" action="{$urlsite}remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="{$panier[panier].id_produit}" />
					<input type="hidden" name="quantite" value="0" />
					<input type="image" name="chgquantity" value="Löschen" src="{$urlsite}lang/{$applicationlang}/img/supprimer.gif" />
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
			Gesamtpreis zzgl. MwSt<br />
			+ MwSt<br />
			Gesamtpreis einschl. MwSt
		</td>
		<td>
      {$prix_ht_total}  €<br />
      {$tva_totale}  €<br />
			{$prix_total}  €
		</td>
	</tr>
</table>
{if $delai_max}
  Beschaffungsfrist: <strong>{$delai_max} Tage</strong>
	<br />
	<em>Zu dieser Frist kommt die Lieferfrist, die vom Bestimmungsort und der Transportart
	abhängig ist.</em>
{else}
  <!-- <strong>Keine</strong> Beschaffungsfrist -->
{/if}

	<div class="validcmd">
		{if $smarty.get.ajout == 1}
			<a href="{$smarty.get.url}" id="poursuivre"><img src="{$urlsite}lang/{$applicationlang}/img/poursuivre.gif" alt="Einkauf fortsetzen" /></a>
		{/if}

		<a href="{$urlsite}verifmembre.php"><img src="{$urlsite}lang/{$applicationlang}/img/valider.gif" alt="Bestellung freigeben" /></a>
	</div>
</div>

{else}
<div id="panier">
<h2>Ihr Warenkorb ist leer</h2>
<p>
  Suchen Sie ein Buch und legen Sie es in Ihren Warenkorb. 
  <br />
  Sie haben 3 Möglichkeiten, eine Suche durchzuführen:
  </p>  
<ul>
  <li>
    <strong>Schnellsuche</strong>
    <br />
    Geben Sie einfach ein Stichwort, einen Autor oder einen Buchtitel ein, um das
    gewünschte Buch zu suchen. Die Schnellsuchfunktion befindet sich auf der
    orangefarbenen Leiste oben auf der Seite. 
  </li>
  <li>
    <strong> 
    <a href='{$urlsite}index.php?page=advancedsearch'>Erweiterte Suche</a></strong>
    <br />
  </li>
  <li>
    <strong>Per 
    <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Katalogsuche</a> 
    </strong><br />
    Klicken Sie einfach auf die gewünschte Kategorie, um auf die dazugehörigen 
    Unterkategorien zugreifen zu können. Wählen Sie anschließend eine Unterkategorie, 
    um die entsprechenden Bücher anzuzeigen.
  </li>
</ul>
</div>
{/if}
