<div id="paiementcheque">
{if $smarty.get.statut == 'ok'}
  <h2><span class="deco">></span>Congratulations</h2>
  <p>
  Your order, reference <strong>{$smarty.get.commande}</strong>, has been successfully recorded by our
  services. Your order will be processed on reception of your cheque.<br /> You can follow-up
  <a href='{$urlsite}index.php?page=oldcommande'>your order's progress step-by-step</a>.
  <br />If you have any questions <a href='{$urlsite}index.php?page=contact'>please do not hesitate to contact us.</a>
  <br />
  <br />
  <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Back to catalogue</a>
{else}
  <h2><span class="deco">></span>Payment by cheque</h2>
  Payment by cheque is very simple:<br />
  - Please send a cheque of {$montant} € addressed to the "Maison du
  dictionnaire" at:<br />
  <address>
  <strong>La Maison du Dictionnaire</strong><br />
  98 Boulevard du Montparnasse<br />
  F-75014 Paris France<br />
  </address>
  - Your order reference should be written on the back of your cheque, namely: <br />
  <strong>{$smarty.session.code_cmd}</strong><br />
  <br />
  Your order will be processed on reception of your cheque.<br /><br />
  </p>
  <form method="post" action="{$urlsite}validatecommande.php">
    <div>
      <input type="submit" name="cheque_submit"
      value="Terminate the order" />
    </div>
  </form>
{/if}
</div>
