{if $panier}
<div id="panier">
<h2><span class="deco">></span>Su cesta de la compra</h2>
{if $smarty.get.ajout == 1}
<h3>Se ha añadido el producto a su cesta  - <a href='{$smarty.get.url}'>Volver a datos de la obra</a></h3>
{/if}
<table id="panier">
	 <caption>Cesta de la compra</caption>
		<tr>
			<th>Detalle</th>
			<th>Cantidad</th>
			{if $smarty.session.ht  == "ht"}
			<th>Precio sin IVA</th>
			{/if}
			<th>Precio con IVA</th>
		</tr>

	{section name=panier loop=$panier}
		{cycle values="<tr class='normal'>,<tr class='selected'>"}
		<td class='detail'>
  		<form method="post" action="remfrompanier.php">
        <div>
            <input type="hidden" name="id" value="{$panier[panier].id_produit}">
            <input type="hidden" name="typeaction" value="decote">
            <input type="image" name="decote" value="Archivar" alt="Archivar" src="{$urlsite}lang/{$applicationlang}/img/mettredecote.gif">
        </div>
      </form>
			<h3><a href="{$urlsite}{$panier[panier].id_produit|product_link:$panier[panier].nom}">{$panier[panier].nom|utf8_encode}</a></h3>
      <br />
			{if $panier[panier].disponible == 1}
				Disponible
			{else}
			  Disponible en {$panier[panier].delai_reapprovisionnement} días
			{/if}
      {if $panier[panier].quantite > 1}
        <br />
        <em>
    			{$panier[panier].quantite} ejemplares x
          {if $smarty.session.ht  == "ht"}
            {$panier[panier].prix_unitaire_ht_rabais} € sin IVA ({$panier[panier].prix_unitaire_ttc_rabais}  € con IVA)<br />
          {else}
            {$panier[panier].prix_unitaire_ttc_rabais} € con IVA ({$panier[panier].prix_unitaire_ht_rabais}  € sin IVA)<br />
          {/if}
  			</em>
  		{/if}
		</td>
		<td>
			<form method="post" action="remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="{$panier[panier].id_produit}">
					<input type="text" name="quantite" value="{$panier[panier].quantite}" size="1" maxlength="2">
					<input type="image" name="chgquantity" value="Modificar la cantidad" src="{$urlsite}lang/{$applicationlang}/img/chgquantity.gif">
				</div>
			</form>
			<form method="post" action="remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="{$panier[panier].id_produit}">
					<input type="hidden" name="quantite" value="0" />
					<input type="image" name="chgquantity" value="Suprimir" src="{$urlsite}lang/{$applicationlang}/img/supprimer.gif">
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
			Total sin IVA<br />
			+ IVA<br />
			Total con IVA
		</td>
		<td>
      {$prix_ht_total}  €<br />
      {$tva_totale}  €<br />
			{$prix_total}  €
		</td>
	</tr>
</table>
{if $delai_max}
  Plazo de aprovisionamiento : <strong>{$delai_max} días</strong>
{else}
  <strong>Ningún</strong> plazo de aprovisionamiento
{/if}
<br />
<em>A este plazo debe añadirle el plazo de entrega.
Este último variará según el destino y el modo de transporte.</em>
<div class="validcmd"><a href="{$urlsite}verifmembre.php"><img src="{$urlsite}lang/{$applicationlang}/img/valider.gif" alt="Confirmar el pedido"></a></div>
</div>

{else}
<div id="panier">
<h2>Su cesta de la compra está vacía</h2>
<p>
  Debe buscar un libro y ponerlo en su cesta.
  <br />
  Dispone de 3 formas de búsqueda:
</p>  
<ul>
  <li>
    <strong>La búsqueda rápida</strong>
    <br />
    Basta con introducir una palabra clave (nombre del autor o
    título ) para encontrar el libro deseado. Esta función se encuentra en la barra naranja
    situada en la parte superior de la página.
  </li>
  <li>
    <strong>La
    <a href='{$urlsite}index.php?page=advancedsearch'>búsqueda avanzada</a></strong>
    <br />
  </li>
  <li>
    <strong>El 
    <a href='{$urlsite}dictionnaire-et-lexique-c0'>catálogo</a> :
    </strong><br />
    Basta con hacer clic sobre la categoría deseada
    para acceder a las subcategorías correspondientes. Elija
    una subcategoría para acceder a los libros deseados.    
    
  </li>
</ul>
</div>
{/if}
