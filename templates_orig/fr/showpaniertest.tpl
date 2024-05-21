{if $Panier}

<div id="panier">
<h2><span class="deco">></span>Votre Panier</h2>
<table id="panier">
	 <caption>Panier</caption>
	<tr>
    	<th colspan="3" rowspan="1">Descriptif</th>
    	<th class="price" colspan="1">Prix</th>
    	<th class="item" rowspan="1">&nbsp;</th>
        <th class="quantity" rowspan="1">Quantité</th>
        <th class="item" rowspan="1">&nbsp;</th>
        <th class="subtotal" colspan="1">Sous-total</th>
        <th class="delete" rowspan="1">&nbsp;</th>
	</tr>
	{section name=panier loop=$panier}
		{cycle values="<tr class='normal'>,<tr class='selected'>"}
		<td class="decote">
			<form method="post" action="{$urlsite}remfrompanier.php">
        		<div>
            		<input type="hidden" name="id" value="{$panier[panier].id_produit}" />
            		<input type="hidden" name="typeaction" value="decote" />
            		<button name="decote">Mettre de cote</button>
    			</div>
      		</form>


		</td>
		<td class="image">
			<img src="{$urlsite}picproduct/{$panier[panier].id_produit}_icon.jpg"  />
		</td>
		<td class="description">
			<h3><a href="{$urlsite}{$panier[panier].id_produit|product_link:$panier[panier].nom}">{$panier[panier].nom|utf8_encode}</a></h3>
			<br/>
			{if $panier[panier].disponible == 1}
				Disponible
			{else}
				Disponible sous {$panier[panier].delai_reapprovisionnement} jours
			{/if}
      		{if $panier[panier].quantite > 1}
        	<br/>
  			{/if}

  		</td>
  		    <td class="price">
  		              	{if $smarty.session.ht  == "ht"}
            {$panier[panier].prix_unitaire_ht_rabais} € HT ({$panier[panier].prix_unitaire_ttc_rabais}  € TTC)<br />
          	{else}
            {$panier[panier].prix_unitaire_ttc_rabais} € TTC ({$panier[panier].prix_unitaire_ht_rabais}  € HT)<br />
          	{/if}
    </td>
  		<td class="item">x</td>
	<td class="quantity">
		<form method="post" action="{$urlsite}remfrompanier.php">
			<div class="plus">
    			<input type="hidden" name="id" value="{$panier[panier].id_produit}" />
    			<input type="text" name="quantite" value="{$panier[panier].quantite}" size="1" maxlength="2" />
				<button name="chgquantity">Modifier</button>
  			</div>
		</form>

	</td>
	<td class="item">=</td>
	{if $smarty.session.ht  == "ht"}
	    <td class="subtotal">
	    <strong>{$panier[panier].prix_unitaire_rabais_ht_for_all} €</strong>
    	</td>
	{/if}
	<td class="subtotal">
      <strong>{$panier[panier].prix_unitaire_ttc_rabais_for_all} €</strong>
    </td>
    <td class="delete">
    		<form method="post" action="{$urlsite}remfrompanier.php">
			<div class="moins">
    			<input type="hidden" name="id" value="{$panier[panier].id_produit}" />
    			<input type="hidden" name="quantite" value="0" />
				<button name="chgquantity">Supprimer</button>
  			</div>
		</form>
    </td>
   
</tr>
{/section}
	<tr class="lastline">
		<td></td>
		<td></td>
				<td></td>
		<td></td>
		{if $smarty.session.ht  == "ht"}
			<td></td>
		{/if}
		<td></td>
		<td id="detailtotal">
			Total HT<br/>
			+ TVA<br/>
			Total TTC
		</td>
		<td colspan="2" rowspan="1">
      		{$prix_ht_total}  €<br/>
      		{$tva_totale}  €<br/>
			{$prix_total}  €
		</td>
		<td></td>
	</tr>
</table>
{if $delai_max}
  Délai d'approvisionnement : <strong>{$delai_max} jours</strong>
	<br />
	<em>A ce délai il faut ajouter le délai de livraison. 
	Celui-ci varie suivant le lieu de destination et le mode de transport.</em>
{else}
  <!-- <strong>Aucun</strong> délai d'approvisionnement -->
{/if}

	<div class="validcmd">
		{if $smarty.get.ajout == 1}
			<button onClick="javascript:location.href ='{$smarty.get.url}'">Poursuivre les achats</button>
		{/if}
			<button name="decote" onClick="javascript:location.href ='{$urlsite}verifmembre.php'" >Poursuivre le processus de commande</button>
	</div>
</div>

{else}
<div id="panier">
<h2>Votre panier est vide</h2>
<p>
  Vous devez rechercher un livre puis le mettre dans votre panier.
  <br />
  Vous avez le choix entre 3 méthodes de recherche :
</p>  
<ul>
  <li>
    <strong>Par l'utilisation de la recherche rapide :</strong>
    <br />
    Il vous suffit d'entrer un mot-clef, un nom d'auteur ou 
    un titre pour trouver l'ouvrage 
    correspondant. Cette fonction se trouve dans le bandeau orange
    en haut de cette page.
  </li>
  <li>
    <strong>Par l'utilisation de la 
    <a href='{$urlsite}index.php?page=advancedsearch'>recherche avancée</a></strong>
    <br />
  </li>
  <li>
    <strong>Par l'utilisation du 
    <a href='{$urlsite}dictionnaire-et-lexique-c0'>catalogue</a> :
    </strong><br />
    Il vous suffit de cliquer sur la catégorie qui vous intéresse 
    pour accéder aux sous-catégories correspondantes. Choisissez 
    alors une sous-catégorie pour accéder aux livres correspondant.
  </li>
</ul>
</div>
{/if}
