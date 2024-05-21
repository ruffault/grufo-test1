<div id="paiementcheque">
{if $smarty.get.statut == 'ok'}
  <h2><span class="deco">></span>Félicitations</h2>
  <p>
  Votre commande, référencée <strong>{$smarty.get.commande}</strong>, a bien été enregistrée par nos
  services. Nous attendons la réception de votre chèque pour poursuivre le traitement de la
  commande.<br /> Vous pouvez suivre, pas à pas
  <a href='{$urlsite}index.php?page=oldcommande'>le traitement de votre commande</a>.
  <br />N'hésitez pas à <a href='{$urlsite}index.php?page=contact'>nous poser vos questions.</a>
  <br />
  <br />
  <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Retourner au catalogue</a>
{else}
  <h2><span class="deco">></span>Règlement par chèque</h2>
  Pour régler par chèque, c'est très simple :<br />
  - Vous devez envoyer un chèque de {$montant} € à l'ordre de la Maison du
  dictionnaire à l'adresse :<br />
  <address>
  <strong>La Maison du Dictionnaire</strong><br />
  98 bd du Montparnasse<br />
  F-75014 Paris France<br />
  </address>
  - Vous devez aussi préciser la référence de votre commande au dos du chèque, à savoir : <br />
  <strong>{$smarty.session.code_cmd}</strong><br />
  <br />
  Votre Commande sera traitée dès réception de votre règlement.<br /><br />
  </p>
  <form method="post" action="{$urlsite}validatecommande.php">
    <div>
      <input type="submit" name="cheque_submit"
      value="Terminer la commande" />
    </div>
  </form>
{/if}
</div>
