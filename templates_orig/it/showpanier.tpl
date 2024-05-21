{if $panier}
<div id="panier">
<h2><span class="deco">></span>Il tuo carrello</h2>
{if $smarty.get.ajout == 1}
<h3>Il prodotto è stato aggiunto al tuo carrello - <a href='{$smarty.get.url}'>Torna al dettaglio del prodotto</a></h3>
{/if}
<table id="panier">
	 <caption>Carrello</caption>
		<tr>
			<th>Dettaglio</th>
			<th>Quantità</th>
			{if $smarty.session.ht  == "ht"}
			<th>Prezzo tasse escluse</th>
			{/if}
			<th>Prezzo tasse incluse</th>
		</tr>

	{section name=panier loop=$panier}
		{cycle values="<tr class='normal'>,<tr class='selected'>"}
		<td class='detail'>
  		<form method="post" action="{$urlsite}remfrompanier.php">
        <div>
            <input type="hidden" name="id" value="{$panier[panier].id_produit}">
            <input type="hidden" name="typeaction" value="decote">
            <input type="image" name="decote" value="Conserva" alt="Conserva" src="{$urlsite}lang/{$applicationlang}/img/mettredecote.gif">
        </div>
      </form>
			<h3><a href="{$urlsite}{$panier[panier].id_produit|product_link:$panier[panier].nom}">{$panier[panier].nom|utf8_encode}</a></h3>
      <br />
			{if $panier[panier].disponible == 1}
				Disponibile
			{else}
			  Disponibile in {$panier[panier].delai_reapprovisionnement} giorni
			{/if}
      {if $panier[panier].quantite > 1}
        <br />
        <em>
    			{$panier[panier].quantite} esemplari x
          {if $smarty.session.ht  == "ht"}
            {$panier[panier].prix_unitaire_ht_rabais} € tasse escluse ({$panier[panier].prix_unitaire_ttc_rabais}  € tasse incluse)<br />
          {else}
            {$panier[panier].prix_unitaire_ttc_rabais} € tasse incluse ({$panier[panier].prix_unitaire_ht_rabais}  € tasse escluse)<br />
          {/if}
  			</em>
  		{/if}
		</td>
		<td>
			<form method="post" action="{$urlsite}remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="{$panier[panier].id_produit}">
					<input type="text" name="quantite" value="{$panier[panier].quantite}" size="1" maxlength="2">
					<input type="image" name="chgquantity" value="Modifier la quantité" src="{$urlsite}lang/{$applicationlang}/img/chgquantity.gif">
				</div>
			</form>

			<form method="post" action="{$urlsite}remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="{$panier[panier].id_produit}">
					<input type="hidden" name="quantite" value="0" />
					<input type="image" name="chgquantity" value="Elimina" src="{$urlsite}lang/{$applicationlang}/img/supprimer.gif">
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
			Totale tasse escluse<br />
			+ IVA<br />
			Totale tasse incluse
		</td>
		<td>
      {$prix_ht_total}  €<br />
      {$tva_totale}  €<br />
			{$prix_total}  €
		</td>
	</tr>
</table>
{if $delai_max}
  Tempo di approvvigionamento: <strong>{$delai_max} giorni</strong>
{else}
  <strong>Nessun</strong> tempo di approvvigionamento
{/if}
<br />
<em>A questo tempo va aggiunto il tempo di consegna, 
che varia a seconda del luogo di destinazione e della modalità di trasporto.</em>
<div class="validcmd"><a href="{$urlsite}verifmembre.php"><img src="{$urlsite}lang/{$applicationlang}/img/valider.gif" alt="Procedi al pagamento"></a></div>
</div>

{else}
<div id="panier">
<h2>Il tuo carrello è vuoto</h2>
<p>
  Devi cercare un libro e inserirlo nel tuo carrello.
  <br />
  Puoi scegliere tra 3 metodi di ricerca:
</p>  
<ul>
  <li>
    <strong>Per usare la ricerca rapida:</strong>
    <br />
    E' sufficiente inserire una parola chiave, il nome di un autore o  
    un titolo per trovare l'opera 
    corrispondente. Questa funzione si trova nella cornice arancione
    in alto in questa pagina.
  </li>
  <li>
    <strong>Per usare la
    <a href='{$urlsite}index.php?page=advancedsearch'>ricerca avanzata</a></strong>
    <br />
  </li>
  <li>
    <strong>Per usare il
    <a href='{$urlsite}dictionnaire-et-lexique-c0'>catalogo</a>:
    </strong><br />
    E' sufficiente cliccare sulla categoria di tuo interesse 
    per accedere alle sottocategorie corrispondenti. Scegli 
    poi una sottocategoria per accedere ai libri corrispondenti.
  </li>
</ul>
</div>
{/if}
