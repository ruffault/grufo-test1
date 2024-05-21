<?php /* Smarty version 2.6.31, created on 2019-11-30 12:12:39
         compiled from en/etape.tpl */ ?>
﻿<?php if (! $_GET['page']): ?>
	<?php elseif ($_GET['page'] == alreadymember): ?>
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
    <?php elseif ($_GET['newaccount'] == 1): ?>
			<?php elseif ($_GET['page'] == forminscription): ?>
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
		<?php elseif ($_GET['page'] == formlivraison): ?>
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
	<?php elseif ($_GET['page'] == livraisonprecise): ?>
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
	<?php elseif ($_GET['page'] == formfacturation): ?>
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
	<?php elseif ($_GET['page'] == facturationprecise): ?>
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
	<?php elseif ($_GET['page'] == formfraisport): ?>
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
	<?php elseif ($_GET['page'] == formmodepaiement): ?>
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
	<?php elseif ($_GET['page'] == paiementcarte): ?>
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
	<?php elseif ($_GET['page'] == good): ?>
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
	<?php elseif ($_GET['page'] == bad): ?>
		<h3>failure</h3>
<?php endif; ?>

