{if !$smarty.get.page}
	{elseif $smarty.get.page == alreadymember}
		<ul class="checkout_process_2">
			<li class="current">Etape 1 </li>
			<li>Etape 2 </li>
			<li>Etape 3 </li>
			<li>Etape 4 </li>
			<li>Etape 5 </li>
			<li>Etape 6 </li>
		</ul>
		<ul class="checkout_process">
			<li class="current">Identification</li>
			<li>Livraison</li>
			<li>Facturation</li>
			<li>Expédition</li>
			<li>Paiement</li>
			<li>Confirmation</li>
		</ul>
    {elseif $smarty.get.newaccount == 1}
		<h2><span class="deco">></span>Inscription</h2>
	{elseif $smarty.get.page == forminscription}
		<ul class="checkout_process_2">
			<li class="current">Etape 1 </li>
			<li>Etape 2 </li>
			<li>Etape 3 </li>
			<li>Etape 4 </li>
			<li>Etape 5 </li>
			<li>Etape 6 </li>
		</ul>
		<ul class="checkout_process">
			<li class="current">Identification</li>
			<li>Livraison</li>
			<li>Facturation</li>
			<li>Expédition</li>
			<li>Paiement</li>
			<li>Confirmation</li>
		</ul>
		<h2><span class="deco">></span> 1.1 - Inscription</h2>
	{elseif $smarty.get.page == formlivraison}
		<ul class="checkout_process_2">
			<li>Etape 1 </li>
			<li class="current">Etape 2 </li>
			<li>Etape 3 </li>
			<li>Etape 4 </li>
			<li>Etape 5 </li>
			<li>Etape 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li class="current">Livraison</li>
			<li>Facturation</li>
			<li>Expédition</li>
			<li>Paiement</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == livraisonprecise}
		<ul class="checkout_process_2">
			<li>Etape 1 </li>
			<li class="current">Etape 2 </li>
			<li>Etape 3 </li>
			<li>Etape 4 </li>
			<li>Etape 5 </li>
			<li>Etape 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li class="current">Livraison</li>
			<li>Facturation</li>
			<li>Expédition</li>
			<li>Paiement</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == formfacturation}
		<ul class="checkout_process_2">
			<li>Etape 1 </li>
			<li>Etape 2 </li>
			<li class="current">Etape 3 </li>
			<li>Etape 4 </li>
			<li>Etape 5 </li>
			<li>Etape 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Livraison</li>
			<li class="current">Facturation</li>
			<li>Expédition</li>
			<li>Paiement</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == facturationprecise}
		<ul class="checkout_process_2">
			<li>Etape 1 </li>
			<li>Etape 2 </li>
			<li class="current">Etape 3 </li>
			<li>Etape 4 </li>
			<li>Etape 5 </li>
			<li>Etape 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Livraison</li>
			<li class="current">Facturation</li>
			<li>Expédition</li>
			<li>Paiement</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == formfraisport}
		<ul class="checkout_process_2">
			<li>Etape 1 </li>
			<li>Etape 2 </li>
			<li>Etape 3 </li>
			<li class="current">Etape 4 </li>
			<li>Etape 5 </li>
			<li>Etape 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Livraison</li>
			<li>Facturation</li>
			<li class="current">Expédition</li>
			<li>Paiement</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == formmodepaiement}
		<ul class="checkout_process_2">
			<li>Etape 1 </li>
			<li>Etape 2 </li>
			<li>Etape 3 </li>
			<li>Etape 4 </li>
			<li class="current">Etape 5 </li>
			<li>Etape 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Livraison</li>
			<li>Facturation</li>
			<li>Expédition</li>
			<li class="current">Paiement</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == paiementcarte}
		<ul class="checkout_process_2">
			<li>Etape 1 </li>
			<li>Etape 2 </li>
			<li>Etape 3 </li>
			<li>Etape 4 </li>
			<li class="current">Etape 5 </li>
			<li>Etape 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Livraison</li>
			<li>Facturation</li>
			<li>Expédition</li>
			<li class="current">Paiement</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == good}
		<ul class="checkout_process_2">
			<li>Etape 1 </li>
			<li>Etape 2 </li>
			<li>Etape 3 </li>
			<li>Etape 4 </li>
			<li>Etape 5 </li>
			<li class="current">Etape 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Livraison</li>
			<li>Facturation</li>
			<li>Expédition</li>
			<li>Paiement</li>
			<li class="current">Confirmation</li>
		</ul>
	{elseif $smarty.get.page == bad}
		<h3>echec</h3>
{/if}


