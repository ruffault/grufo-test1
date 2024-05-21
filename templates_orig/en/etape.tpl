{if !$smarty.get.page}
	{elseif $smarty.get.page == alreadymember}
		<ul class="checkout_process_2">
			<li class="current">Step 1 </li>
			<li>Step 2 </li>
			<li>Step 3 </li>
			<li>Step 4 </li>
			<li>Step 5 </li>
			<li>Step 6 </li>
		</ul>
		<ul class="checkout_process">
			<li class="current">Identification</li>
			<li>Shipping</li>
			<li>Billing</li>
			<li>Dispatch</li>
			<li>Payment</li>
			<li>Confirmation</li>
		</ul>
    {elseif $smarty.get.newaccount == 1}
		{*<h2><span class="deco">></span>Inscription</h2>*}
	{elseif $smarty.get.page == forminscription}
		<ul class="checkout_process_2">
			<li class="current">Step 1 </li>
			<li>Step 2 </li>
			<li>Step 3 </li>
			<li>Step 4 </li>
			<li>Step 5 </li>
			<li>Step 6 </li>
		</ul>
		<ul class="checkout_process">
			<li class="current">Identification</li>
			<li>Shipping</li>
			<li>Billing</li>
			<li>Dispatch</li>
			<li>Payment</li>
			<li>Confirmation</li>
		</ul>
	{*	<h2><span class="deco">></span> 1.1 - Inscription</h2>*}
	{elseif $smarty.get.page == formlivraison}
		<ul class="checkout_process_2">
			<li>Step1 </li>
			<li class="current">Step 2 </li>
			<li>Step 3 </li>
			<li>Step 4 </li>
			<li>Step 5 </li>
			<li>Step 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li class="current">Shipping</li>
			<li>Billing</li>
			<li>Dispatch</li>
			<li>Payment</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == livraisonprecise}
		<ul class="checkout_process_2">
			<li>Step 1 </li>
			<li class="current">Step 2 </li>
			<li>Step 3 </li>
			<li>Step 4 </li>
			<li>Step 5 </li>
			<li>Step 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li class="current">Shipping</li>
			<li>Billing</li>
			<li>Dispatch</li>
			<li>Payment</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == formfacturation}
		<ul class="checkout_process_2">
			<li>Step 1 </li>
			<li>Step 2 </li>
			<li class="current">Step 3 </li>
			<li>Step 4 </li>
			<li>Step 5 </li>
			<li>Step 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Shipping</li>
			<li class="current">Billing</li>
			<li>Dispatch</li>
			<li>Payment</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == facturationprecise}
		<ul class="checkout_process_2">
			<li>Step 1 </li>
			<li>Step 2 </li>
			<li class="current">Step 3 </li>
			<li>Step 4 </li>
			<li>Step 5 </li>
			<li>Step 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Shipping</li>
			<li class="current">Billing</li>
			<li>Dispatch</li>
			<li>Payment</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == formfraisport}
		<ul class="checkout_process_2">
			<li>Step 1 </li>
			<li>Step 2 </li>
			<li>Step 3 </li>
			<li class="current">Step 4 </li>
			<li>Step 5 </li>
			<li>Step 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Shipping</li>
			<li>Billing</li>
			<li class="current">Dispatch</li>
			<li>Payment</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == formmodepaiement}
		<ul class="checkout_process_2">
			<li>Step 1 </li>
			<li>Step 2 </li>
			<li>Step 3 </li>
			<li>Step 4 </li>
			<li class="current">Step 5 </li>
			<li>Step 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Shipping</li>
			<li>Billing</li>
			<li>Dispatch</li>
			<li class="current">Payment</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == paiementcarte}
		<ul class="checkout_process_2">
			<li>Step 1 </li>
			<li>Step 2 </li>
			<li>Step 3 </li>
			<li>Step 4 </li>
			<li class="current">Step 5 </li>
			<li>Step 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Shipping</li>
			<li>Billing</li>
			<li>Dispatch</li>
			<li class="current">Payment</li>
			<li>Confirmation</li>
		</ul>
	{elseif $smarty.get.page == good}
		<ul class="checkout_process_2">
			<li>Step 1 </li>
			<li>Step 2 </li>
			<li>Step 3 </li>
			<li>Step 4 </li>
			<li>Step 5 </li>
			<li class="current">Step 6 </li>
		</ul>
		<ul class="checkout_process">
			<li>Identification</li>
			<li>Shipping</li>
			<li>Billing</li>
			<li>Dispatch</li>
			<li>Payment</li>
			<li class="current">Confirmation</li>
		</ul>
	{elseif $smarty.get.page == bad}
		<h3>failure</h3>
{/if}


