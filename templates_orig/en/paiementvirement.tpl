<div id="paiementcheque">
{if $smarty.get.statut == 'ok'}
  <h2><span class="deco">></span>Congratulations</h2>
  <p>
  Your order, reference <strong>{$smarty.get.commande}</strong>, has been successfully recorded by our
  services. Your order will be processed on reception of your bank transfer.<br /> You can follow-up
  <a href='{$urlsite}index.php?page=oldcommande'>your order's progress step-by-step</a>.
  <br />If you have any questions<a href='{$urlsite}index.php?page=contact'>please do not hesitate to contact us.</a>
  <br />
  <br />
  <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Back to catalogue</a>
{else}
  <h2><span class="deco">></span>Payment by bank transfer</h2>
  Payment is very simple.<br />
  - A bank transfer must be made for {$montant} € to the following account:
  <br />
  
  <address>
  <strong>Banque Populaire Val de France</strong><br />
  PALAISEAU<br />
  IBAN : FR76 1870 7000 2309 2211 5798 611<br />
  BIC : CCBPFRPPVER
  </address>
  Your order reference: <strong>{$smarty.session.code_cmd}</strong><br />
  <br />
  Your order will be processed on reception of your bank transfer.<br /><br />
  </p>
  <form method="post" action="{$urlsite}validatecommande.php">
    <div>
      <input type="submit" name="cheque_submit"
      value="Terminate the order" />
    </div>
  </form>
{/if}
</div>
