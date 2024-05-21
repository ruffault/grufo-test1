{if $smarty.get.commande}
<div class='paiement'>
  <h2><span class="deco">></span>Congratulations</h2>
  <p>
    You have paid for your order by credit card.
    Your order, reference <strong>{$smarty.get.commande}</strong>,
    has been correctly recorded by our services.
  </p>
  <p>
    At each stage in your order, you will receive an
    e-mail. You can follow up,  
    <a href='{$urlsite}index.php?page=oldcommande'>the processing of your order</a> step by step.
    We are at your entire disposition, please feel entirely <a href='{$urlsite}index.php?page=contact'>free to ask us your questions.</a>
  </p>

  <p>
    <a href='{$urlsite}{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Continue browsing the catalogue</a>
  </p>
</div>
{/if}
