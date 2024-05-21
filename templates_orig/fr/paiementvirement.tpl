<div id="paiementcheque">
{if $smarty.get.statut == 'ok'}
  <h2><span class="deco">></span>Félicitations</h2>
  <p>
  Votre commande, référencée <strong>{$smarty.get.commande}</strong>, a bien été enregistrée par nos
  services. Nous attendons votre virement bancaire pour poursuivre le traitement de la
  commande.<br /> Vous pouvez suivre, pas à pas
  <a href='{$urlsite}index.php?page=oldcommande'>le traitement de votre commande</a>.
  <br />N'hésitez pas à <a href='{$urlsite}index.php?page=contact'>nous poser vos questions.</a>
  <br />
  <br />
  <a href='{$urlsite}catalogue-dictionnaire-et-lexique-c0'>Retourner au catalogue</a>
{else}
  <h2><span class="deco">></span>Règlement par virement bancaire</h2>
  Pour régler c'est très simple.<br />
  - Vous devez effectuer un virement de {$montant} € aux coordonnées suivantes :
  <br />
  
  <address>
  <strong>Banque Populaire Val de France</strong><br />
  PALAISEAU<br />
  IBAN : FR76 1870 7000 2309 2211 5798 611<br />
  BIC : CCBPFRPPVER
  </address>
  Référence de votre commande : <strong>{$smarty.session.code_cmd}</strong><br />
  <br />
  Votre Commande sera traitée dès réception de votre virement.<br /><br />
  </p>
  <form method="post" action="{$urlsite}validatecommande.php">
    <div>
      <input type="submit" name="cheque_submit"
      value="Terminer la commande" />
    </div>
  </form>
{/if}
</div>