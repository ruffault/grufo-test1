<?php /* Smarty version 2.6.31, created on 2024-05-17 00:15:50
         compiled from fr/etape.tpl */ ?>
﻿<?php if (! $_GET['page']): ?>
	<?php elseif ($_GET['page'] == alreadymember): ?>
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
    <?php elseif ($_GET['newaccount'] == 1): ?>
		<h2><span class="deco">></span>Inscription</h2>
	<?php elseif ($_GET['page'] == forminscription): ?>
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
	<?php elseif ($_GET['page'] == formlivraison): ?>
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
	<?php elseif ($_GET['page'] == livraisonprecise): ?>
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
	<?php elseif ($_GET['page'] == formfacturation): ?>
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
	<?php elseif ($_GET['page'] == facturationprecise): ?>
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
	<?php elseif ($_GET['page'] == formfraisport): ?>
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
	<?php elseif ($_GET['page'] == formmodepaiement): ?>
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
	<?php elseif ($_GET['page'] == paiementcarte): ?>
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
	<?php elseif ($_GET['page'] == good): ?>
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
	<?php elseif ($_GET['page'] == bad): ?>
		<h3>echec</h3>
<?php endif; ?>

