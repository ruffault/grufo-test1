{if $smarty.get.commande}
<div class='paiement'>
  <h2><span class="deco">></span>Missing information</h2>
  <p>
    Our bank service has informed us that the payment could not be made.
    Consequently, we are sorry to inform you that your order,
    reference <strong>{$smarty.get.commande}</strong> will not be processed.
  </p>
 
  <p>
    However, we remain at your entire disposition, so please feel entirely 
    <a href="{$urlsite}index.php?page=contact">free to ask us your questions.</a>
  </p>
  <p>
    <a href="{$urlsite}catalogue-dictionnaire-et-lexique-c0">Continue browsing the catalogue</a>
  </p>
</div>
{/if}
